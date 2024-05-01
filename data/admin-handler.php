<?php

require_once('../database/Connection.php');

$dbh = new Dbh();
$db = $dbh->connect();

if (isset($_POST['submit-type'])) {
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $db->prepare("INSERT INTO tbl_item_type (type) VALUES (?)");
    $stmt->bind_param('s', $type);

    if ($stmt->execute()) {
        $response = array(
            'success' => 'Type added'
        );
    } else {
        $response = array(
            'error' => 'Type not added'
        );
    }
    echo json_encode($response);
    exit();
}

if (isset($_POST['month']) && isset($_POST['year'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $stmt = $db->query("SELECT user_id, item_name, SUM(quantity) as total_quantity, SUM(price * quantity) as total_amount FROM res_tb WHERE MONTH(created_at) = $month AND YEAR(created_at) = $year GROUP BY user_id, item_name");
    foreach ($stmt as $row) { ?>
        <tr>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['item_name'] ?></td>
            <td><?= $row['total_quantity'] ?></td>
            <td><?= $row['total_amount'] ?></td>
        </tr>
    <?php }
}

if (isset($_POST['getSalesByYear'])) {
    $year = $_POST["year"];
    $stmt = $db->query("SELECT DISTINCT MONTH(created_at) as month, YEAR(created_at) AS year FROM res_tb WHERE YEAR(created_at) = '$year'");
    $months = $stmt->fetch_all(MYSQLI_ASSOC);
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php foreach ($months as $month) { ?>
                <li class="breadcrumb-item"><a href="#" class="month-link" data-month="<?= $month['month'] ?>" data-year="<?= $month['year'] ?>"><?= date('F', mktime(0, 0, 0, $month['month'], 1)) ?></a></li>
            <?php } ?>
        </ol>
    </nav>

    <div style="width: 100%; height: 50vh; justify-content:center">
        <canvas id="myChart"></canvas>
    </div>

    <div class="table-responsive">
        <table class="table table-hover text-center text-nowrap">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Availed Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                //WHERE status = 'COMPLETED' AND
                $stmt = $db->query("SELECT item_id, item_name, SUM(quantity) as total_quantity, SUM(price * quantity) as total_amount FROM res_tb WHERE MONTH(created_at) = MONTH(NOW()) AND YEAR(created_at) = '$year' GROUP BY item_id, item_name");

                foreach ($stmt as $row) { ?>
                    <tr>
                        <td><?= $row['item_id'] ?></td>
                        <td><?= $row['item_name'] ?></td>
                        <td><?= $row['total_quantity'] ?></td>
                        <td><?= number_format($row['total_amount']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $('nav ol li a').on('click', function(e) {
                e.preventDefault();
                var month = $(this).data('month');
                var year = $(this).data('year');
                $.ajax({
                    type: 'POST',
                    url: '../data/admin-handler.php',
                    data: {
                        month: month,
                        year: year
                    },
                    success: function(data) {
                        $('#table-body').html(data);
                    }
                });
            });

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_map(function ($month) {
                                return date('F', mktime(0, 0, 0, $month['month'], 1));
                            }, $months)); ?>,
                    datasets: [{
                        label: 'Availed',
                        data: [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
<?php }

if (isset($_POST['remove-comment'])) {
    $id = $_POST['rate-id'];

    $removeStmt = $db->prepare('DELETE FROM ratings WHERE r_id = ?');
    $removeStmt->bind_param('i', $id);
    if ($removeStmt->execute()) {
        $response = array(
            'success' => 'Comment removed'
        );
    }else{
        $response = array(
            'error' => 'Error removing comment'
        );
    }
    echo json_encode($response);
    exit();
}

if (isset($_POST['remove-ratings'])) {
    $id = $_POST['rate-id'];

    $removeStmt = $db->prepare('DELETE FROM item_ratings WHERE rating_id = ?');
    $removeStmt->bind_param('i', $id);
    if ($removeStmt->execute()) {
        $response = array(
            'success' => 'Rating removed'
        );
    }else{
        $response = array(
            'error' => 'Error removing rating'
        );
    }
    echo json_encode($response);
    exit();
}

if (isset($_POST['get-email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if ($email) {
        $response = array(
            'success' => true,
            'email' => $email
        );
    } else {
        $response = array(
            'success' => false,
            'error' => 'Fetching unsuccesfull'
        );
    }

    echo json_encode($response);
    exit();
}

if (isset($_POST['send-email'])) {

    include('../class/Emails.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $db->prepare("INSERT INTO emails (email, subject, message) VALUES (?,?,?)");
    $stmt->bind_param('sss', $email, $subject, $message);

    if ($stmt->execute()) {
        $sendEmail = new Email();
        $send = $sendEmail->sendMail($email, $subject, $message);
        $response = array(
            'success' => 'Email sent'
        );
    } else {
        $response = array(
            'error' => 'Email not sent'
        );
    }
    echo json_encode($response);
    exit();
}

if(isset($_POST['deactivate-account'])){
    $user_id = filter_var($_POST['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if ($user_id && $email) {
        $response = array(
            'success' => true,
            'user_id' => $user_id,
            'email' => $email
        );
    } else {
        $response = array(
            'success' => false,
            'error' => 'Fetching unsuccesfull'
        );
    }

    echo json_encode($response);
    exit();
}

if(isset($_POST['confirm-deactivate'])){
    $uid = filter_var($_POST['uid'], FILTER_SANITIZE_NUMBER_INT);

    $stmt = $db->prepare("UPDATE users SET verified = 'Deactivate' WHERE user_id = ?");
    $stmt->bind_param('i', $uid);

    if ($stmt->execute()) {
        $response = array(
            'success' => true,
            'message' => "User account has been deactivated."
        );
    } else {
        $response = array(
            'success' => true,
            'error' => 'Deactivation incomplete'
        );
    }

    echo json_encode($response);
    exit();
}