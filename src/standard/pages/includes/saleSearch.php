<?php
  require"../../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $tracNo = $_POST['tracNo'];
   $product = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id  AND tracking_no LIKE '%$tracNo%' ORDER BY s.sId DESC"; 
   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tracking_no = $row['tracking_no'];
        $customerName = $row['customerName'];
        $phone = $row['phone'];
        $balance = $row['balance'];
        $payment_mode = $row['payment_mode'];
        $pAmount = $row['pAmount'];
        $sales_data = $row['sales_data'];
        ?>
         <tr class=" border-b bg-green-500 dark:border-gray-700 text-white hover:bg-green-400 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
            <?php echo $tracking_no;?>
            </td>
            <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
            <?php echo $customerName;?>
            </th>
            <td class="px-6 py-4">
            <?php echo $phone;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $pAmount;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $balance;?>
            </td>
            
            <td class="px-6 py-4">
            <?php echo $payment_mode;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $sales_data;?>
            </td>
            
            <td class="px-6 py-4">
                <a href="sales_view.php?track=<?php echo $sales_data;?>" class="font-medium text-white hover:underline bg-green-500 p-2">View</a>
            </td>
            <?php
            $pStatus = $salesItem['balance'];
            if ($pStatus > 0) {
                ?>
                <td class="px-6 py-4">
                <a href="invoices.php?track=<?php echo $tracking_no;?>" class="font-medium text-white hover:underline bg-red-500 p-2">Invoice</a>
                </td>
                <?php
            }else{
                ?>
                <td class="px-6 py-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>
                </td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
    <?php
    
      }else{
        echo "<td class='px-4 py-2 font-medium  whitespace-nowrap text-red-500'>No records !!</td>";
      }
    }
    ?>