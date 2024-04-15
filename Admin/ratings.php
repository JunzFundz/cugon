<?php include('../data/ratings.php') ?>

<div class="container--ratings">
    <div class="graph--ratings">

    </div>
    <div class="table--ratings">
        <?php if ($result) { ?>
            <table class="table table-striped text-left" id="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First</th>
                        <th scope="col">Ratings</th>
                        <th scope="col">Handle</th>
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
                                    <i class="bi bi-arrow-90deg-down" style="font-size:8px">&nbsp;&nbsp;</i>'. $row['rating_data'] . '<span style="font-size:10px"> Poor</span>
                                </span>';
                                }else if($row['rating_data'] == 3){
                                    echo '<span class="text-warning">
                                    <i class="bi bi-arrow-90deg-left" style="font-size:8px">&nbsp;&nbsp;</i>'. $row['rating_data'] . '<span style="font-size:10px"> Great</span>
                                    </span>';
                                }else if($row['rating_data'] >= 4){
                                    echo '<span class="text-success">
                                    <i class="bi bi-arrow-90deg-up" style="font-size:8px">&nbsp;&nbsp;</i>'. $row['rating_data'] . '<span style="font-size:10px"> Satisfactory</span>
                                    </span>';
                                }
                                ?>
                            </td>
                            <td><?= $row['caption'] ?></td>
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
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>