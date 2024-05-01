<?php
require_once('../database/Connection.php');
$dbh = new Dbh();
$db = $dbh->connect();
$stmt  = $db->query("SELECT * FROM users");
?>

<title>Accounts</title>

<div class="table-responsive">
    <table class="table table-hover table-borderless">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Verified</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($stmt as $row) : ?>
                <?php if ($row['username'] !== 'admin') : ?>
                    <tr>
                        <td>
                            <span class="avatar"><i class="fas fa-user"></i></span>
                            <a href="#"><?= htmlspecialchars($row['full_name']) ?></a>
                        </td>
                        <td><a href="" class="deactivate-account--"><?= htmlspecialchars($row['email']) ?></a></td>
                        <td><?= htmlspecialchars($row['brgy'] . " " . $row['city'] . " " . $row['zip_code']) ?></td>
                        <td><?= htmlspecialchars($row['verified']) ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item send-email--" href="#" data-email="<?= htmlspecialchars($row['email']) ?>">Send email</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item deactivate-account--" href="#" data-user-id="<?= htmlspecialchars($row['user_id']) ?>" data-email="<?= htmlspecialchars($row['email']) ?>" data-username="<?= htmlspecialchars($row['username']) ?>">Deactivate</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
            <?php endif;
            endforeach;
            ?>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('.send-email--').on('click', function() {
            const email = $(this).data("email");
            $.ajax({
                url: '../data/admin-handler.php',
                type: 'post',
                data: {
                    'get-email': true,
                    'email': email
                },
                dataType: 'json',
                success: function(response) {
                    $('#email-recepient').val(response.email);
                    $('#send-email-msg').modal('show');
                }
            })
        });

        $('.deactivate-account--').on('click', function() {
            const user_id = $(this).data("user-id");
            const email = $(this).data("email");

            console.log(user_id, email)

            $.ajax({
                url: '../data/admin-handler.php',
                type: 'post',
                data: {
                    'deactivate-account': true,
                    'user-id': user_id,
                    'email': email
                },
                dataType: 'json',
                success: function(response) {
                    $('#uid').text(response.user_id);
                    $('#email').text(response.email);
                    $('#deactivate-account').modal('show');
                }
            })
        })
    })
</script>