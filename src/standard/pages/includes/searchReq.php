<?php
  require"../../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $medName = $_POST['medName'];
   $product = "SELECT * FROM purchases WHERE name LIKE '%$medName%' ORDER BY id DESC ";

   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $name = $row['name'];
      $id	= $row['mId'];
      
      
    ?>
    <form action="../includes/requisationAdd.php" method="POST">
        <input type="hidden" name="medicineId" value="<?php echo $id;?>">
    <div class=" text-gray-800 dark:text-white gap-3 flex flex-col justify-center p-2 overflow-x-auto shadow-md sm:rounded-lg">
        <div class="grid md:grid-cols-3 items-center justify-between">
            <div class="flex items-center justify-center">
                <input  value="Name:  <?php echo $name;?>" id="user"
                class="py-1 text-sm flex-wrap text-slate-900 dark:text-slate-300 dark:bg-transparent focus:outline-none"></>
            </div>
            <div class="flex items-center justify-center">
                <input name="quantity" class= "appearance-none block w-full bg-gray-100 dark:bg-gray-800   rounded py-3 px-4 mb-3 leading-tight focus:outline-none " id="destination" type="number" placeholder=" Quantity">
                <input type="hidden" name="user" value="<?= $_SESSION['loggedInUser']['name'];?>" 
                class="reqId"/>
            </div>
            <div class="flex items-center justify-center">
                <input name="destination" class= "appearance-none block w-full bg-gray-100 dark:bg-gray-800   rounded py-3 px-4 mb-3 leading-tight focus:outline-none " id="destination" type="text" required placeholder=" destination">
            </div> 
        </div>
        <div> <button type="submit" name="requestAdd" class="w-full text-slate-800 dark:text-white bg-gray-50 dark:bg-green-500 p-2 hover:bg-green-600">Request</button></div>
    </div>
    </form>
    <?php
   }
    ?>
    <?php
    
      }else{
        echo "<td class='px-4 py-2 font-medium  whitespace-nowrap text-red-500'>No records !!</td>";
      }
    }
    ?>
  
