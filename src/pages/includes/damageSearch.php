<?php
  require"../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $damageName = $_POST['damageName'];
   $product = "SELECT p.*, e.* FROM  products p, expences e WHERE p.id = e.medId AND name LIKE '%$damageName%' AND expenseType = 'Damaged' ORDER BY e.medId DESC";
   
   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $name = $row['name'];
      $image	= $row['image'];
      $price	= $row['price'];
      $Qty	 = $row['Qty'];
      $id	= $row['id'];
      $totalPrice	= $row['totalPrice'];
      $note	= $row['note'];
      
    ?>
<tr class="border-b dark:border-gray-600 bg-green-500 text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <td class="w-4 px-4 py-3">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <img src="../<?php echo $image;?>" alt="Drug Image" class="w-auto h-8 mr-3">
        <?php echo $name;?>
    </th>
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center">
            <?php 
            if ($Qty > 10) {
                echo '<div class="inline-block w-4 h-4 mr-2 bg-red-500 rounded-full"></div>';
            }else{
                echo '<div class="inline-block w-4 h-4 mr-2 bg-green-700 rounded-full"></div>';
            }
            ?>
            <?php $Qty?>
        </div>
    </td>
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $price;?></td>
    
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 text-white" aria-hidden="true">
                <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
            </svg>
            <?php echo $totalPrice;?>
        </div>
    </td>
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $note;?></td>
    
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
  
