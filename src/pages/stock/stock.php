<?php   require"../../config/function.php";
?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="../../output.css" rel="stylesheet" />
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
    <style>
      .select2-container .select2-selection--single{
        height: 42px !important;
        background-color: rgb(30 41 59);
        display: flex;
        align-items: center;
        color:white !important;
        width: 100%;
      }
    </style>
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
        <div class="text-2xl">Adjust Expired Medicine</div>
      </div>
      <form method="POST" class="w-full my-4">
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
                name="stockName"
                id="stockName"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Search here..."
                required
              />
              
            </div>
      </form>
    <div class="relative bg-white dark:bg-slate-800 p-3 overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
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
                                <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
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
              <button class="dark:text-white p-2 bg-green-600">Filter</button>
              <a href="sales.php" class="dark:text-white p-2 bg-green-500" >Reset</a>
            </div>
            </div>
          </form>
        </div>
            <div class="relative">
              <!-- Modal toggle -->
              <a href="javascript:void(0)" data-modal-target="crud-modal2"  data-modal-toggle="crud-modal2" 
                class=" p-2 bg-green-500 views text-white  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                Other Adjustments
              </a>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Expiry Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quanitity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <?php 
            $todayDate = date("y-m-d ");
            //echo $myDate;
            $medicineQuery = "SELECT  *
            FROM  products
            WHERE  expiryDate <= '$todayDate' AND quantity > 0
            ";

            $medicineRes = mysqli_query($conn, $medicineQuery);
            $count = 0;
            if ($medicineRes) {
                if (mysqli_num_rows($medicineRes) > 0) {
                $count = mysqli_num_rows($medicineRes);
                }
            ?>
            <?php 
                $todayDate = date("y-m-d ");
                //echo $myDate;
                $medicineQuery = "SELECT  p.*
                FROM  products as p
                WHERE  p.expiryDate <= '$todayDate' AND p.quantity > 0
                ORDER BY p.id LIMIT $start, $rows_per_page";

                $medicineRes = mysqli_query($conn, $medicineQuery);
                if ($medicineRes) {
                    if (mysqli_num_rows($medicineRes) > 0) {
                    $count_active2 = mysqli_num_rows($medicineRes);
                    }else {
                    echo "No records";
                    }
                    $finalCount = $count_active1 + $count_active2;
                }
                        ?>
                        <?php 
                        $totalAmount = 0;
                        foreach($medicineRes as $medicineResRow) :?>
                         <?php   $totalAmount = $medicineResRow["sPrice"] * $medicineResRow['quantity'];?>
            <tbody id="search">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $medicineResRow['name'];?>
                    </th>
                    <td class="px-6 ">
                    <?= $medicineResRow['expiryDate'];?>
                    </td>
                    <td class="px-6 ">
                    <?= $medicineResRow['quantity'];?>
                    </td>
                    
                    <td class="px-6 ">
                    <?= $medicineResRow['sPrice'];?>
                    </td>
                    <td class="px-6 ">
                    Ksh. <?= number_format($totalAmount, 0); ?>
                    </td>
                    <td class="px-6 ">
                       <!-- Modal toggle -->
                    <a href="javascript:void(0)" data-modal-target="crud-modal" data-id="<?= $medicineResRow['id'];?>" data-modal-toggle="crud-modal" 
                    class=" view text-white  focus:outline-none font-medium rounded-lg text-sm px-5  text-center " type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                          <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                        </svg>
                        
                    </a>
                    </td>
                </tr>
                
            </tbody>
            <?php endforeach; ?>
        </table>
        
        <?php 
                 
                 //$start = 0;
                   global $rows_per_page; 
                   //global $rows_per_page;
                   
                      }else {
                        echo "No records";
                      }
                     $pages = ceil($count / $rows_per_page);

                    
                    //echo $page;
                  ?>          
    </div>
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
    <!-- Modal1 goes here.. -->
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Medicine Stock (Expired)
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal" data-id="">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body p-4">
                </form>
                </div>  
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
                        Update Medicine Stock (Other)
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
                <form method="POST" action="includes/updateMedInc.php"  class="p-4 md:p-5 modal-body">
                 <div class="grid grid-cols-2 gap-4 w-full ">
                        <div>
                        <label for="name" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <select name="medId"
                          class=" w-full bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2 dark:text-white" name="state">
                          <option value="AL">--Select Medicine --</option>
                            <?php
                              $products = getAll('products');
                              if ($products) {
                                if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $key => $proItem) {
                                  ?>
                                  <option value="<?= $proItem['id'];?>"><?= $proItem['name'];?></option>
                                  <?php
                                }
                                }else {
                                  echo'<option value="AL">No products found</option>';
                                }
                              }else {
                                echo'<option value="AL">Something Went Wrong</option>';
                              }
                            ?>
                        </select>
                        </div>
                        <div>
                        <label for="name" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="categoryName"
                          class=" w-full bg-gray-100 dark:bg-gray-800 border border-gray-800 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2 dark:text-white" name="state">
                          <option value="AL">--Select Category --</option>
                            <?php
                              $categories = getAll('categories');
                              if ($categories) {
                                if (mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $key => $cateItem) {
                                  ?>
                                  <option value="<?= $cateItem['id'];?>"><?= $cateItem['categoryName'];?></option>
                                  <?php
                                }
                                }else {
                                  echo'<option value="AL">No Categories found</option>';
                                }
                              }else {
                                echo'<option value="AL">Something Went Wrong</option>';
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1" >
                      <label for="price" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Date</label>
                      <input type="date"  name="expenseDate" id="expenseType" 
                      class="bg-gray-50 border border-gray-300 w-full text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Expence type" required="">
                      <p class="text-xs text-red-500 italic">This could be expired date or medicine damage date</p>
                    </div>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    
                    <div class="col-span-3 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Total Price</label>
                        <input type="number" name="price" id="price"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available Qty</label>
                        <input type="number" name="quanitity" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adjust Amount</label>
                        <input type="number" name="adjQty" id="adjQty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="9" required="">
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1" >
                      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Type</label>
                      <input type="text"  name="expenseType" id="expenseType"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Expence type" required="">
                    </div>
                </div>
                
                <div class="col-span-2 mb-4" >
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes (optional)</label>
                  <textarea id="description" name="note" rows="4" 
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Add notes"></textarea>                    
                </div>
                <button type="submit" name="adjustStock" class="w-full flex justify-center text-white items-center bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                </svg>
                    Continue to Adjust
              </button>
                </form>
                </div>  
            </div>
        </div>
    </div>
    <script>
      function mult(value){
        var x,y;
        mult = x*y;
        document.get
      }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
     <script src="../assets/modal.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      </script>
       <script>
        $(document).ready(function(){
      /*Searching stock details */
      $('#stockName').keyup(function(event){
          event.preventDefault();
          var action = 'searchRecord';
          var stockName = $('#stockName').val();
          if(stockName != ''){

              $.ajax({
                  url: "../includes/stockSearch.php",
                  method: "POST",
                  data: {action:action,stockName:stockName},
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
