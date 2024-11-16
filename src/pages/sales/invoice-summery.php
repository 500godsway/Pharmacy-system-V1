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

    <div class="sm:ml-64 ">
      <?php 
        require "../../includes/navbar.php";
      ?>
       <div class="m-4">
       <a href="posInvoice.php"  class="focus:outline-none text-slate-800 dark:text-white bg-green-500 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-green-800">Add More..</a>
       </div>
      <div class="grid md:grid-cols-2 gap-4  text-white  p-4 ">
            <!-- Customer information -->
            <div class="flex  ">
    
            <div class="p-3 bg-gray-50 dark:bg-slate-800  text-slate-800 dark:text-white border border-slate-700 rounded-md">
                
                <label class="mb-5 block text-base font-semibold  sm:text-xl">
                  Customer Details
                </label>
                    <div class="-mx-3 flex ">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                            <p class="text-xs italic">Add First Time Customers (Click the button Below)</p>
                                <label for="time" class=" flex mb-3 gap-4 text-base font-medium ">
                                <a  href="javascript:void(0)" data-modal-target="crud-modal2"  data-modal-toggle="crud-modal2" href="javascript:void(0)"> 
                                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                </a>   
                                </label>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="time" class="mb-3 block text-base font-medium ">
                                    Phone Number <span class="text-xs italic">For Existing Customers only</span>
                                </label>
                                <select name="name" id="cphone"
                              class="w-full rounded-md  mySelect2 bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md"  name="state">
                            <option value="AL">--Select Customer --</option>
                            <?php
                              $customers = getAll('customers');
                              if ($customers) {
                                if (mysqli_num_rows($customers) > 0) {
                                foreach ($customers as $key => $cust) {
                                  ?>
                                  <option value="<?= $cust['phone'];?>"><?= $cust['phone'];?></option>
                                  <?php
                                }
                                }else {
                                  echo'<option value="AL">No customers found</option>';
                                }
                              }else {
                                echo'<option value="AL">Something Went Wrong</option>';
                              }
                            ?>
                        </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 pt-3" onload="subtrat();">
                        <label class="mb-5 block text-base font-semibold  sm:text-xl">
                            Payments Details 
                        </label>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <input type="number" name="area" id="dueAmount" onclick="subtract()" placeholder="Enter Amount Due"
                                       class="w-full rounded-md  bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md" />
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                <select id="payment_mode" onchange="changeStatus()" class="w-full rounded-md  bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md">
                                  <option selected class=" text-xs ">Mode of Payment</option>
                                  <option value="Cash">Cash</option>
                                  <option value="Mobile Money">Mobile Money</option>
                                  <option value="Card">Card</option>
                                </select>
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <input type="number" name="state" onclick="subtract()" id="pAmount" placeholder="Enter Payment"
                                       class="w-full rounded-md  bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md" />
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <input type="number" name="post-code" id="balance"  onclick="subtract()" placeholder="Balance"
                                       class="balance w-full rounded-md  bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md" />
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <input type="text" name="post-code" id="transactionCode" onclick="subtract()" placeholder="Transaction Code"
                                       class="w-full rounded-md  bg-white dark:bg-slate-800 border border-slate-700 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-green-500 focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    <button type="button" class=" w-full proceedToPlace mt-6 bg-green-600 p-2 text-white">Submit </button>
                    </div>
            </div>
            </div>
          <!-- Invoice start  -->
          <div id="myBilingArea"
        class=" mx-auto p-6  bg-gray-50 dark:bg-slate-800  text-slate-800 dark:text-white rounded shadow-sm" id="invoice">
        
        <!-- PHP code start here.. -->
        <?php 
         $payment_mode = "";
         $balance = "";
         $transactionCode = "";
         $pAmount = "";
         $invoiceNo = "";
         $phone = "";
         $payment_mode = "";
            if(isset($_SESSION["cphone"])) {
                $phone = validate($_SESSION['cphone']);
                $balance = validate($_SESSION['balance']);
                $transactionCode = validate($_SESSION['transactionCode']);
                $pAmount = validate($_SESSION['pAmount']);
                $invoiceNo = validate($_SESSION['invoice_no']);
                $payment_mode  =validate($_SESSION["payment_mode"]) ;

                $customerQuery = mysqli_query($conn, "SELECT * FROM customers WHERE phone= '$phone' LIMIT 1");
                if ($customerQuery) {
                   if (mysqli_num_rows($customerQuery) > 0) {
                   $cRowData = mysqli_fetch_assoc($customerQuery);  
                   ?>
                    <div class="container">
                    </div>
                    <!-- Client info -->
                    <div class="grid grid-cols-2 items-center mt-8">
                    <div>
                        <p class=" ">
                        <span class="font-bold">Bill to :</span>  <?= $cRowData['customerName']?>
                        </p>
                        <p class="">
                        <span class="font-bold">Phone :</span> <?= $cRowData['phone']?>
                        </p>
                        <p class="">
                        <span class="font-bold">Email :</span>
                        <?= $cRowData['email']?>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="">
                        Receipt number:
                        <span class=""><?= $invoiceNo?></span>
                        </p>
                        <p>
                        Receipt date: <span class=""><?= date('d M Y');?></span>
                        </p>
                    </div>
                    </div>
                    <?php
                   }
                }
            }
        ?>
        <?php 
            if(isset($_SESSION["productItem"])) {
                $sessionProducts = $_SESSION["productItem"];
                ?>
                    <!-- Invoice Items -->
                    <div class="-mx-4 mt-8 flow-root sm:mx-0" id="productArea">
                      <div id="productContent">
                    <table class="min-w-full" >
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
                <?php 
                 $i = 1;
                 $totalAmount = 0;
                foreach($sessionProducts as $key => $item) :
                    $totalAmount += $item["price"] * $item['quantity'];
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
                        class="bg-gray-200 dark:bg-gray-800 decreament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-s-lg   focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            -
                        </button>
                        <input 
                        type="text" 
                        value="<?= $item['quantity']?>" 
                        class="bg-gray-800 border-x-0 p-2 qty quantityInput border-gray-300  text-center text-gray-900 text-sm focus:ring-green-500 focus:outline-none block w-full  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="999" required />
                        <button type="button"  class="bg-gray-200  dark:bg-gray-800 increament dark:hover:bg-gray-600 dark:border-gray-800 hover:bg-gray-200 border border-gray-300 rounded-e-lg  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            +
                        </button>
                    </div>
                    </td>
                    <td class="hidden px-3 py-5 text-right text-sm  sm:table-cell"><?= number_format($item['price'],0)?></td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm  sm:pr-0"><?= number_format($item['price'] * $item['quantity'],0); ?></td>
                    <td class="">
                      <a href="../admins/order-item-delete.php?index=<?= $key;?>" class="flex items-center p-2 ml-2 bg-red-500 rounded-md">Remove</a>
                    </td>  
                  </tr>
                </tbody>
                <?php endforeach;?>
                <tfoot>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal  sm:table-cell sm:pl-0">Amount Due</th>
                    <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal  sm:hidden">Amount Due</th>
                    <td class="pl-3 pr-6 pt-6 text-right text-sm  sm:pr-0"><?php echo $profile['Currency'];?> <?= number_format($totalAmount, 0); ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal  sm:table-cell sm:pl-0">Balance</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal  sm:hidden">Balance</th>
                    <td class="pl-3 pr-6 pt-4 text-right text-sm  sm:pr-0"><?php echo $balance ?></td>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold  sm:table-cell sm:pl-0">Paid Amount</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold sm:hidden">Paid Amount</th>
                    <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold  sm:pr-0">
                        <?php echo $pAmount ?>
                    </td>
                    </tr>
                    <?php  ?>
                </tfoot>
              
                  </table>
                </div>
              </div>
        <!--  Footer  -->
        <div class="border-t-2 pt-4 text-md  text-center mt-16">
         Mode of Payment used: <span class="uppercase font-bold"><?= $transactionCode?></span>
        </div>    
                <?php
            }else {
                # code...
            }
        ?>
        <!-- PHP code end here.. -->
        </div>
        </div>
        <div class="flex justify-end dark:bg-slate-800  m-2 border border-slate-700">
          <!-- PHP code end here.. -->
          <?php  if(isset($_SESSION['cphone'])) : ?>
              <div class="w-96">
                  <button type="button"  id="saveOrder" class="p-2 hover:bg-green-800 bg-green-500 w-full text-white">
                      Save
                  </button>
              </div>
              <?php endif; ?>
            <!-- <button type="button" id="btn" class="">Print</button> -->
                <!-- Invoice end -->  
        </div>
      </div>   
    </div>
 <!-- Modal1 goes here.. -->
 <div id="crud-modal2" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                       Add Customer Information
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal" data-id="">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body2 p-4">
                <form action="../admins/code.php" method="POST"  class="w-full max-w-lg text-slate-400 dark:text-white">
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                    Name
                  </label>
                  <input name="name"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700  rounded py-3 px-4 mb-2 leading-tight focus:outline-none " id="grid-password" type="text" placeholder="Enter Customer name" >
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6 mt-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                    Email Address
                  </label>
                  <input name="email"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700  rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Enter Email Address">
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                    Phone Number
                  </label>
                  <input name="phone"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none " id="grid-last-name" type="text" placeholder="Phone number">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                   Next of Kin Phone 
                  </label>
                  <input name="phone2"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700  rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Enter next of kin phone number">
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                    Date of Birth
                  </label>
                  <input name="dob"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none " id="grid-last-name" type="text" placeholder="Dob">
                </div>
              </div>
              
              <button type="submit" name="saveCustomer" class="w-full bg-green-500 p-3  mt-4 text-white">Submit</button>
              </div>
          </form>
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
