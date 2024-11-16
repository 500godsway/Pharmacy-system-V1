<!DOCTYPE html>
<html class="dark">
<?php   require"../../../config/function.php";
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
      <div class="  p-4 dark:bg-slate-900 ">
      <?php 
          alertMessage();
        ?>
      <div class="flex flex-col dark:text-white p-4">
        <div class="text-2xl">Sales</div>
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
                name="tracNo"
                id="tracNo"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Search here..."
                required
              /> 
            </div>
      </form>
    <div class="relative bg-white dark:bg-slate-800 overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-column sm:flex-row p-4 flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div class="">
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
            name="start_date" 
            value="<?=isset($_GET['start_date']) == true ? $_GET['start_date']: ''; ?>"
            class="appearance-none focus:outline-none block w-full dark:bg-slate-800 dark:text-white bg-grey-lighter text-grey-darker border border-red rounded py-2 px-4 ">
          </div>
          <div class="w-1/2 px-2">
            <input type="date" 
            name="end_date" 
            value="<?=isset($_GET['end_date']) == true ? $_GET['end_date']: ''; ?>"
            class="appearance-none focus:outline-none block w-full bg-grey-lighter dark:bg-slate-800 dark:text-white text-grey-darker border border-red rounded py-2 px-4 ">
          </div>
            <div class="w-1/2 px-2">
              <select id="countries" 
              name="payment_status"
              class="appearance-none focus:outline-none block w-full bg-gray-50 dark:bg-slate-800 text-slate-800 dark:text-white border border-red rounded py-2 px-4 ">
                
                <option value=""
                <?=
                isset($_GET['payment_status']) == true 
                ? 
                ($_GET['payment_status'] ==  '' ? 'selected' : '')
                :
                '';
                ?>
                >All</option>
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
                    Tracking No.
                </th>
                <th scope="col" class="px-6 py-3">
                   Customer name
                </th>
                <th scope="col" class="px-6 py-3">
                   Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Paid Amount
                </th>
                <th scope="col" class="px-6 py-3">
                   Balance
                </th>
                <th scope="col" class="px-6 py-3">
                   Payment Mode
                </th>
                <th scope="col" class="px-6 py-3">
                   Transaction Code
                </th>
                <th scope="col" class="px-6 py-3">
                    Sales Date
                </th>
                <th scope="col" colspan="2" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <?php 

        $start=0;
        global $conn;
        //global $start;
        global $page;
        global $rows_per_page;

        // Get the page no.
        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr']-1;
            $start = $page * $rows_per_page;
          }

        if (isset($_GET['start_date']) || isset($_GET['end_date']) || isset($_GET['payment_status'])) {
          $start_date = validate($_GET['start_date']);
          $end_date = validate($_GET['end_date']);
          $paymentStatus = validate($_GET['payment_status']);
          //echo $end_date;

          if ($start_date !== '' && $end_date !== '' && $paymentStatus == '') {
            $query = "SELECT s.*, c.* FROM  sales s, customers c
             WHERE c.id = s.customer_id 
             AND s.sales_data BETWEEN '$start_date' AND '$end_date' ORDER BY s.sId DESC";
          }elseif ($start_date !== '' && $end_date !== '' && $paymentStatus !== '') {
            $query = "SELECT s.*, c.* FROM  sales s, customers c
             WHERE c.id = s.customer_id
             AND s.sales_data BETWEEN '$start_date' AND '$end_date'
             AND s.payment_mode ='$paymentStatus' ORDER BY s.sId DESC";
          }else{
            $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id   ORDER BY s.sId LIMIT $start, $rows_per_page";
          }
        }else {
          $query = "SELECT s.*, c.* FROM  sales s, customers c WHERE c.id = s.customer_id   ORDER BY s.sId LIMIT $start, $rows_per_page";
        }

            $sales = mysqli_query($conn, $query);
            if ($sales) {
                if (mysqli_num_rows($sales) > 0) {
                    ?>

                    <!--Table goes here -->
                    <?php foreach($sales as $salesItem) :?>
                    <tbody id="search">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                           <?= $salesItem['tracking_no']?>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $salesItem['customerName']?>
                            </th>
                            <td class="px-6 py-4">
                            <?= $salesItem['phone']?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $salesItem['pAmount']?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $salesItem['balance']?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $salesItem['payment_mode']?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $salesItem['transactionCode']?>
                                </td>
                            <td class="px-6 py-4">
                            <?= $salesItem['sales_data']?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="sales_view.php?track=<?= $salesItem['tracking_no']?>" class="font-medium text-white hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                </a>
                            </td> 
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                    <!--Table ends here -->

                    <?php
                }else{
                  
                    echo " <td class='px-6 py-4'>No records match your filter</td>";
                }
            }else {
                echo "Something went wrong";
            }
        ?>
        
    </table>
</div>
      <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center  lg:space-y-0 lg:space-x-4">
            <div class="flex items-center flex-1 space-x-4">
                <h5>
                    <span class="text-gray-500">Total Sales:</span>
                    <?php 
                      $sql ="SELECT SUM(pAmount) as 'pAmount' FROM sales";
                        //create a query that fetch data from the database
                        $res = mysqli_query($conn,$sql);
                        $data = mysqli_fetch_array($res);	
                      ?>
                    <span class="dark:text-white"><?php echo $currency?>. <?php echo $data['pAmount'];?></span>
                </h5>
                <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-start md:space-y-0 md:space-x-3">
                <a href='includes/exportData.php' class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
                     $count = getCount('sales');
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
      </div>
    </div>
    <script>
        $(document).ready(function(){
      /*Searching sales details */
      $('#tracNo').keyup(function(event){
          event.preventDefault();
          var action = 'searchRecord';
          var tracNo = $('#tracNo').val();
          if(tracNo != ''){
              $.ajax({
                  url: "../includes/saleSearch.php",
                  method: "POST",
                  data: {action:action,tracNo:tracNo},
                  success: function(data){
                    $("#search").html(data);
                  }
              });
          }
      })
  })
    </script>
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
  </body>
</html>
