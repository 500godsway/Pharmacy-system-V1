<?php
  require"../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $purName = $_POST['purName'];
   $product = "SELECT * FROM purchases WHERE name LIKE '%$purName%' ORDER BY id DESC ";

   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $id = $row['id'];
      $name = $row['name'];
      $category	= $row['category'];
      $quantity	 = $row['quantity'];
      $sellingPrice	= $row['sellingPrice'];
      $buyingPrice = $row['buyingPrice'];
      $profit	 = $row['profit'];
      $supplier	= $row['supplier'];
      $expiryDate	= $row['expiryDate'];
      $DOP	= $row['DOP'];
    ?>
    <tr class="text-white border-b bg-green-500 dark:border-gray-700 hover:bg-green-400 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                <?php echo $name;?>
                </th>
                <td class="px-6 py-4">
                <?php echo $category;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $quantity;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $sellingPrice;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $buyingPrice;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $profit;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $DOP;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $supplier;?>
                </td>
                <td class="px-2">
                <?php echo $expiryDate;?>
                </td>
                <td class="px-6 py-4 ">
                <a href="purchaseEdit.php?id= <?php echo $id;?>" class="font-medium text-white dark:text-white p-2 bg-green-500">Edit</a>
                </td>
                <td class="px-6 py-4">
                <a 
                href="deletePurchases.php?id= <?php echo $id;?>" class="font-medium text-white dark:text-white bg-red-500 p-2"
                onclick="return confirm('Are you sure you want to delete this image')"
                >
                Delete
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
  
