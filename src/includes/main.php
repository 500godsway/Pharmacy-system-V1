<?php 
//Fetch Currency from database --------------->
    $sql ="SELECT * FROM pharprofile";
      //create a query that fetch data from the database
      $res = mysqli_query($conn,$sql);
      $profile = mysqli_fetch_array($res);	
    ?>

<?php 
//Default values starts here---------------------------->
  $pharBalance = 1;
  $totalSales	= 1;
  $todayTSales	 = 1;
  $salesOrders	= 1;
  $invoiceDue	= 1;
  $profit	= 1;
  $wastage	= 1;
  $purchases	= 1;
  $expired	= 1;
//Default values starts here---------------------------->

//Fetch Minquantities from database start--------------->
  $today = date("Y-m-d", strtotime(date("Y-m-d")));
   $mQty = "SELECT * FROM minquantities ";

   $result = mysqli_query($conn,$mQty);
   if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $pharBalance = $row['pharBalance'];
      $totalSales	= $row['totalSales'];
      $todayTSales	 = $row['todayTSales'];
      $salesOrders	= $row['salesOrders'];
      $invoiceDue	= $row['invoiceDue'];
      $profit	= $row['profit'];
      $wastage	= $row['wastage'];
      $Currency	= $row['Currency'];
      $purchases	= $row['purchases'];
      $expired	= $row['expired'];
      
  }
  }if(mysqli_num_rows($result) < 0) {
    echo "No records";
  }
//Fetch Minquantities from database start--------------->
?>

<!-- Content  ------------------------------------------------------------------------------------------------------------------------>
  <div class="p-4 dark:border-gray-700">
<!--- Pharmacy Analyitics Starts----------------------------------------------------------------------------------------------------->
    <?php require "includes/analytics.php";?>
<!--- Pharmacy Analyitics Ends----------------------------------------------------------------------------------------------------->
    <div class="flex items-center justify-between p-4 bg-white dark:bg-green-500 rounded text-gray-800 dark:text-white">
      <div class="IntialCapital flex gap-2">
      <div class="flex flex-shrink-0 items-center justify-center bg-green-100 h-16 w-16 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
        </svg>
      </div>
      <div class="flex flex-col gap-2">
      <p class="text-sm md:text-xl  text-slate-500 dark:text-white">
          Initial Capital
        </p> 
    <?php 
      $sql ="SELECT SUM(initialCapital) as 'initialCapital' FROM pharprofile";
      //create a query that fetch data from the database
      $res = mysqli_query($conn,$sql);
      $phaInfo = mysqli_fetch_array($res);	
    ?>
    <?php if ($phaInfo['initialCapital'] == 0) {
        $phaInfo['initialCapital'] = 1;
      }else{
      $phaInfo['initialCapital'] = $phaInfo['initialCapital'];
      }
    ?>  
    <p class="text-2xl font-bold text-slate-500 dark:text-white">
          <!--Pharmacy Currency-->
      <span class="text-sm">
        <?php echo $profile['Currency'];?>
      </span>
    <?php echo $phaInfo['initialCapital'];?>
      </p>
        
    </div>
      </div>
      <div class="flex pharmacyBalance">
      <div class="flex flex-shrink-0 items-center justify-center bg-green-100 h-16 w-16 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
        </svg>
      </div>
      <div class="flex-grow flex flex-col ml-4">
      <div class="flex items-center justify-between mb-3">
          <span class="text-sm md:text-xl text-slate-500 dark:text-white">Pharmacy all time balance</span>
          </div>
      <?php 
        $balance =1;
        //$phaInfo['initialCapital'] = 1;
        $balance =$phaInfo['initialCapital'] + $salesTotal['total_amount'] +$profit_data['profit'] + $invoiceData['totalAmount'] - $purchase_data['amount'] - $damaged['amount'];
        $percentage = $balance / $phaInfo['initialCapital'] * 100;
      ?>
        <span class=" flex text-xl font-bold">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span> 
          <?php echo $balance?>
          <?php 
            if ($balance > $phaInfo['initialCapital'] ) {
              ?>
              <p class="text-white dark:text-red-600 text-3xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white ml-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
          <?php
            }else {
              ?>
              <p class="text-red-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 ml-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
            ?>
          </span>
        </div>
      </div>
    </div>
<!-- Sales Table-------------------------------------------------------------------------------------------------------------->
    <div class="flex flex-col md:flex-row justify-between m-4">
        <div>
        <h2 class="text-gray-800 dark:text-white font-semibold text-lg">Sales</h2>
        </div>
        <div>
        </div>
      </div>
    <div class="">
    <?php require "includes/salesTable.php";?>
      </div>
<!-- Sales End ---------------------------------------------------------------------------------------------------------->
<!-- Total Sales ------------------------------------------------------------------------------------------------------------->
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
                  <span class="dark:text-white">
                  <!--Currency-->
                  <span class="text-sm">
                    <?php echo $profile['Currency'];?>
                  </span>  
                  <?php echo $data['pAmount'];?></span>
              </h5>
              
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
<!-- Total Sales ------------------------------------------------------------------------------------------------------------->
  </div>
<!-- Content ------------------------------------------------------------------------------------------------------------------------>