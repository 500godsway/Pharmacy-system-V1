<div class="relative p-3 border border-slate-700 overflow-x-auto shadow-md sm:rounded-lg">
        
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg border border-slate-700"> 
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        Tracking No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Customer name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Paid Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Balance
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Payment Mode
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Transaction Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sales Date
                    </th>
                    <th scope="col" colspan="3" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <?php 

            $start=0;
            global $conn;
            //global $start;
            global $page;
            global $rows_per_page;

            // Get the page no.
            if(isset($_GET['page-nr'])){
                $page = $_GET['page-nr']-1;
                $start = $page * $rows_per_page;
              }
            if (isset($_GET['start_date']) || isset($_GET['end_date']) || isset($_GET['payment_status'])) {
              $start_date = validate($_GET['start_date']);
              $end_date = validate($_GET['end_date']);
              $paymentStatus = validate($_GET['payment_status']);
              //echo $end_date;

              if ($start_date !== '' && $end_date !== '' && $paymentStatus == '') {
                $query = "SELECT s.*, c.* FROM  sales s, customers c
                WHERE c.id = s.customer_id 
                AND s.sales_data BETWEEN '$start_date' AND '$end_date' ORDER BY s.sId DESC";
              }elseif ($start_date !== '' && $end_date !== '' && $paymentStatus !== '') {
                $query = "SELECT s.*, c.* FROM  sales s, customers c
                WHERE c.id = s.customer_id
                AND s.sales_data BETWEEN '$start_date' AND '$end_date'
                AND s.payment_mode ='$paymentStatus' ORDER BY s.sId DESC";
              }else{
                $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id   ORDER BY s.sId LIMIT $start, $rows_per_page";
              }
            }else {
              $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id   ORDER BY s.sId LIMIT $start, $rows_per_page";
            }

                $sales = mysqli_query($conn, $query);
                if ($sales) {
                    if (mysqli_num_rows($sales) > 0) {
                        ?>

                        <!--Table goes here -->
                        <?php foreach($sales as $salesItem) :?>
                        <tbody id="search">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                              <?= $salesItem['tracking_no']?>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $salesItem['customerName']?>
                                </th>
                                <td class="px-6 py-4">
                                <?= $salesItem['phone']?>
                                </td>
                                <td class="px-6 py-4">
                                <?= $salesItem['pAmount']?>
                                </td>
                                <td class="px-6 py-4">
                                <?= $salesItem['balance']?>
                                </td>
                                <td class="px-6 py-4">
                                <?= $salesItem['payment_mode']?>
                                </td>
                                <td class="px-6 py-4">
                                <?= $salesItem['transactionCode']?>
                                </td>
                                
                                <td class="px-6 py-4">
                                <?= $salesItem['sales_data']?>
                                </td>
                              
                                <td class="px-6 py-4">
                                    <a href="../sales/sales_view.php?track=<?= $salesItem['tracking_no']?>" class="font-medium text-white hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-500">
                                      <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                      <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                    </svg>

                                  </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                        <!--Table ends here -->

                        <?php
                    }else{
                        echo "<p class='text-slate-800 dark:text-white'>No records available</p>";
                    }
                }else {
                    echo "Something went wrong";
                }
            ?>
            
        </table>
      </div>