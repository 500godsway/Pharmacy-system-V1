<div class="flex-col px-4  m-4" id="">  
           <!-- POS start--> 
           <div class="grid lg:grid-cols-2 w-full ">
                <div class="">
                <section class="bg-gray-50 dark:bg-gray-800 py-12 text-gray-700  ">
                    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-md text-center">
                        <!-- search-->
                            
                            <form class="flex items-center max-w-sm mx-auto">   
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4  dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required />
                                </div>
                                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>

                        <!-- search-->
                        </div>
                        <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-16">
                        <?php
                    $products = getAll ('products');
                    if (mysqli_num_rows($products) > 0) {
                       ?>
                       <?php foreach($products as $productsItem) :?>
                        <form action="../admins/invoiceAdd.php" method="POST">
                          <input type="hidden" name="productId" value="<?= $productsItem['id']?>">
                          <input type="hidden" name="description" value="<?= $productsItem['description']?>">
                        <article class="relative flex flex-col overflow-hidden rounded-lg border bg-white dark:bg-gray-800">
                            <div class="aspect-square overflow-hidden">
                            <img class="h-auto w-full object-cover transition-all duration-300 group-hover:scale-125" src="../<?= $productsItem['image']?>" alt="" />
                            </div>
                            <div class="absolute top-0 m-2 rounded-full bg-white">
                            <p class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3"><?= $productsItem['quantity']?> Drugs</p>
                            </div>
                            <div class=" mx-auto flex w-10/12 flex-col items-start justify-between">
                            <div class="mb-1 flex">
                            <input  value="Price:<?= $productsItem['sPrice']?>.00" name="sPrice"
                            class="py-1 text-lg font-bold flex-wrap text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none"></>
                            </div>
                            <input  value="Name:  <?= $productsItem['name']?>"
                            class="py-1 text-sm flex-wrap text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none"></>
                            </div>
                            <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <input type="text" name="quantity" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                        <button type="submit" name="invoiceAdd" class="text-slate-800 dark:text-white bg-gray-50 dark:bg-slate-900 p-2">Add</button>
                        </article>
                        </form>
                        <?php endforeach?>
                    <?php
                    }else{
                        ?>
                        <tr>
                            <td>No records found</td>
                        </tr>
                       <?php
                    }
                    ?>
                        </div>
                    </div>
                </section>
                </div>
                <div class="" > 
                <div  id="productArea"
                class="max-w-3xl mx-auto px-6 py-2 bg-gray-50 dark:bg-gray-800 " id="invoice">
                <!-- Invoice Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0" id="productContent">
                    <?php
                        if (isset($_SESSION['productItem'])) {

                        $sessionProducts = $_SESSION['productItem'] ;
                          if (empty($sessionProducts)) {
                            unset($_SESSION['productItemIds']);
                            unset($_SESSION['productItem']);
                          }
                    ?>
                  <table class="min-w-full">
                       <!-- Client info -->

                <colgroup>
                    <col class="w-full sm:w-1/2">
                    <col class="sm:w-1/6">
                    <col class="sm:w-1/6">
                    <col class="sm:w-1/6">
                </colgroup>
                <thead class="border-b border-gray-300 ">
                    <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold  sm:pl-0">Name</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold  sm:table-cell">Quantity</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold  sm:table-cell">Price</th>
                    <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold  sm:pr-0">Amount</th>
                    <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold  sm:pr-0">Action</th>
                    
                    </tr>
                </thead>
                <?php 
                 $i = 1;
                foreach($sessionProducts as $key => $item) :
                  ?>
                <tbody>
                    <tr class="border-b border-gray-200">
                    <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div class="font-medium "><?= $item['name']?></div>
                        <div class="mt-1 truncate "><?= $item['description']?></div>
                    </td>
                    <td class="  ">
                      
                    <div class="relative flex items-center qtyBox">
                    <input type="hidden" value="<?= $item['productId']?>" 
                      class="prodId"/>
                        <button type="button"  
                        class="bg-gray-100 dark:bg-gray-800 decreament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-s-lg   focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            -
                        </button>
                        <input 
                        type="text" 
                        value="<?= $item['quantity']?>" 
                        class="bg-gray-50 border-x-0 p-2 qty quantityInput border-gray-300  text-center text-gray-900 text-sm focus:ring-blue-500 focus:outline-none block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                        <button type="button"  class="bg-gray-100  dark:bg-gray-800 increament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-e-lg  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            +
                        </button>
                    </div>
                    </td>
                    <td class="hidden px-3 py-5 text-right text-sm  sm:table-cell"><?= $item['price']?></td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm  sm:pr-0"><?= number_format($item['price'] * $item['quantity'],0); ?></td>
                    <td class="">
                      <a href="../admins/order-item-delete.php?index=<?= $key;?>" class="flex items-center p-2 ml-2 bg-red-500 rounded-md">Remove</a>
                    </td>
                    </tr>
                    
                </tbody>
                <?php endforeach;?>
                <!--
                <tfoot>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal  sm:table-cell sm:pl-0">Subtotal</th>
                    <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal  sm:hidden">Subtotal</th>
                    <td class="pl-3 pr-6 pt-6 text-right text-sm  sm:pr-0">$10,500.00</td>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal  sm:table-cell sm:pl-0">Tax</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal  sm:hidden">Tax</th>
                    <td class="pl-3 pr-6 pt-4 text-right text-sm  sm:pr-0">$1,050.00</td>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal  sm:table-cell sm:pl-0">Discount</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal  sm:hidden">Discount</th>
                    <td class="pl-3 pr-6 pt-4 text-right text-sm  sm:pr-0">- 10%</td>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold  sm:table-cell sm:pl-0">Total</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold sm:hidden">Total</th>
                    <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold  sm:pr-0">$454546</td>
                    </tr>
                    <?php  ?>
                </tfoot>
                 -->
                  </table>
               
              <?php
            }else {
              echo 'No Medicine added!';
            }
          ?>
            
        </div>
        </div>     
        </div>
           </div>
           <!-- POS end--> 
        </div>





        