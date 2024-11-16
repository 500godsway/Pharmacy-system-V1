<?php
require"../../config/function.php";
if(isset($_SESSION["productItem"])) {
  $sessionProducts = $_SESSION["productItem"];
}else {
  # code...
}
$totalAmount = 0;
foreach($sessionProducts as $key => $item) :
    $totalAmount += $item["price"] * $item['quantity'];
  endforeach;
//INCLUDE THE ACCESS TOKEN FILE
include 'accessToken.php';
date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://6216-102-0-7-150.ngrok-free.app/ultimatePharmacy/src/pages/Mpesa/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
// ENCRIPT  DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phonee = '254700361894';//phone number to receive the stk push
$money = '1';
$PartyA = $phonee;
$PartyB = '254708374149';
$AccountReference = 'ULTIMATE PHARMACY';
$TransactionDesc = 'stkpush test';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
//INITIATE CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting custom header
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $callbackurl,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
 $curl_response = curl_exec($curl);
//ECHO  RESPONSE
$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$ResponseCode = $data->ResponseCode;
//if ($ResponseCode == "0") {
 // echo "The CheckoutRequestID for this transaction is : " . $CheckoutRequestID;
//}
?>

<!DOCTYPE html>
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
      <div 
      class="flex flex-col gap-4 h-full text-white w-full py-4 justify-center items-center  ">
      
        <a href="posInvoice.php"  class="focus:outline-none text-white bg-green-500 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-green-800">Add More..</a>
      <!-- Invoice start  -->
        <div id="myBilingArea"
        class="w-1/2 mx-auto p-6  flex flex-col items-center border border-slate-800 dark:text-white rounded shadow-sm my-6" id="invoice">
        <h2 class="text-lg font-medium mb-6">Payment Information</h2>
        <!-- PHP code start here.. -->
        <?php 
            if(isset($_SESSION["cphone"])) {
                $phone = validate($_SESSION['cphone']);
                $balance = validate($_SESSION['balance']);
                $pAmount = validate($_SESSION['pAmount']);
                $invoiceNo = validate($_SESSION['invoice_no']);
                $payment_mode  =validate($_SESSION["payment_mode"]) ;

                $customerQuery = mysqli_query($conn, "SELECT * FROM customers WHERE phone= '$phone' LIMIT 1");
                if ($customerQuery) {
                   if (mysqli_num_rows($customerQuery) > 0) {
                   $cRowData = mysqli_fetch_assoc($customerQuery);  
                   ?>
                    
                    <!-- Client info -->
                 
                    <?php
                   }else{
                    echo "No custerm found";
                    return;
                   }
                }
            }
        ?>
        <?php 
            if(isset($_SESSION["productItem"])) {
                $sessionProducts = $_SESSION["productItem"];
                ?>
                    <!-- Invoice Items -->
                    <div class="-mx-4 mt-8 flow-root sm:mx-0">
                    <div class="w-full max-w-lg mx-auto p-8">
          <div class="bg-slate-50 dark:bg-slate-800 rounded-lg shadow-lg p-6">
              <form>
                  <div class="grid grid-cols-2 gap-6">
                      <div class="col-span-2 sm:col-span-1">
                          <label for="card-number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                          <input type="text" name="card-number" id="card-number" placeholder="000 000 000" value="<?php echo $phonee;?>" class="w-full py-3 px-4 border border-gray-700 bg-white dark:bg-slate-800 rounded-lg focus:outline-none focus:border-green-500">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="expiration-date" class="block text-sm font-medium text-gray-700 mb-2">Payment</label>
                          <input type="text" name="expiration-date" value="<?php echo $totalAmount?>" id="expiration-date" placeholder="0.00" class="w-full py-3 px-4 border border-gray-700 bg-white dark:bg-slate-800 rounded-lg focus:outline-none focus:border-green-500">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="cvv" class="block text-sm font-medium text-gray-700 mb-2">Code</label>
                          <input type="text"  value="<?php echo  $CheckoutRequestID;?>" name="cvv" id="cvv" placeholder="000" class="w-full py-3 px-4 border border-gray-700 bg-white dark:bg-slate-800 rounded-lg focus:outline-none focus:border-green-500">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="card-holder" class="block text-sm font-medium text-gray-700 mb-2">Card Holder</label>
                          <input type="text" name="card-holder" id="card-holder" value="<?php $cRowData['name']?>" placeholder="Full Name" class="w-full py-3 px-4 border border-gray-700 bg-white dark:bg-slate-800 rounded-lg focus:outline-none focus:border-green-500">
                      </div>
                  </div>
                  <div class="mt-8">
                      <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 rounded-lg focus:outline-none">Submit</button>
                  </div>
              </form>
          </div>
          </div>
          </div>

        <!--  Footer  -->   
                <?php
            }else {
                # code...
            }
        ?>
        <!-- PHP code end here.. -->
        </div>
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

    <script src="../assets/custom.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  </body>
</html>
