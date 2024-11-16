<form method="POST" action="includes/updateMedInc.php"  class=" md:p-5 modal-body">
            <?php 
            require '../../../config/function.php';
            $totalAmount = 0;
            $medicineId = $_POST['medicineId'];
            $query = "SELECT  p.*, c.categoryName as categoryName FROM  products p, categories c WHERE c.id = p.categoryId AND p.id = $medicineId ORDER BY p.id DESC";
            $product = mysqli_query($conn, $query);
             if ($product)    {
               if (mysqli_num_rows($product) > 0) {
                    $productData = mysqli_fetch_assoc($product);

                    ?>
              <div class="col-span-4">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                  <input type="text" name="name" id="name"
                  value="<?= $productData['name'];?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>
              <div class="col-span-2 sm:col-span-1">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Category</label>
                  <input type="text" name="categoryName" id="price"
                  value="<?= $productData["categoryName"] ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
              </div>
              
              <input type="hidden" name="medId" value="<?=$productData['id']?>">
              <input type="hidden" name="price" value="<?=$productData['sPrice']?>">  
              <div class="grid grid-cols-2 gap-2">

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Available Qty</label>
                        <input type="number" name="quanitity" id="price"
                        value="<?= $productData['quantity'];?>"
                        class="bg-gray-50 border border-gray-300 w-full text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block auto p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Adjust Amount</label>
                        <input type="number" name="adjQty" id="adjQty" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="9" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1" >
                    <label for="price" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Type</label>
                    <input type="text"  name="expenseType" id="expenseType" value="Expired Medicine"
                    class="bg-gray-50 border border-gray-300 text-gray-900 w-full text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Expence type" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1" >
                      <label for="price" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Date</label>
                      <input type="date"  name="expenseDate" id="expenseType" 
                      class="bg-gray-50 border border-gray-300 w-full text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Expence type" required="">
                      <p class="text-xs text-red-500 italic">This could be expired date or medicine damage date</p>
                    </div>
                </div>
                
                <div class="col-span-2 mb-4" >
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes (optional)</label>
                  <textarea id="description" name="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Add notes"></textarea>                    
                </div>
                    
                <?php
            }else {
            echo"No records found";
            }
          }else {
            echo "Something Went wrong";
          }
      ?>
        <button type="submit" name="adjustStock" class="w-full flex justify-center text-white items-center bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                </svg>
                    Continue to Adjust
            </button>
        </form>