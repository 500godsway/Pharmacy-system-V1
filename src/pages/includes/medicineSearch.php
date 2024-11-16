<?php
  require"../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $medicineName = $_POST['medicineName'];
  $currency = $_SESSION['currency'];
   $product = "SELECT * FROM products WHERE name LIKE '%$medicineName%' ORDER BY id DESC ";

   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
   
      $name = $row['name'];
      $id = $row['id'];
      $is_ban = $row['is_ban'];
      $description	= $row['description'];
      $quantity	 = $row['quantity'];
      $image	= $row['image'];
      $sPrice	= $row['sPrice'];
      
      
    ?>
        <form action="../admins/invoiceAdd.php" method="POST">
                            <input type="hidden" name="productId" value="<?php echo $id;?>">
                            <input type="hidden" name="description" value="<?php echo $description;?>">
                            <input type="hidden" name="profit" value="<?php echo $profit;?>">
                          <article class="relative flex flex-col overflow-hidden rounded-lg border bg-white dark:bg-gray-800">
                              <div class="aspect-square overflow-hidden">
                              <img class="h-auto w-full object-cover transition-all duration-300 group-hover:scale-125" src="../<?php echo $image;?>" alt="" />
                              </div>
                              <div class="absolute top-0 m-2 rounded-full bg-white">
                              <?php
                                if ($quantity > 0) {
                                    ?>
                                    <p class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3"><?php echo $quantity;?> Drugs</p>
                                    <?php
                                }else {
                                    ?>
                                    <p class="rounded-full bg-red-600 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3"><?php echo $quantity;?> Drugs</p>
                                    <?php
                                }
                            ?>
                              </div>
                              <div class="flex  px-2 w-full items-center ">
                              <input  value="<?php echo $name;?>"
                              class="py-1 text-md flex-wrap uppercase text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none">
                              </div>
                              <div class=" mx-auto flex w-10/12 flex-col items-start justify-between">
                              <div class="mb-1 flex">
                              <input  value="<?php echo $currency?><?php echo $sPrice;?>.00" name="price"
                              class="py-1 text-lg font-bold flex-wrap text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none">
                              </div>
                              </div>
                              <div class="relative flex items-center qtyBox">
                              <input type="hidden" value="<?php echo $id;?>" 
                              class="prodId"/>
                              <button type="button"  
                                class="text-lg bg-gray-200 px-4 text-white dark:bg-gray-800 decreament dark:hover:bg-gray-900 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-s-lg   focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    -
                                </button>
                                <input 
                                type="text" 
                                value="0" 
                                name="quantity"
                                class="bg-gray-800 border-x-0 p-2 qty quantityInput border-gray-300  text-center text-gray-900 text-sm focus:ring-green-500 focus:outline-none block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="999" required />
                                <button type="button"  class="text-lg bg-gray-200  dark:bg-gray-800 increament dark:text-white px-4 dark:hover:bg-gray-900 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-e-lg  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    +
                                </button>
                          </div>
                          <?php
                            if ($is_ban == '0') {
                              ?>
                              <button type="submit" name="invoiceAdd" class="text-white bg-green-500 dark:bg-slate-900 p-2">Add</button>
                              <?php
                            }else {
                              ?>
                              <button type="button" name="restricted" class="text-white bg-red-500 p-2" disabled>Restricted</button>
                              <?php
                            }
                          ?>
                          </article>
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
  
