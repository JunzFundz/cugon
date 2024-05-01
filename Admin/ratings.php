<?php include('../data/ratings.php') ?>

<div class="">
    <div class="table--ratings">
        <?php if ($result) { ?>
            <table class="table table-striped text-left" id="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ratings</th>
                        <th scope="col">Comments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?= $row['r_id'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <?php
                                if ($row['rating_data'] <= 2) {
                                    echo '<span class="text-danger">
                                    <i class="bi bi-arrow-90deg-down" style="font-size:8px">&nbsp;&nbsp;</i>' . $row['rating_data'] . '<span style="font-size:10px"> Poor</span>
                                </span>';
                                } else if ($row['rating_data'] == 3) {
                                    echo '<span class="text-warning">
                                    <i class="bi bi-arrow-90deg-left" style="font-size:8px">&nbsp;&nbsp;</i>' . $row['rating_data'] . '<span style="font-size:10px"> Great</span>
                                    </span>';
                                } else if ($row['rating_data'] >= 4) {
                                    echo '<span class="text-success">
                                    <i class="bi bi-arrow-90deg-up" style="font-size:8px">&nbsp;&nbsp;</i>' . $row['rating_data'] . '<span style="font-size:10px"> Satisfactory</span>
                                    </span>';
                                }
                                ?>
                            </td>
                            <td><?= $row['caption'] ?></td>
                            <td class="text-center">
                                <button type="button" data-rate-id="<?= $row['r_id'] ?>" class="btn btn-danger remove-comment--"><i class="bi bi-eraser"></i></button>
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