<?php
require_once('../database/Connection.php');
$db = new Dbh();
$con = $db->connect();

$stmt = $con->query("SELECT DISTINCT YEAR(created_at) AS year FROM res_tb");
$years = $stmt->fetch_all(MYSQLI_ASSOC);
?>
<select class="form-select form-select-sm" aria-label=".form-select-sm example" style="width: 10%;">
    <?php foreach ($years as $year) { ?>
        <option selected value="<?= $year['year'] ?>" data-year="<?= $year['year'] ?>"><?= $year['year'] ?></option>
    <?php } ?>
</select>
<br>


<div id="reports-content">
    <?php
    $stmt = $con->query("SELECT DISTINCT MONTH(created_at) as month, YEAR(created_at) AS year FROM res_tb");
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
                $stmt = $con->query("SELECT item_id, item_name, SUM(quantity) as total_quantity, SUM(price * quantity) as total_amount FROM res_tb WHERE MONTH(created_at) = MONTH(NOW()) AND YEAR(created_at) = YEAR(NOW()) GROUP BY item_id, item_name");
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
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        $('select').on('change', function() {
            var year = $(this).val();

            $.ajax({
                type: 'POST',
                url: '../data/admin-handler.php',
                data: {
                    "getSalesByYear": true,
                    'year': year
                },
                success: function(data) {
                    $('#reports-content').html(data);
                }
            });
        });

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
            type: 'line',
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