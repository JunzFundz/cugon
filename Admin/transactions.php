<?php
include '../data/all-transactions.php';
?>

        <?php if ($result) { ?>
            <table id="example" class="table table-sm table-striped text-center table-text">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Reservation Number</th>
                        <th scope="col">Username</th>
                        <th scope="col">Days</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $rows) { ?>
                        <tr class="">
                            <td class=""><?= $rows['res_number']; ?></td>
                            <td class=""><?= $rows['username']; ?></td>
                            <td class=""><?php
                                $date1 = date_create($rows['start']);
                                $date2 = date_create($rows['end']);
                                $interval = date_diff($date1, $date2);

                                // Kuhas value drekta
                                $days = $interval->days;
                                echo $days;
                                ?></td>
                            <td class=""><?= $rows['payment']; ?></td>
                            <td class="">

                                <button onclick="startTimer('<?php echo $rows['res_id']; ?>')" type="button" class="btn btn-primary me-2 mb-2 viewButton">Time in</button>

                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="btn btn-danger me-2 mb-2">Overtime</button>

                                <a href="" onclick="window.print()">Print</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else {
                echo "<tr><td colspan='7'>No Data Found.</td></tr>";
            } ?>
                </tbody>
            </table>

        <!-- Datatables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
