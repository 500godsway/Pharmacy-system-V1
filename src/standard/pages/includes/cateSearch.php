<?php
  require"../../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $cateName = $_POST['cateName'];
   $product = "SELECT * FROM categories WHERE categoryName LIKE '%$cateName%' ORDER BY id DESC ";

   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $categoryName = $row['categoryName'];
      $description	= $row['description'];
      $status	 = $row['status'];
      $id	= $row['id'];
      
    ?>
 <tr class="text-white border-b bg-green-500 dark:border-gray-700 hover:bg-green-400 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
    <?php echo $id;?>
    </th>
    <td class="px-6 py-4">
    <?php echo $categoryName;?>
    </td>
    <td class="px-6 py-4">
    <?php echo $description;?>
    </td>
    <td class=" text-white flex items-center px-6 py-4">
        <?php
        if ($status == 1) {
            echo "<p class='p-3 bg-green-500'>Active</p>";
        }else {
            echo "<p class='p-3 bg-red-500'>Inactive</p>";
        }
        ?>
    </td>
    <td class="px-6 py-4 ">
        <a href="category_edit.php?id=<?php echo $id;?>" class="rounded-lg font-medium text-gray-800 dark:text-white p-2 bg-green-500">Edit</a>
    </td>
    <td class="px-6 py-4">
        <a href="categoryDelete.php?id=<?php echo $id;?>" class="rounded-lg font-medium text-white dark:text-white bg-red-500 p-2">Delete</a>
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
  
