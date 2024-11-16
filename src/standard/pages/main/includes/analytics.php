<div class="grid lg:grid-cols-3 gap-4 my-4 flex-wrap">
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-green-500 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-lg text-slate-500 dark:text-gray-500">
        Today's Sales
        </p>
        <?php 
            $sql ="SELECT SUM(total_amount) as 'total_amount' FROM sales WHERE sales_data = '$today'";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($res);	
            ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $data['total_amount'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
          <?php 
            if ($data['total_amount'] > $todayTSales) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
          
        </div>
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-pink-500 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
              <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-xl text-slate-500 dark:text-gray-500">
        Accounts Payable
          </p>
        <?php 
        $data = 0;
            $sql ="SELECT SUM(totalAmount) as 'totalAmount' FROM salesorders ";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $invoiceData = mysqli_fetch_array($res);	
          ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $invoiceData['totalAmount'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
        <?php 
            if ($invoiceData['totalAmount'] > $invoiceDue) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
        </div>
        
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-purple-500 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path d="M4.08 5.227A3 3 0 0 1 6.979 3H17.02a3 3 0 0 1 2.9 2.227l2.113 7.926A5.228 5.228 0 0 0 18.75 12H5.25a5.228 5.228 0 0 0-3.284 1.153L4.08 5.227Z" />
              <path fill-rule="evenodd" d="M5.25 13.5a3.75 3.75 0 1 0 0 7.5h13.5a3.75 3.75 0 1 0 0-7.5H5.25Zm10.5 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm3.75-.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
          </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-xl text-slate-500 dark:text-gray-500">
            Profit
          </p>
        <?php 
            $sql ="SELECT SUM(profit) as 'profit' FROM medicine_sales";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $profit_data = mysqli_fetch_array($res);	
            ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $profit_data['profit'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
        <?php 
            if ($profit_data['profit'] > $profit) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
        </div>
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-green-800 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
              <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-xl text-slate-500 dark:text-gray-500">
        Wastages
        </p>
        <?php 
            $sql ="SELECT SUM(amount) as 'amount' FROM expenses WHERE expenseType = 'damaged'";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $damaged = mysqli_fetch_array($res);	
          ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $damaged['amount'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
        <?php 
            if ($damaged['amount'] > $wastage) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
        </div>
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-blue-800 text-2xl text-gray-100 dark:text-white">
          <div>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
              </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
        <p class="text-xl text-slate-500 dark:text-gray-500">
        Purchases
        </p>
        <?php 
            $sql ="SELECT SUM(amount) as 'amount' FROM purchases";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $purchase_data = mysqli_fetch_array($res);	
            ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
          <?php echo $purchase_data['amount'];?>
        </p>
        </div>
        <div class="flex flex-col gap-2">
        <?php 
            if ($purchase_data['amount'] > $purchases) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
        </div>
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-red-500 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path fill-rule="evenodd" d="M12 1.5c-1.921 0-3.816.111-5.68.327-1.497.174-2.57 1.46-2.57 2.93V21.75a.75.75 0 0 0 1.029.696l3.471-1.388 3.472 1.388a.75.75 0 0 0 .556 0l3.472-1.388 3.471 1.388a.75.75 0 0 0 1.029-.696V4.757c0-1.47-1.073-2.756-2.57-2.93A49.255 49.255 0 0 0 12 1.5Zm-.97 6.53a.75.75 0 1 0-1.06-1.06L7.72 9.22a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06l-.97-.97h3.065a1.875 1.875 0 0 1 0 3.75H12a.75.75 0 0 0 0 1.5h1.125a3.375 3.375 0 1 0 0-6.75h-3.064l.97-.97Z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-xl text-slate-500 dark:text-gray-500">
        Expired
        </p>
        <?php 
            $sql ="SELECT SUM(amount) as 'amount' FROM expenses WHERE expenseType = 'Expired Medicine' AND Archived = 0";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($res);	
          ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
          <!--Currency-->
          <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $data['amount'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
        <?php 
            if ($data['amount'] > $expired) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>

              </p>
              <?php
            }
          ?>
        </div>
      </div>
      <div
        class="flex items-center justify-between px-4 h-24 rounded bg-white dark:bg-gray-800"
      >
        <div class="flex items-center justify-center w-20 h-20 p-4 m-4 rounded-full bg-green-500 text-2xl text-gray-100 dark:text-white">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <p class="text-xl text-slate-500 dark:text-gray-500">
        Total Sales
        </p>
        <?php 
            $sql ="SELECT SUM(total_amount) as 'total_amount' FROM sales";
              //create a query that fetch data from the database
              $res = mysqli_query($conn,$sql);
              $salesTotal = mysqli_fetch_array($res);	
            ?>
        <p class="text-2xl font-bold text-slate-500 dark:text-gray-500">
         <!--Currency-->
         <span class="text-sm">
            <?php echo $profile['Currency'];?>
          </span>
        <?php echo $salesTotal['total_amount'];?>.00
        </p>
        </div>
        <div class="flex flex-col gap-2">
          <?php 
            if ($salesTotal['total_amount'] > $totalSales) {
              ?>
              <p class="text-green-500 text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
              </p>
              <?php
            }else {
              ?>
              <p class="text-green-500 text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
              </svg>
              </p>
              <?php
            }
          ?>
          
        </div>
      </div>
    </div>