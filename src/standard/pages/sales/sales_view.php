<!DOCTYPE html>
<html class="dark">
<?php   require"../../../config/function.php";
require"../../../config/log.php";
$activityLog->setAction($_SESSION['loggedInUser']['id'], "accessed the Sales page");
?>
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
      <div class="p-4 dark:bg-slate-900 ">
    
      <div class="flex flex-col dark:text-white p-4">
        <div class="text-2xl">Sales</div>
      </div>
        <div class="" id="myBillingArea">
       <?php 
            $trackingNo = validate($_GET['track']);
            $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id ORDER BY s.sId DESC";
            $sales = mysqli_query($conn, $query);
             if ($sales)    {
               if (mysqli_num_rows($sales) > 0) {
                    $salesData = mysqli_fetch_assoc($sales);

                    ?>
        <div class="flex items-center justify-between w-full shadow-md rounded-md mb-2 p-4 text-slate-800 dark:text-white bg-gray-50 dark:bg-slate-800 ">
        <div class="flex flex-col items-left">
            <h1 class="font-bold text-2xl">Orders Details</h1>
            <p><span class="font-bold">Name:</span><?=$salesData['customerName']?></p>
            <p><span class="font-bold">Tracking No.:</span><?=$salesData['tracking_no']?></p>
            <p><span class="font-bold">Order Date:</span><?=$salesData['sales_data']?></p>
            <p><span class="font-bold">Payment Mode:</span><?=$salesData['payment_mode']?></p>
        </div>
        <div>
            <h1 class="font-bold text-2xl">Customers Details</h1>
            <p><span class="font-bold">Full Name:</span><?=$salesData['customerName']?></p>
            <p><span class="font-bold">Phone No.:</span><?=$salesData['phone']?></p>
        </div>
        </div>
                <?php
            }else {
            echo"No records found";
            }
          }else {
            echo "Something Went wrong";
          }
      ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" >
      <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 flex flex-col">
                        Medicine Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    
                </tr>
            </thead>
            <?php 
            
                $saleItemQuery = "SELECT ms.quantity as saleItemQuantity, ms.price as saleItemPrice, s.*, ms.*, p.*
                FROM  sales  as s, medicine_sales as ms, products as p
                WHERE ms.order_id = s.sId AND  p.id = ms.product_id AND s.tracking_no ='$trackingNo'
                ORDER BY s.sId DESC";

                $saleItemRes = mysqli_query($conn, $saleItemQuery);
                if ($saleItemRes) {
                    if (mysqli_num_rows($saleItemRes) > 0) {
                        ?>

                        <!--Table goes here -->
                        <?php foreach($saleItemRes as $salesItemRow) :?>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="col" class="p-1 flex gap-2">  
                                <p>
                                <img src="../<?= $salesItemRow['image'];?>" alt="Drug Image"  style="width:40px" class=" mr-3">
                                </p>
                                <p><?= $salesItemRow['name']?></p>
                                </th>
                                <th scope="row" class="px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $salesItemRow['saleItemPrice']?>
                                </th>
                                <td class="px-6">
                                <?= $salesItemRow['saleItemQuantity']?>
                                </td>
                                <td class="px-6">
                                <?= number_format($salesItemRow['saleItemPrice'] * $salesItemRow['saleItemQuantity'])?>
                                </td> 
                            </tr>
                            <?php endforeach; ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 text-md" colspan="1">Total Price <span class="text-xl dark:text-white">Ksh:<?= $salesItemRow['total_amount']?></span></td>
                                <td  class="px-6  text-2xl text-slate-800 dark:text-white"></td>
                                <td class="px-6  text-md" colspan="1">Paid <span class="text-xl dark:text-white">:<?= $salesItemRow['pAmount']?></span> </td>
                               
                                <td class="px-6 text-md" colspan="1">Balance <span class="text-xl dark:text-white">:<?= $salesItemRow['balance']?></span> </td>

                            </tr>
                        </tbody>
                      
                        <!--Table ends here -->

                        <?php
                    }else{
                        echo "No records available";
                    }
                }else {
                    echo "Something went wrong";
                }
            ?>
            
        </table>
        </div>
        </div>
        </div>
        <div class="flex justify-end  gap-3 text-slate-800 dark:text-white">
                <button class="bg-gray-50 dark:bg-orange-500 p-2 m-2" onclick="downloadPDF()">Download PDF</button>
        </div>  
      </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
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
       <script src="../assets/custom.js"></script>
  </body>
</html>
