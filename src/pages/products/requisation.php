<!DOCTYPE html>
<?php   require"../../config/function.php";?>
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
    <script src="https://cdn.tailwindcss.com"></script>
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
  <body class="dark:bg-slate-900 ">
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
      <div class="dark:bg-blue-600 h-[10%]">
      <?php 
        require "../../includes/navbar.php";
      ?>
      </div>
      
      <div class="dark:bg-slate-900 h-[90%] flex flex-col justify-between  p-4">
        <div>
        <div class="flex-col px-4 mb-40 bg-gray-50 dark:bg-gray-800 " id="">  
        <?php 
          alertMessage();
        ?>
        <!-- POS start--> 
           <div class="grid lg:grid-cols-2 w-full mb-5">
                <div class="">
                <section class=" py-12 text-gray-700  ">
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
                                    <input type="text" 
                                    type="search"
                                    name="medName"
                                    id="medName"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required />
                                </div>
                                
                            </form>

                        <!-- search-->
                        </div>
                        <div class="mt-10  lg:mt-16" id="search">
                        <?php
                    $purchases = getAll ('purchases');
                    if (mysqli_num_rows($purchases) > 0) {
                       ?>
                       <?php foreach($purchases as $purchasesItem) :?>
                        <form action="../includes/requisationAdd.php" method="POST">
                            <input type="hidden" name="medicineId" value="<?= $purchasesItem['mId']?>">
                            <input type="hidden" name="profit" value="<?= $purchasesItem['profit']?>">
                        <div class=" text-gray-800 dark:text-white gap-3 flex flex-col justify-center p-2 overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="grid md:grid-cols-3 items-center justify-between">
                                <div class="flex items-center justify-center">
                                    <input  value="Name:  <?= $purchasesItem['name']?>" id="user"
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
                <div  id="productAreA"
                class="max-w-3xl mx-auto px-6 py-2 bg-gray-50 dark:bg-gray-800 " id="invoice">
                <!-- Invoice Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0" id="productContent">
                    <?php
                    $totalAmount = 0;
                        if (isset($_SESSION['requestItem'])) {

                        $sessionMedicine = $_SESSION['requestItem'] ;
                          if (empty($sessionMedicine)) {
                            unset($_SESSION['requestItemIds']);
                            unset($_SESSION['requestItem']);
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
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold  sm:pl-0">Quantity</th>
                        <th scope="col" colspan="2"  class="py-3.5 pl-3 pr-4 text-center text-sm font-semibold  sm:pr-0">Action</th>
                    </tr>
                </thead>
                <?php 
                 $i = 1;
                 
                foreach($sessionMedicine as $key => $item) :
                  ?>
                <tbody id="search">
                    <tr class="border-b border-gray-200">
                        <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                            <div class="font-medium "><?= $item['name']?></div>
                        </td>
                        <td class="  max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0 ">
                        
                        <div class="relative flex items-center qtyBox">
                        <input type="hidden" value="<?= $item['requestId']?>" 
                        class="reqId"/>
                        <input type="hidden" value="<?= $_SESSION['loggedInUser']['name'];?>" 
                        class="reqId"/>
                            <button type="button"  
                            class="bg-gray-100 dark:bg-gray-800 pDecreament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-s-lg   focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                -
                            </button>
                            <input 
                            type="text" 
                            value="<?= $item['quantity']?>" 
                            class="bg-gray-50 border-x-0 p-2 qty quantityInput border-gray-300  text-center text-gray-900 text-sm focus:ring-blue-500 focus:outline-none block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                            <button type="button"  class="bg-gray-100  dark:bg-gray-800 pIncreament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-e-lg  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                +
                            </button>
                        </div>
                        </td>
                        <td colspan="2" class=" py-3.5 pl-3 pr-4 text-center text-sm font-semibold  sm:pr-0">
                        <div>
                        <a href="../includes/requestItemDelete.php?index=<?= $key;?>" class=" p-2 ml-2 bg-red-500 rounded-md hover:bg-red-600">Remove</a>
                        </div>
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
              echo 'No Request Made!';
            }
          ?>
            
        </div>
        </div>     
        </div>
           </div>
           <!-- POS end--> 
        </div>
        </div>
        <div class="flex w-full justify-center">
        <div class="fixed h-24 bottom-0  flex items-center p-3 mt-2 gap-4 justify-between w-auto rounded-md dark:bg-gray-950 ">
            <div class="reqDetails">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900  dark:text-white">Requested by: </label>
            <input type="text" value="<?= $_SESSION['loggedInUser']['name'];?>" id="user" aria-describedby="helper-text-explanation"  aria-label="disabled input" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <button type="button" id="proceedToOrder" class="proceedToOrder mt-6 bg-blue-600 p-2 text-white hover:bg-blue-700">Proceed </button>
        </div> 
        </div>
      </div>
    </div>
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
   
   <script>
            $(document).ready(function(){
          /*Searching stock details */
          $('#medName').keyup(function(event){
              event.preventDefault();
              var action = 'searchRecord';
              var medName = $('#medName').val();
              if(medName != ''){

                  $.ajax({
                      url: "../includes/searchReq.php",
                      method: "POST",
                      data: {action:action,medName:medName},
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
    <script src="../assets/reqCustom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  </body>
</html>
