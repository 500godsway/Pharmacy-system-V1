<!DOCTYPE html>
<?php   require"../../config/function.php";?>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <style>
      .select2-container .select2-selection--single{
        height: 42px !important;
        background-color: white;
        display: flex;
        align-items: center;
        color:white !important;
      }
      .select2-container{
        background-color: rgb(30 41 59);
      }
    </style>
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
      <div class="dark:bg-green-600 h-[10%]">
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
        <div class="grid  w-full mb-5">
            
            <div class="" > 
            <div  id="orderArea"
            class="max-w-3xl mx-auto px-6 py-2 bg-gray-50 dark:bg-gray-900 " id="invoice">
            <!-- Invoice Items -->
            <div class="-mx-4 mt-8 flow-root sm:mx-0" id="OrderContent">
                <?php $orderNo = validate($_GET['track']);
                $totalAmount = 0;
                $saleItemQuery = "SELECT * FROM salesorders WHERE orderNo ='$orderNo'
                ORDER BY id DESC";

                $saleItemRes = mysqli_query($conn, $saleItemQuery);
                if ($saleItemRes) {
                    if (mysqli_num_rows($saleItemRes) > 0) {
                      $salesData = mysqli_fetch_assoc($saleItemRes);
                    ?>
            <!-- PHP code start here.. -->
                <div class="container">
                <div>  
                <!--  Company logo  -->
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="company-logo" height="100" width="100">
                </div>
                <div class="text-right">
                    <p>
                    Tailwind Inc.
                    </p>
                    <p class=" text-sm">
                    sales@tailwindcss.com
                    </p>
                    <p class=" text-sm mt-1">
                    +41-442341232
                    </p>
                    <p class=" text-sm mt-1">
                    VAT: 8657671212
                    </p>
                </div>
                </div>
                <?php ?>
                <!-- Client info -->
                <div class="grid grid-cols-2 items-center mt-8">
                <div>
                    <p class=" ">
                    <span class="font-bold">Bill to :<?= $salesData['customerName']?></span>  
                    </p>
                    <p class="">
                    <span class="font-bold">Phone : <?= $salesData['phone']?></span> 
                    </p>
                    <p class="">
                    <span class="font-bold">Email : <?= $salesData['email']?></span> 
                    </p>
                </div>
                <div class="text-right">
                    <p class="">
                    Order number:
                    <span class=""><?= $salesData['orderNo']?></span>
                    </p>
                    <p>
                    Invoice date: <span class=""><?= date('d M Y');?></span>
                    <br />
                    Due date:<span class=""><input type="date" class="bg-transparent focus:outline-none"></span>
                    </p>
                </div>
                </div>
                <!-- Invoice Items -->
                <div class="-mx-4 mt-8 flow-root sm:mx-0">
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
                        
                        </tr>
                    </thead>       
                    <?php foreach($saleItemRes as $orderItemRow) :?>  
                      <?php $totalAmount += $orderItemRow["price"] * $orderItemRow['quanitity'];?>          
                <tbody>
                    <tr class="border-b border-gray-200">
                        <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                            <div class="font-medium "><?= $orderItemRow['medicineName']?></div>
                        </td>
                        <td class="  max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0 ">
                        <div class="relative flex items-center qtyBox">
                          <input type="hidden" value="<?= $orderItemRow['orderId']?>" 
                              class="ordersId"/>
                              <input type="hidden" value="" 
                              class="reqId"/>
                              <input type="hidden" value="<?= $_SESSION['loggedInUser']['name'];?>" 
                              class="reqId"/>
                              <button type="button"  
                              class="bg-gray-100 dark:bg-gray-900 pDecreament dark:hover:bg-gray-900 dark:border-gray-900 hover:bg-gray-200 border border-gray-300 rounded-s-lg   focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                  -
                              </button>
                              <input 
                              type="text" 
                              value="<?= $orderItemRow['quanitity']?>" 
                              class="bg-gray-50 border-x-0 p-2 qty quantityInput border-gray-300  text-center text-gray-900 text-sm focus:ring-green-500 focus:outline-none block w-full  dark:bg-gray-900 dark:border-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="999" required />
                              <button type="button"  class="bg-gray-100  dark:bg-gray-900 pIncreament dark:hover:bg-gray-900 dark:border-gray-900 hover:bg-gray-200 border border-gray-300 rounded-e-lg  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                  +
                              </button>
                          </div>
                            </td>
                            <td class="max-w-0 py-5  pl-4 pr-3 text-right text-sm sm:pl-0">
                                <div class="font-medium"><?= ($orderItemRow['price']); ?></div>
                            </td>
                            <td class="max-w-0 py-5  pl-4 pr-3 text-right text-sm sm:pl-0">
                                <div class="font-medium"><?= number_format($orderItemRow['price'] * $orderItemRow['quanitity'],0); ?></div>
                            </td>
                        </div>
                        <td colspan="2" class=" py-3.5 pl-3  pr-4 text-center text-sm font-semibold  sm:pr-0">
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
                <tfoot>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal  sm:table-cell sm:pl-0">Amount Due</th>
                    <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal  sm:hidden">Amount Due</th>
                    <td class="pl-3 pr-6 pt-6 text-right text-sm  sm:pr-0">Ksh. <?= number_format($totalAmount, 0); ?></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>             
            <?php
            }else {
            echo"No records found";
            }
        }else {
            echo "Something Went wrong";
        }
        ?>
      </table>
        </div>
    <!--  Footer  -->
    <div class="border-t-2 pt-4 text-md  text-center mt-16">
    </div> 
    <!-- PHP code end here.. -->
    </div>
    </div>     
        </div>
           </div>
           <!-- POS end--> 
        </div>
        </div>
        <div class="flex w-full justify-center">
        <div class="fixed h-24 bottom-0  flex items-center  p-3 mt-2 gap-4 justify-center w-auto rounded-md dark:bg-gray-950 ">
            <form action="../admins/code.php" method="POST" class="flex gap-3 items-center justify-center">
            <input type="hidden" name="orderNo" value="<?= ($orderItemRow['orderNo']); ?>">
            <div>
              <?php 
                if ($orderItemRow['totalAmount'] <  $orderItemRow['price']) {
                  ?>
                  <label for="" class="block text-sm font-medium text-gray-900  dark:text-white">Payment </label>
                  <input type="text" name="paid"  value="<?php echo $orderItemRow['totalAmount']?>" class="appearance-none block w-48  bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-2 leading-tight focus:outline-none  dark:text-white">
                  <?php
                }
                else {
                  ?>
                  <label for="" class="block text-sm font-medium text-gray-900  dark:text-white">Payment </label>
                  <input type="text" name="" value="Paid" disabled class=" appearance-none block w-48  bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-2 leading-tight focus:outline-none  dark:text-white">
                  <?php
                }
              ?>
            
            </div>
            <div class="reqDetails">
            <label for="" class="block text-sm font-medium text-gray-900  dark:text-white">Shipping Status: </label>
            <select name="shippingStatus"
              class=" appearance-none block w-48 mySelect2 bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-2 leading-tight focus:outline-none  dark:text-white" name="state">
                  <option value="<?= ($orderItemRow['shippingStatus']); ?>"><?= ($orderItemRow['shippingStatus']); ?></option>
                  <option value="Ordered">Ordered </option>
                  <option value="Packed">Packed </option>
                  <option value="Shipped">Shipped </option>
                  <option value="Delivered">Delivered </option>
                  <option value="Cancelled">Cancelled </option>     
            </select>
            </div>
            <div class="reqDetails">
            <label for="" class="block text-sm font-medium text-gray-900  dark:text-white">Payment Status: </label>
            <select name="paymentStatus"
              class=" appearance-none block w-48 mySelect2 bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-2 leading-tight focus:outline-none  dark:text-white" name="state">
                  <option value="<?= ($orderItemRow['status']); ?>"><?= ($orderItemRow['status']); ?></option>
                  <option value="Pending">Pending </option>
                  <option value="Paid">Paid </option>
                  <option value="Cancelled">Cancelled </option>     
            </select>
            </div>
            <?php  if($orderItemRow['totalAmount'] <  $orderItemRow['price']) : ?>
                <div class="w-48">
                    <button type="submit"  name="updateOrderSales" class="p-2 mt-4 hover:bg-red-500 bg-green-500 w-full text-white">
                        Update 
                    </button>
                </div>
                </form>
           <?php endif; ?>
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
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/reqCustom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      </script>
</body>
</html>