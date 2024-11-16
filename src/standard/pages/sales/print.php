<!DOCTYPE html>
<?php   require"../../../config/function.php";

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
            #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding:2mm;
        margin: 0 auto;
        width: 60mm;
        background: #FFF;
        }

        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
        font-size: 1.5em;
        color: #222;
        }
        .heading{font-size: .9em;}
        h3{
        font-size: 1.9em;
        font-weight: 300;
        line-height: 2em;
        }
        p{
        font-size: .6em;
        color: #666;
        line-height: 1.2em;
        }

        #top, #mid,#bot{ /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        }

        #top{min-height: 50px;}
        #mid{min-height: 20px;}
        #bot{ min-height: 20px;}

       
        
        .info{
        display: block;
        //float:left;
        margin-left: 0;
        }
        .title{
        float: right;
        }
        .title p{text-align: right;}
        table{
        width: 100%;
        border-collapse: collapse;
        }
        td{
        //padding: 5px 0 5px 15px;
        //border: 1px solid #EEE
        }
        .tabletitle{
        //padding: 5px;
        font-size: .5em;
        background: #EEE;
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 24mm;}
        .itemtext{font-size: .6em;}

        #legalcopy{
        margin-top: 1mm;
        }
      
    </style>
  </head>
  <body class="bg-gray-100 dark:bg-slate-900 ">
      <?php
        if(!isset($_SESSION['print'])) {
            echo '<script> window.location.href = "posInvoice.php" </script>';
        }else {
            $invoice =  $_SESSION["print"];
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
       
       <div class=" border border-slate-700 rounded-lg m-4 items-center justify-center h-auto p-4">

        <div id="myBillingArea">
        
            <div id="invoice-POS" class="my-4">
    
            <center id="top">
            <div class="info"> 
            <?php 
                    //$trackingNo = validate($_GET['track']);
                    $query = "SELECT * FROM pharprofile";
                    $info = mysqli_query($conn, $query);
                    if ($info)    {
                    if (mysqli_num_rows($info) > 0) {
                        $infoData = mysqli_fetch_assoc($info);
                ?>
                <p><?=$infoData['name']?></p>
                <p><?=$infoData['email']?></p>
                <p><?=$infoData['phone']?></p>
                <?php
                    }else {
                    echo"No records found";
                    }
                    }else {
                        echo "Something Went wrong";
                    }
            ?>
            </div><!--End Info-->
            <?php 
                    $saleItemQuery = "SELECT ms.quantity as saleItemQuantity, ms.price as saleItemPrice, s.*, ms.*, p.*
                    FROM  sales  as s, medicine_sales as ms, products as p
                    WHERE ms.order_id = s.sId AND  p.id = ms.product_id AND s.invoice_no ='$invoice'
                    ORDER BY s.sId DESC";
                    $saleItemRes = mysqli_query($conn, $saleItemQuery);
                    if ($saleItemRes) {
                        if (mysqli_num_rows($saleItemRes) > 0) 
                        
                        {
              ?>
                </center><!--End InvoiceTop-->
                <div id="mid">
                <?php 
                    //$trackingNo = validate($_GET['track']);
                    $query = "SELECT ms.quantity as saleItemQuantity, ms.price as saleItemPrice, s.*, ms.*, p.*
                    FROM  sales  as s, medicine_sales as ms, products as p
                    WHERE ms.order_id = s.sId AND  p.id = ms.product_id AND s.invoice_no ='$invoice'
                    ORDER BY s.sId DESC";
                    $sales = mysqli_query($conn, $query);
                    if ($sales) 
                      {
                    if (mysqli_num_rows($sales) > 0) 
                      {
                            $salesData = mysqli_fetch_assoc($sales);
                            ?>
                <p>ReceiptNo <?=$salesData['invoice_no']?></p>
                <p>Transaction Date: <?=$salesData['sales_data']?></p>
                    <?php
                        }else {
                        echo"No records found";
                        }
                    }else {
                        echo "Something Went wrong";
                    }
                ?>
                </div><!--End Invoice Mid-->
                
                <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item heading">Item</td>
								<td class="Hours heading">Price</td>
								<td class="Hours heading">Qty</td>
								<td class="Rate heading">Sub Total</td>
							</tr>

                    <!--Table goes here -->
                    <?php foreach($saleItemRes as $salesItemRow) :?>
							<tr class="service">
								<td class="tableitem"><p class="itemtext"><?=$salesItemRow['name']?></p></td>
								<td class="tableitem"><p class="itemtext"><?=$salesItemRow['price']?></p></td>
								<td class="tableitem"><p class="itemtext"><?=$salesItemRow['saleItemQuantity']?></p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $profile['Currency'];?><?=$salesItemRow['saleItemQuantity'] * $salesItemRow['price']?>.00</p></td>
							</tr>
                            <?php endforeach; ?>
                            <?php
                    }else{
                        echo "No records available";
                    }
                }else {
                    echo "Something went wrong";
                }
            ?>
						</table>
					</div><!--End Table-->

					<div id="legalcopy" class="flex items-center justify-center">
						<p class="legal">
                        <?php 
            //$trackingNo = validate($_GET['track']);
            $query = "SELECT * FROM customers";
            $info = mysqli_query($conn, $query);
             if ($info)    {
               if (mysqli_num_rows($info) > 0) {
                    $infoData = mysqli_fetch_assoc($info);
                    ?>
                    <p>Customer:<?=$infoData['customerName']?></p>
                    <?php
                        }else {
                        echo"No records found";
                        }
                    }else {
                        echo "Something Went wrong";
                    }
                ?>
						</p>
					</div>

				</div><!--End InvoiceBot-->
                </div><!--End Invoice-->
        </div>
        <div class=" flex justify-center  mt-6">
                <div class=" flex justify-center w-80">
                    <button onclick="printmyBillingArea()" class="p-2 bg-green-500 text-white ">
                        Print Receipt
                    </button>
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
