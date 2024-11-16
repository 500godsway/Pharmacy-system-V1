<!DOCTYPE html>
<html class="dark">
<?php   require"../../../config/function.php";
require"../../../config/log.php";
$activityLog->setAction($_SESSION['loggedInUser']['id'], "accessed the Sales Orders page");
?>
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
  <body class="bg-slate-200 dark:bg-slate-900 ">
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
      <?php 
          alertMessage();
        ?>
      <div class="flex flex-col dark:text-white p-4">
        <div class="text-2xl">Sales Orders</div>
      </div>
      <form method="POST" class="w-full  my-4">
            <label
              for="default-search"
              class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
              >Search</label
            >
            <div class="relative">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
              >
                <svg
                  class="w-4 h-4 text-gray-500 dark:text-gray-400"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 20 20"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                  />
                </svg>
              </div>
              <input
                type="search"
                name="orderNo"
                id="orderNo"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Search here..."
                required
              /> 
            </div>
      </form>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <div class="flex p-4 bg-white dark:bg-slate-800 flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
              <div>
                  <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 duration-500" type="button">
                      <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                          </svg>
                      Last 30 days
                      <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                      <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                          <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                              </div>
                          </li>
                          <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                              </div>
                          </li>
                          <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                              </div>
                          </li>
                          <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                              </div>
                          </li>
                          <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                  <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="relative">
              <form action="" method="GET">
                <div class="flex px-2">
                <div class="w-1/2 px-2">
                  <input type="date" 
                  name="date" 
                  value="<?=isset($_GET['date']) == true ? $_GET['date']: ''; ?>"
                  
                  class="appearance-none focus:outline-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-4 ">
                </div>
                  <div class="w-1/2 px-2">
                    <select id="countries" 
                    name="payment_status"
                    class="appearance-none focus:outline-none block w-full bg-gray-50 dark:bg-slate-800 text-slate-800 dark:text-white border border-red rounded py-2 px-4 ">
                      <option>--Payment Mode--</option>
                      <option value="Cash"
                      <?=
                      isset($_GET['payment_status']) == true 
                      ? 
                      ($_GET['payment_status'] ==  'Cash' ? 'selected' : '')
                      :
                      '';
                      ?>
                      >Cash Payment</option>
                      <option 
                      value="Mpesa"
                      <?=
                      isset($_GET['payment_status']) == true 
                      ? 
                      ($_GET['payment_status'] ==  'Mpesa' ? 'selected' : '')
                      :
                      '';
                      ?>
                      >Mpesa</option>
                    </select>
                  </div>
                  <div class="flex gap-2">
                    <button class="dark:text-white p-2 bg-blue-600">Filter</button>
                    <a href="sales.php" class="dark:text-white p-2 bg-green-500" >Reset</a>
                  </div>
                  </div>
                </form>
              </div>
          </div>
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="p-4">
                          Order No.
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Customer name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Customer Phone
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Medicine
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Shipping Status
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Status
                      </th>
                      <th scope="col" colspan="3" class="px-6 py-3">
                          Actions
                      </th>
                  </tr>
              </thead>
              <?php
                  $salesorders = getAll ('salesorders');
                  if (mysqli_num_rows($salesorders) > 0) {
                      ?>
                      <?php foreach($salesorders as $ordersItem) :?>
                          <tbody id="search">
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                  <td class="px-6 py-4">
                                <?= $ordersItem['orderNo']?>
                                  </td>
                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                  <?= $ordersItem['customerName']?>
                                  </th>
                                  <td class="px-6 py-4">
                                  <?= $ordersItem['phone']?>
                                  </td>
                                  <td class="px-6 py-4">
                                  <?= $ordersItem['email']?>
                                  </td>
                                  
                                  <td class="px-6 py-4">
                                  <?= $ordersItem['shippingStatus']?>
                                  </td>
                                  <td class="px-6 py-4">
                                  <?= $ordersItem['status']?>
                                  </td>
                                  <td class="px-6 py-4">
                                      <a href="viewOrder.php?track=<?= $ordersItem['orderNo']?>" class="font-medium text-white hover:underline">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                      <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                      <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                      </svg>
                                      </a>
                                  </td>

                                  <td class="px-6 py-4">
                                      <a href="#" class="font-medium text-white ">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600">
                                      <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
                                      </svg>
                                      </a>
                                  </td>
                              </tr>
                          </tbody>
                          <?php endforeach?>
                          <?php
                          }else{
                              ?>
                              <tr>
                                  <td class="px-6 py-4">No records found</td>
                              </tr>
                            <?php
                          }
                          ?>
              
          </table>
      </div>
      <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center  lg:space-y-0 lg:space-x-4">
            <div class="flex items-center flex-1 space-x-4">
                <h5>
                    <span class="text-gray-500">Total Orders:</span>
                    <?php 
                      $sql ="SELECT SUM(totalAmount) as 'totalAmount' FROM salesorders";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
                      ?>
                    <span class="dark:text-white"><?php echo $currency?>. <?php echo $data['totalAmount'];?></span>
                </h5>
                <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-start md:space-y-0 md:space-x-3">
                <a href='includes/export_data.php' class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>

                    Export
                </a>
            </div>
            </div>
            <?php 
                 //$start = 0;
                   global $rows_per_page; 
                   //global $rows_per_page;
                     $count = getCount('salesorders');
                     $pages = ceil($count / $rows_per_page);
                    //echo $page;
                  ?>
                  <nav class="flex flex-col items-start  justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                      <span class="text-sm mr-2 font-normal text-gray-500 dark:text-gray-400">
                          Showing
                          <?php 
                            if (!isset($_GET['page-nr'])) {
                              $page = 1;
                            }else {
                              $page = $_GET['page-nr'];
                            }
                          ?>
                          <span class="font-semibold text-gray-900 dark:text-white"><?php echo $page?></span>
                          of
                          <span class="font-semibold text-gray-900 dark:text-white"><?php echo $pages?></span>
                          Pages
                        </span>
                      <ul class="inline-flex items-stretch -space-x-px page-numbers">
                        <?php 
                          if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
                            ?>
                                <li>
                              <a href="?page-nr=<?php echo $_GET['page-nr'] - 1?>" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Previous</span>
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                  </svg>
                              </a>
                          </li>
                            <?php
                          }
                        ?>  
                          <?php 
                            for($counter = 1; $counter <=$pages; $counter ++){
                              ?>
                              <li>
                               <a href="?page-nr=<?php echo $counter ?>" 
                               class="flex items-center justify-center active:bg-green-500 px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                               <?php echo $counter?>
                              </a>
                              </li>
                              <?php
                            }
                          ?>
                          <li>
                            <?php 
                              if (!isset($_GET['page-nr'])) {
                                ?>
                                  <a href="?page-nr=<?php echo $pages?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                  </a>
                                <?php
                              }else {
                                if ($_GET['page-nr'] >=$pages) {
                                 ?>
                                  <a href="" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                  </a>
                                 <?php
                                }else {
                                  ?>
                                  <a href="?page-nr=<?php echo $_GET['page-nr'] + 1?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                  </a>
                                  <?php
                                }
                              }
                            ?>
                              
                          </li>
                      </ul>
                  </nav>
        </div>
      </div
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

<script>
        $(document).ready(function(){
      /*Searching employee details */
      $('#orderNo').keyup(function(event){
          event.preventDefault();
          var action = 'searchRecord';
          var orderNo = $('#orderNo').val();
          if(orderNo != ''){

              $.ajax({
                  url: "../includes/orderSearch.php",
                  method: "POST",
                  data: {action:action,orderNo:orderNo},
                  success: function(data){
                    $("#search").html(data);
                  }
              });
          }
      })
  })
    </script>
  </body>
</html>
