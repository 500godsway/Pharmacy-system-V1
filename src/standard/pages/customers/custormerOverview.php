<!DOCTYPE html>
<?php   require"../../../config/function.php";?>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <style>
      .select2-container .select2-selection--single{
        height: 42px !important;
        background-color: gray;
        display: flex;
        align-items: center;
        color:white !important;
        
      }
      
    </style>
  </head>
  <body class="bg-gray-100 dark:bg-slate-900 ">
      <?php
        if(!isset($_SESSION['productItem'])) {
            echo '<script> window.location.href = "posInvoice.php" </script>';
        }
      ?>
    <!-- Main modal -->

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

    <div class="sm:ml-64 mx-4">
      <?php 
        require "../../includes/navbar.php";
      ?>
      
      <div class="flex flex-col md:flex-row text-white w-full p-4  ">
      <?php 
                $paramValue = CheckParamId('id');
                if(!is_numeric($paramValue)) {
                    echo '.$$paramValue.';
                }
                ?>
                
            <!-- Customer information -->
            <div class="p-3 w-auto md:w-1/2 h-auto bg-gray-50 dark:bg-slate-800 m-2 text-slate-800 dark:text-white border border-slate-700 rounded-md">
                <div class="font-medium dark:text-white">Customer Name:</div>
                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-700" />
               <div class="flex flex-col gap-3">
                    <div class="flex flex-row gap-3">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>

                        </div>
                        <div>Orders</div>
                    </div>
                    <div class="flex flex-row gap-3">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                        </div>
                        <div>Balance</div>
                    </div>
                    
               </div>
            </div>
            
          <!-- Invoice start  -->
          <div id="myBilingArea"
                class="w-full md:auto text-slate-800 dark:text-white rounded shadow-sm" id="invoice">
                <?php
                $product = "SELECT ms.product_id as msProductId, p.name as productName,  s.*, ms.*, p.*, c.*, u.*
                FROM  users as u, sales  as s, medicine_sales as ms, products as p, customers as c
                WHERE c.id = s.customer_id AND  p.id = ms.product_id AND u.id = order_placed_by_id
                AND c.id = $paramValue"; 
                $result = mysqli_query($conn,$product);
                if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)){
                     $tracking_no = $row['tracking_no'];
                     $customerName = $row['customerName'];
                     $phone = $row['phone'];
                     $name = $row['name'];
                     $quantity = $row['quantity'];
                     $balance = $row['balance'];
                     $pAmount = $row['pAmount'];
                     $payment_mode = $row['payment_mode'];
                     $sales_data = $row['sales_data'];
                     //$row['sId'], $row['tracking_no'], $row['customerName'], $row['phone'], $row['name'], $row['pAmount'], $row['balance'], $row['payment_mode'], $row['sales_data'], $row['name']
                     ?>
            <div  class="w-full md:auto  bg-gray-50 dark:bg-slate-800 m-2 border border-slate-700 p-2 text-slate-800 dark:text-white rounded shadow-sm" id="invoice">
                <div class="flex flex-row justify-between items-center">
                    <div class="flex gap-2 items-center p-2">
                        <div>Tracking No: <span class="text-gray-800 dark:text-slate-800"></span> <?php echo $tracking_no?></div>
                        
                    </div>
                    <div class="px-4 rounded-md bg-green-500">Paid</div>  
                </div>
                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-700" />
                <div class="flex flex-row justify-between items-center p-4">
                    <div class="flex flex-row gap-2">
                        <div>Medicine Name</div>
                        <div><?php echo $customerName?></div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div>Quantitiy</div>
                        <div><?php echo $quantity?></div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div>Total</div>
                        <div>..... ....</div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <?php
            
              }else{
                echo "<td class='px-4 py-2 font-medium  whitespace-nowrap text-red-500'>No records !!</td>";
                }
              ?>
            </div>
        </div>
       
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
      function changeStatus(){
        var paymentMode = document.getElementById("payment_mode");
        if(paymentMode.value !== "Mpesa")
        {
          document.getElementById("mpesaCode").style.visibility="hidden";
        }else{
          document.getElementById("mpesaCode").style.visibility="visible";
        }
      }
    </script>
    <script>
      function subtract(){
        var pAmount = document.getElementById('pAmount').value;
        var dueAmount = document.getElementById('dueAmount').value;
        var balance =parseFloat(pAmount)-parseFloat(dueAmount);
        document.getElementById('balance').value = balance;
      }
      
    </script>
  </body>
</html>
