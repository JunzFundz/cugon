<?php
require_once('../database/Connection.php');

$db = new Dbh();
$con = $db->connect();
?>

<div class="container--ratings">

    <div class="table--ratings">
        <?php
        $stmt = $con->prepare("SELECT * FROM item_ratings INNER JOIN items ON item_ratings.rating_id=items.i_id");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) { ?>
            <table class="table table-striped text-left" id="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Item</th>
                        <th scope="col">Ratings</th>
                        <th scope="col">Quality</th>
                        <th scope="col">Service</th>
                        <th scope="col">Comments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['rating_id']) ?></td>
                            <td><?= htmlspecialchars($row['client_username']) ?></td>
                            <td><?= htmlspecialchars($row['i_name']) ?></td>
                            <td>
                                <?php
                                if ($row['rating_data'] <= 2) {
                                    echo '<span class="text-danger">
                                    <i class="bi bi-arrow-90deg-down" style="font-size:8px">&nbsp;&nbsp;</i>' . htmlspecialchars($row['rating_data']) . '<span style="font-size:10px"> Poor</span>
                                </span>';
                                } else if ($row['rating_data'] == 3) {
                                    echo '<span class="text-warning">
                                    <i class="bi bi-arrow-90deg-left" style="font-size:8px">&nbsp;&nbsp;</i>' . htmlspecialchars($row['rating_data']) . '<span style="font-size:10px"> Great</span>
                                    </span>';
                                } else if ($row['rating_data'] >= 4) {
                                    echo '<span class="text-success">
                                    <i class="bi bi-arrow-90deg-up" style="font-size:8px">&nbsp;&nbsp;</i>' . htmlspecialchars($row['rating_data']) . '<span style="font-size:10px"> Satisfactory</span>
                                    </span>';
                                }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($row['quality']) ?></td>
                            <td><?= htmlspecialchars($row['service']) ?></td>
                            <td><?= htmlspecialchars($row['comments']) ?></td>
                            <td class="text-center">
                                <button type="button" data-rate-id="<?= htmlspecialchars($row['rating_id']) ?>" class="btn btn-danger remove-rating--"><i class="bi bi-eraser"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
            echo "<tr><td colspan='7'>No Data Found.</td></tr>";
        } ?>
    </div>
</div>

<script>
    function showToast(message, iconClass) {
        $('#text-toast').text(message);
        $('.icon-success').removeClass('fa-circle-check fa-circle-exclamation fa-circle-xmark').addClass(iconClass);

        var toastLiveExample = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();

        setTimeout(function() {
            toast.hide();
        }, 2000);
    }
</script>