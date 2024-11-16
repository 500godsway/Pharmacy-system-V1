<!DOCTYPE html>
<?php   require"../../../config/function.php";?>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  <body class="bg-gray-100 dark:bg-slate-900 ">
     
    <!-- Main modal -->
    <div id="addCustomerModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold  dark:text-white">
                        Static modal
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover: rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addCustomerModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed  dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed  dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="addCustomerModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="addCustomerModal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium  focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>
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
      <div 
      class="flex flex-col gap-4 h-full text-white w-full py-4 justify-center items-center  ">
     
      <!-- Invoice start  -->
        <div id="myBilingArea"
        class="w-1/2 mx-auto p-6  bg-gray-50 dark:bg-slate-800  text-slate-800 dark:text-white rounded shadow-sm my-6" id="invoice">
        
        <!-- PHP code start here.. -->
        <?php 
            $trackingNo = validate($_GET['track']);
            $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id ORDER BY s.sId DESC";
            $sales = mysqli_query($conn, $query);
             if ($sales)    {
               if (mysqli_num_rows($sales) > 0) {
                    $salesData = mysqli_fetch_assoc($sales);

                    ?>
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

                    <!-- Client info -->
                    <div class="grid grid-cols-2 items-center mt-8">
                    <div>
                        <p class=" ">
                        <span class="font-bold">Bill to :<?=$salesData['name']?></span>  
                        </p>
                        <p class="">
                        <span class="font-bold">Phone : <?=$salesData['phone']?></span> 
                        </p>
                        <p class="">
                        <span class="font-bold">Email :<?=$salesData['email']?></span>
                        
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="">
                        Invoice number:
                        <span class=""><?=$salesData['invoice_no']?></span>
                        </p>
                        <p>
                        Invoice date: <span class=""><?= date('d M Y');?></span>
                        <br />
                        Due date:<span class=""><input type="date" class="bg-transparent focus:outline-none"></span>
                        </p>
                    </div>
                    </div>
                    <?php
                    }else{
                        echo "No records available";
                    }
                }else {
                    echo "Something went wrong";
                }
            ?>
         <?php 
            
            $saleItemQuery = "SELECT ms.quantity as saleItemQuantity, ms.price as saleItemPrice, s.*, ms.*, p.*
            FROM  sales  as s, medicine_sales as ms, products as p
            WHERE ms.order_id = s.sId AND  p.id = ms.product_id AND s.tracking_no ='$trackingNo'
            ORDER BY s.sId DESC";

            $saleItemRes = mysqli_query($conn, $saleItemQuery);
            if ($saleItemRes) {
                if (mysqli_num_rows($saleItemRes) > 0) {
                    ?>
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
                <?php foreach($saleItemRes as $salesItemRow) :?>
                <tbody>
                    <tr class="border-b border-gray-200">
                    <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div class="font-medium "><?= $salesItemRow['name']?></div>
                        <div class="mt-1 truncate "><?= $salesItemRow['description']?></div>
                    </td>
                    <td class="hidden px-3 py-5 text-right text-sm  sm:table-cell"><?= $salesItemRow['saleItemQuantity']?></td>
                    <td class="hidden px-3 py-5 text-right text-sm  sm:table-cell"><?= $salesItemRow['saleItemPrice']?></td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm  sm:pr-0"><?= number_format($salesItemRow['saleItemPrice'] * $salesItemRow['saleItemQuantity'])?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                
                
                <tfoot>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal  sm:table-cell sm:pl-0">Amount Due</th>
                    <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal  sm:hidden">Amount Due</th>
                    <td class="pl-3 pr-6 pt-6 text-right text-sm  sm:pr-0">Ksh. <?= $salesItemRow['total_amount']?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal  sm:table-cell sm:pl-0">Paid Amount</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal  sm:hidden">Paid Amount</th>
                    <td class="pl-3 pr-6 pt-4 text-right text-sm  sm:pr-0"><?= $salesItemRow['pAmount']?></td>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold  sm:table-cell sm:pl-0">Balance</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold sm:hidden">Balance</th>
                    <td class="pl-3 pr-4 pt-4 text-right text-sm text-red-500 font-semibold  sm:pr-0">
                    -<?= $salesItemRow['balance']?>
                    </td>
                    </tr>
                    <?php
                    }else{
                        echo "No records available";
                    }
                }else {
                    echo "Something went wrong";
                }
            ?>
                </tfoot>
              
                  </table>
                    </div>
                    <!-- PHP code end here.. -->
        </div>
        <form action="../admins/code.php" method="post">
        <div class="flex w-full justify-center">
        <div class="fixed h-24 bottom-0  flex items-center p-3 mt-2 gap-4 justify-between w-auto rounded-md dark:bg-gray-950 ">
        
          <div class="flex flex-col ">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Mode of Payment</label>
              <select id="payment_mode" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg   block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected class=" text-xs ">Mode of Payment</option>
                <option value="Cash">Cash</option>
                <option value="Mpesa">Mpesa</option>
                <option value="Card">Card</option>
              </select>
            </div>
            
            <div class="custDetails">
            <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Balance:</label>
            <input type="number" id="balance" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
              value="<?= $salesItemRow['balance']?>"
            placeholder="90210" required  name="balance"/>
            <input type="hidden"  name="prvPaid" value="<?= $salesItemRow['pAmount']?>">
            <input type="hidden"  name="trackingNo" value="<?php echo $trackingNo;?>">
            </div>

            <div class="custDetails">
            <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount Paid:</label>
            <input type="number" id="pAmount" name="pAmount" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210" required />
            <input type="hidden" name="sId" aria-describedby="helper-text-explanation"
            value="<?= $salesItemRow['sId']?>"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210" required />
            </div>
            <a href="checkout.php" class="proceedToPlace mt-6 bg-green-500 p-2 text-white " id="proceedToPlace"> Mpesa </a>
            <button type="submit" name="payInvoice" class="proceedToPlace mt-6 bg-blue-600 p-2 text-white " id="proceedToPlace">Cash </button>
           
        </div> 
        </div>
        </form>
        <!--  Footer  -->
        <div class="border-t-2 pt-4 text-md  text-center mt-16">
        </div> 
       
        
        <button class="flex p-2 bg-green-500 items-center justify-center text-white" onclick="downloadPDF(<?=$salesData['invoice_no']?>)">Download PDF</button>   
        </div>
        <!-- <button type="button" id="btn" class="">Print</button> -->
            <!-- Invoice end -->  
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

   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
   <script src="../assets/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  </body>
</html>
