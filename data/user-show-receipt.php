<?php

require('../class/Transactions.php');



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['show_receipt'])) {

        $res_id = filter_input(INPUT_POST, 'res_id', FILTER_VALIDATE_INT);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
        $res_number = filter_input(INPUT_POST, 'res_number', FILTER_VALIDATE_INT);

        $receipt = new Transactions();
        $result = $receipt->clientReceipt($res_id, $res_number, $user_id);

        if ($result && $result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {

                $regDate = date_create($rows['reg_date']);
                $date1 = date_create($rows['start']);
                $date2 = date_create($rows['end']);
                $interval = date_diff($date1, $date2);
                $currentDate = date_create();

                if ($rows['start'] === '0000-00-00' && $rows['end'] == '0000-00-00') {
                    $newdate = $regDate->format('M d, Y');
                } else {
                    $newdate = $date1->format('M d-') . $date2->format('d Y');
                }

                // Kuhas value drekta
                $days = $interval->days;
                $totaldays = number_format($days);
                $timeRemaining = $totaldays * 24;
?>

                <!-- component -->
                <div class="flex items-center justify-center">
                    <div class="w-80 rounded bg-gray-50 px-6 pt-8 shadow-lg">
                        <img src="../images/logo.jpg" alt="chippz" class="mx-auto w-16 py-4" />
                        <div class="flex flex-col justify-center items-center gap-2">
                            <h4 class="font-semibold">Cugon Bamboo Resort</h4>
                            <p class="text-xs">Pangalaykayan Bindoy</p>
                        </div>
                        <div class="flex flex-col gap-3 border-b py-6 text-xs">
                            <p class="flex justify-between">
                                <span class="text-gray-400">Date Booked :</span>
                                <span><?= $newdate ?></span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-400">Transaction No.:</span>
                                <span><?= $rows['transaction_number'] ?></span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-400">Receipt No.:</span>
                                <span>#5033</span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-400">Host:</span>
                                <span>Admin</span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-400">Customer:</span>
                                <span><?= $rows['full_name'] ?></span>
                            </p>
                        </div>
                        <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="flex">
                                        <th class="w-full py-2">Product</th>
                                        <th class="w-full py-2">QTY</th>
                                        <th class="min-w-[44px] py-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="flex py-1">
                                        <td class="flex-1"><?= $rows['i_name'] ?></td>
                                        <td class="flex-1"><?= $rows['quantity'] ?></td>
                                        <td class="min-w-[44px]"><?= number_format($rows['total']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class=" border-b border border-dashed"></div>
                            <div class="py-4 justify-center items-center flex flex-col gap-2">
                                <p class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <path d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 0 0-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7ZM12.75 2c0-.41-.34-.75-.75-.75s-.75.34-.75.75v2h1.5V2Z" fill="#000"></path>
                                        <path d="M22 9.81v1.04a2.06 2.06 0 0 0-.7-.12h-3.48c-1.55 0-2.94.86-3.63 2.24l-.75 1.48h-2.86l-.75-1.47a4.026 4.026 0 0 0-3.63-2.25H2.7c-.24 0-.48.04-.7.12V9.81C2 6.17 4.17 4 7.81 4h3.44v3.19l-.72-.72a.754.754 0 0 0-1.06 0c-.29.29-.29.77 0 1.06l2 2c.01.01.02.01.02.02a.753.753 0 0 0 .51.2c.1 0 .19-.02.28-.06.09-.03.18-.09.25-.16l2-2c.29-.29.29-.77 0-1.06a.754.754 0 0 0-1.06 0l-.72.72V4h3.44C19.83 4 22 6.17 22 9.81Z" fill="#000"></path>
                                    </svg> cugoncorp@gmail.com</p>
                                <p class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <path fill="#000" d="M11.05 14.95L9.2 16.8c-.39.39-1.01.39-1.41.01-.11-.11-.22-.21-.33-.32a28.414 28.414 0 01-2.79-3.27c-.82-1.14-1.48-2.28-1.96-3.41C2.24 8.67 2 7.58 2 6.54c0-.68.12-1.33.36-1.93.24-.61.62-1.17 1.15-1.67C4.15 2.31 4.85 2 5.59 2c.28 0 .56.06.81.18.26.12.49.3.67.56l2.32 3.27c.18.25.31.48.4.7.09.21.14.42.14.61 0 .24-.07.48-.21.71-.13.23-.32.47-.56.71l-.76.79c-.11.11-.16.24-.16.4 0 .08.01.15.03.23.03.08.06.14.08.2.18.33.49.76.93 1.28.45.52.93 1.05 1.45 1.58.1.1.21.2.31.3.4.39.41 1.03.01 1.43zM21.97 18.33a2.54 2.54 0 01-.25 1.09c-.17.36-.39.7-.68 1.02-.49.54-1.03.93-1.64 1.18-.01 0-.02.01-.03.01-.59.24-1.23.37-1.92.37-1.02 0-2.11-.24-3.26-.73s-2.3-1.15-3.44-1.98c-.39-.29-.78-.58-1.15-.89l3.27-3.27c.28.21.53.37.74.48.05.02.11.05.18.08.08.03.16.04.25.04.17 0 .3-.06.41-.17l.76-.75c.25-.25.49-.44.72-.56.23-.14.46-.21.71-.21.19 0 .39.04.61.13.22.09.45.22.7.39l3.31 2.35c.26.18.44.39.55.64.1.25.16.5.16.78z"></path>
                                    </svg> +234XXXXXXXX</p>
                            </div>
                        </div>
                    </div>
                </div>
<?php }
        }
    }
}
?>