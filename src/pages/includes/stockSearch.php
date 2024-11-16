<?php
  require"../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $stockName = $_POST['stockName'];
  $todayDate = date("y-m-d ");
   $product = "SELECT  p.*
   FROM  products as p
   WHERE  p.expiryDate <= '$todayDate' AND p.quantity > 0 AND name LIKE '%$stockName%'
   ORDER BY p.id DESC";
   
   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $name = $row['name'];
      $expiryDate	= $row['expiryDate'];
      $quantity	= $row['quantity'];
      $sPrice	 = $row['sPrice'];
      $id	= $row['id'];
      $totalAmount = $sPrice * $quantity;
      
    ?>
         <tr class="text-white border-b bg-green-500 dark:border-gray-700 hover:bg-green-400 dark:hover:bg-gray-600">
                    <td class="w-4 p-1">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-1 font-medium  whitespace-nowrap dark:text-white">
                    <?php echo $name;?>
                    </th>
                    <td class="px-6 py-1">
                    <?php echo $expiryDate;?>
                    </td>
                    <td class="px-6 py-1">
                    <?php echo $quantity;?>
                    </td>
                    
                    <td class="px-6 py-1">
                    <?php echo $sPrice;?>
                    </td>
                    <td class="px-6 py-1">
                    Ksh. <?= number_format($totalAmount, 0); ?>
                    </td>
                    <td class="px-6 py-1">
                       <!-- Modal toggle -->
                    <a href="javascript:void(0)" data-modal-target="crud-modal" data-id=" <?php echo $id;?>" data-modal-toggle="crud-modal" 
                    class=" view text-white  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                          <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                        </svg>
                    </a>
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
  
