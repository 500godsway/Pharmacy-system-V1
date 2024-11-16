<!DOCTYPE html>
<?php   require"../../config/function.php";

//Fetch Currency from database --------------->
$sql ="SELECT * FROM pharprofile";
//create a query that fetch data from the database
$res = mysqli_query($conn,$sql);
$profile = mysqli_fetch_array($res);	
?>

<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
   <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
    </script>
  </head>
  <body class="bg-slate-200 dark:bg-slate-900 ">
    <button
      data-drawer-target="sidebar-multi-level-sidebar"
      data-drawer-toggle="sidebar-multi-level-sidebar"
      aria-controls="sidebar-multi-level-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm  rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    >
      <span class="sr-only">Open sidebar</span>
      <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          clip-rule="evenodd"
          fill-rule="evenodd"
          d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
        ></path>
      </svg>
    </button>
    <?php 
      require "../../includes/aside.php";
    ?>
    <div class="sm:ml-64  dark:text-white ">
      <div class="dark:bg-green-600 h-[10%]">
    <?php 
      require "../../includes/navbar.php";
    ?>
      </div>
    <?php 
        alertMessage();
      ?>
      <div class="dark:bg-slate-900 h-[90%] flex flex-col justify-between  p-4">
        <div>
        <div class="flex flex-col  mb-40  dark:bg-gray-800 " id="">  
            <!-- POS start--> 
          <div class="flex w-full mb-5">
            <div class="">
              <section class=" py-12 text-gray-700  ">
                  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center gap-4">
                      <div class="mx-auto  w-full text-center">
                      <!-- search-->
                          <form class="flex items-center  mx-auto">   
                              <label for="simple-search" class="sr-only">Search</label>
                              <div class="relative w-full">
                                  <input type="text" 
                                  type="search"
                                  name="medicineName"
                                  id="medicineName"
                                  id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Search medicine " required />
                              </div>
                          </form>
                      <!-- search-->
                        </div>
                        <?php
                         $_SESSION['currency'] = $currency;
                          $totalAmount = 0;
                          if (isset($_SESSION['productItem'])) {
                          $sessionProducts = $_SESSION['productItem'] ;
                          
                            if (empty($sessionProducts)) {
                              unset($_SESSION['productItemIds']);
                              unset($_SESSION['productItem']);
                              $sessionProducts=0;
                            }
                          }
                          ?>
                      <div>
                      <button id="dropdownPOSButton" data-dropdown-toggle="dropdownPOS" class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                      </svg>
                      <?php if (empty($sessionProducts)){
                      ?>
                      <div class="absolute items-center justify-center block w-5 h-5 bg-green-500 border-2 border-white rounded-full -top-1 start-2 dark:border-gray-200"><p class="text-white text-xs"><?php echo 0 ;?></p></div>
                      <?php
                        }else {
                          ?>
                          <div class="absolute items-center justify-center block w-5 h-5 bg-green-500 border-2 border-white rounded-full -top-1 start-2 dark:border-gray-200"><p class="text-white text-xs"><?php echo count($sessionProducts) ;?></p></div>
                          <?php
                        }
                      ?>
                        </button>
                      </div>
                      </div>
                      <div id="search" class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-16 ">
                      <?php
                        $products = getAll ('products');
                        if (mysqli_num_rows($products) > 0) {
                      ?>
                      <?php foreach($products as $productsItem) :?>
                      <div class=" dark:border-slate-700 w-24 shadow-md">
                        <form action="../admins/invoiceAdd.php" method="POST">
                          <input type="hidden" name="productId" value="<?= $productsItem['id']?>">
                         
                          <input type="hidden" name="description" value="<?= $productsItem['description']?>">
                          <input type="hidden" name="profit" value="<?= $productsItem['profit']?>">
                        <article class="relative flex flex-col overflow-hidden rounded-lg border bg-white dark:bg-gray-800">
                            <div class="aspect-square overflow-hidden">
                            <img class="h-auto w-full object-cover transition-all duration-300 group-hover:scale-125" src="../<?= $productsItem['image']?>" alt="" />
                            </div>
                            <div class="absolute top-0 m-2 rounded-full bg-white">
                            <?php
                              if ($productsItem['quantity'] > 0) {
                                  ?>
                                  <p class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3"><?= $productsItem['quantity']?> Drugs</p>
                                  <?php
                              }else {
                                  ?>
                                  <p class="rounded-full bg-red-600 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3"><?= $productsItem['quantity']?> Drugs</p>
                                  <?php
                              }
                          ?>
                            </div>
                            <div class="flex  px-2 w-full items-center ">
                            <input  value="<?= $productsItem['name']?>"
                            class="py-1 text-md flex-wrap uppercase text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none">
                            </div>
                            <div class=" mx-auto flex w-10/12 flex-col items-start justify-between">
                            <div class="mb-1 flex">
                            <input  value="<?php echo $profile['Currency'];?><?= $productsItem['sPrice']?>.00" name="price"
                            class="py-1 text-lg font-bold flex-wrap text-slate-900 dark:text-slate-300 dark:bg-slate-800 focus:outline-none">
                            </div>
                            </div>
                            <div class="relative flex items-center qtyBox">
                            <input type="hidden" value="<?= $productsItem['id']?>" 
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
                          if ($productsItem['is_ban'] == '0') {
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
                        
                      </div>
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
                  class="max-w-3xl mx-auto px-6 py-2  " id="invoice">
                  <!-- Invoice Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0" id="productContent">
                  </div>
                  </div>     
                </div>
            </div>
            <!-- POS end--> 
              <!--POS of Sales Items start-->
          <div id="dropdownPOS" class="z-20 hidden h-96 overflow-auto w-1/2 md:max-w-80 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownPOSButton">
            <div class="block px-2 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                Notifications
              </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-700">
            <?php foreach($notificationRes as $notificationResRow) :?>
              <a href="../stock/stock.php" class="flex px-2 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11" src="../<?= $notificationResRow['image'];?>" alt="Jese image">
                  <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-white border text-red-500 border-white rounded-full dark:border-gray-800">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                    <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
                    </svg>
                  </div>
                </div>
                <div class="w-full ps-3">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">This drug(s) has Expired  <span class="font-semibold text-gray-900 dark:text-white"><?= $notificationResRow['name'];?></span>: Quanity : <span class="font-semibold text-gray-900 dark:text-white"><?= $notificationResRow['quantity'];?></span></div>
                    <div class="text-xs text-green-600 dark:text-green-500">Take action</div>
                </div>
              </a>
            <?php endforeach; ?>
              </div>
            </div>
              <!--POS of Sales Items end-->
          </div>
          </div>
        <div class="flex w-full justify-end">
        <div class="fixed h-24 bottom-0  flex items-center p-3 mt-2 gap-4 justify-between w-auto  ">
              <a href="invoice-summery.php" class=" mt-6 bg-green-600 p-2 rounded-lg text-white " id="proceedToPlace">Continue</a>
          </div> 
          </div>
        </div>
      </div>
                  <!--POS of Sales Items -->
    <script>
      var themeToggleDarkIcon = document.getElementById(
        "theme-toggle-dark-icon"
      );
      var themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
      );

      // Change the icons inside the button based on previous settings
      if (
        localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        themeToggleLightIcon.classList.remove("hidden");
      } else {
        themeToggleDarkIcon.classList.remove("hidden");
      }

      var themeToggleBtn = document.getElementById("theme-toggle");

      themeToggleBtn.addEventListener("click", function () {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        // if set via local storage previously
        if (localStorage.getItem("color-theme")) {
          if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
          } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
          }

          // if NOT set via local storage previously
        } else {
          if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
          } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
          }
        }
      });
    </script>
   </script>
   <script>
            $(document).ready(function(){
          /*Searching stock details */
          $('#medicineName').keyup(function(event){
              event.preventDefault();
              var action = 'searchRecord';
              var medicineName = $('#medicineName').val();
              if(medicineName != ''){

                  $.ajax({
                      url: "../includes/medicineSearch.php",
                      method: "POST",
                      data: {action:action,medicineName:medicineName},
                      success: function(data){
                        $("#search").html(data);
                      }
                  });
              }
          })
      })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  </body>
</html>
