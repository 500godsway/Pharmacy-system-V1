<?php
  require"../../config/function.php";

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
        $transactionCode = $row['transactionCode'];
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
            <?php echo $transactionCode	;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $sales_data;?>
            </td>
            
            <td class="px-6 py-4">
                <a href="sales_view.php?track=<?php echo $tracking_no;?>" class="font-medium text-white hover:underline bg-green-500 p-2">View</a>
            </td>
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