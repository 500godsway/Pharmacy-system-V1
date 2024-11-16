<?php   require"../../config/function.php";

//Fetch Currency from database --------------->
    $sql ="SELECT * FROM pharprofile";
      //create a query that fetch data from the database
      $res = mysqli_query($conn,$sql);
      $profile = mysqli_fetch_array($res);	
    ?>

<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
  <body class="dark:bg-slate-900 bg-gray-100 dark:text-white">
    <button
      data-drawer-target="sidebar-multi-level-sidebar"
      data-drawer-toggle="sidebar-multi-level-sidebar"
      aria-controls="sidebar-multi-level-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
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
      <div class="flex flex-col dark:text-white">
        <div class="text-2xl">Settings</div>
      </div>
      <div class="grid md:grid-cols-3 gap-3">
        <!-- Snippet -->
        <div>
          <div class="max-w-sm mx-auto bg-gray-100 dark:bg-slate-800 shadow-lg rounded-md border border-gray-600">
                <div class="flex flex-col h-full">
                    <!-- Card top -->
                    <div class="flex-grow p-5">
                        <div class="flex justify-between items-start">
                        <?php
                        $id = $_SESSION['loggedInUser']['id'];
                        $user = "SELECT * FROM users WHERE id  = $id";
                    
                        $result = mysqli_query($conn,$user);
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        
                          $name = $row['name'];
                          $phone	= $row['phone'];
                          $email	 = $row['email'];
                          $role	 = $row['role'];
                          $id	= $row['id'];
                          $image	= $row['image'];
                          
                        ?>
                        <header>
                                <div class="flex mb-2">
                                    <a class="relative inline-flex items-start mr-5" href="#0">
                                        <div class="absolute top-0 right-0 -mr-2 bg-white rounded-full shadow" aria-hidden="true">
                                            <svg class="w-8 h-8 fill-current text-green-500" viewBox="0 0 32 32">
                                                <path d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                            </svg>
                                        </div>
                                        <img class="rounded-full" src="../<?php echo $image;?>" width="64" height="64" alt="User 01" />
                                    </a>
                                    <div class="mt-1 pr-1">
                                        <a class="inline-flex " href="#0">
                                            <h2 class="text-xl leading-snug justify-center font-semibold"><?php echo $name;?></h2>
                                        </a>
                                        <div class="flex items-center"><span class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">-&gt;</span> <span><?php echo $role;?></span></div>
                                    </div>
                                </div>
                            </header>
                        <?php
                        }
                        }
                        ?>
                            <!-- Image + name -->
                            
                            
                        </div>
                        <!-- Bio -->
                        <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            <div class="flex gap-3 justify-between">Email: <span class="text-gray-500 dark:text-white"><?php echo $email;?></span>
                            </div>
                            <div class="flex gap-3 justify-between items-center"> <span class="italic">Phone:</span> <span class="text-gray-500 dark:text-white"><?php echo $phone;?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="border-t border-gray-600">
                        <div class="flex divide-x divide-gray-400r">
                            <a class="block flex-1 text-center text-sm text-red-600 hover:text-red-800 font-medium px-3 py-4" href="../../authenticate/logout.php">
                                <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                                    <span>Logout</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" data-modal-target="crud-modal2"  data-modal-toggle="crud-modal2"
                            class="block views flex-1 text-center text-sm text-gray-600 dark:text-white hover:text-green-500 font-medium px-3 py-4 group" href="#0">
                                <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-green-500 flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                        <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                    </svg>
                                    <span>Edit Profile</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div>
        <div>
           <!-- Card -->
           <div class="max-w-sm mx-auto bg-gray-100 dark:bg-slate-800 shadow-lg rounded-md border border-gray-600">
                <div class="flex flex-col h-full">
                    <!-- Card top -->
                    <?php
                        $pharprofile = getAll ('pharprofile');
                        if (mysqli_num_rows($pharprofile) > 0) {
                          ?>
                          <?php foreach($pharprofile as $phaInfo) :?>
                    <div class="dark:bg-green-500 m-2">
                      <img src="../<?= $phaInfo['image']?>" alt="">
                    </div>
                    <div class="flex-grow p-5">
                        <div class="flex justify-center">
                            <!-- Image + name -->
                          <div class="flex flex-col gap-2 items-center justify-center -mt-14">
                            <div class="text-3xl uppercase"><?= $phaInfo['name']?></div>
                            <div class="flex gap-2 justify-between text-xs ">
                              <p><?= $phaInfo['email']?></p>|
                              <p><?= $phaInfo['phone']?></p>|
                              <p><?= $phaInfo['location']?></p>
                            </div>
                            <div class="text-2xl"> Intial Capital: </div>
                          
                        
                            <span class="text-green-500 font-bold text-xl">
                              <!--Currency-->
                              <span class="text-sm">
                                <?php echo $profile['Currency'];?>
                              </span>
                            <?= $phaInfo['initialCapital']?></span>
                            <?php endforeach?>
                          <?php
                        }else{
                            ?>
                            <tr>
                                <td>
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php $phaInfo['initalCapital'] = 0;
                                    echo $phaInfo['initalCapital'];
                                ?></td>
                            </tr>
                          <?php
                        }
                        ?>
                          </div>
                            
                        </div>
                        <!-- Info -->
                        <div class="mt-2 flex justify-center">
                            <div class="text-xs italic text-slate-400">This is the amount that was used to start the pharmacy or the prev year balance</div>
                        </div>
                        <!-- Accounts -->
                        <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                          <?php 
                          $today = date("Y-m-d", strtotime(date("Y-m-d")));
                            $sql ="SELECT SUM(amount) as 'amount' FROM purchases ";
                              //create a query that fetch data from the database
                              $result = mysqli_query($conn,$sql);
                              $content = mysqli_fetch_array($result);	
                            ?>
                              <div class="flex gap-3 justify-between">Purchases <span class="text-red-500"><!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>(<?php echo $content['amount'];?>)</span>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-red-600">
                              <path fill-rule="evenodd" d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z" clip-rule="evenodd" />
                              </svg>
                              </div> 
                        </div>
                        <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                          <?php 
                          $today = date("Y-m-d", strtotime(date("Y-m-d")));
                            $sql ="SELECT SUM(amount) as 'amount' FROM expenses ";
                              //create a query that fetch data from the database
                              $result = mysqli_query($conn,$sql);
                              $info = mysqli_fetch_array($result);	
                            ?>
                              <div class="flex gap-3 justify-between">Wastages
                                 <span class="text-red-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php echo $info['amount'];?></span>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-red-600">
                              <path fill-rule="evenodd" d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z" clip-rule="evenodd" />
                              </svg>
                              </div> 
                        </div>
                        <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                        <?php 
                        $total_amount = 0;
                        $today = date("Y-m-d", strtotime(date("Y-m-d")));
                          $sql ="SELECT SUM(total_amount) as 'total_amount' FROM sales WHERE sales_data = '$today'";
                            //create a query that fetch data from the database
                            $res = mysqli_query($conn,$sql);
                            $data = mysqli_fetch_array($res);	
                          ?>
                            <div class="flex  justify-between gap-3">Daily Sales: <span class="text-green-500">
                            <!--Currency-->
                              <span class="text-sm">
                                <?php echo $profile['Currency'];?>
                              </span>  
                            <?php echo $data['total_amount'];?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-green-500">
                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                            </svg>

                            </div>
                        </div>
                        <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                        <?php 
                        $total_amoun = 0;
                        $today = date("Y-m-d", strtotime(date("Y-m-d")));
                          $sql ="SELECT SUM(total_amount) as 'total_amount' FROM sales ";
                            //create a query that fetch data from the database
                            $res = mysqli_query($conn,$sql);
                            $data = mysqli_fetch_array($res);	
                          ?>
                            <div class="flex  justify-between gap-3">Total Sales: 
                              <span class="text-green-500">
                                <!--Currency-->
                                <span class="text-sm">
                                  <?php echo $profile['Currency'];?>
                                </span>
                                <?php echo $data['total_amount'];?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-green-500">
                            <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                            </svg>

                            </div>
                        </div>
                    </div>
                    <!-- Card footer -->
                    <div class="border-t border-gray-600">
                        <div class="flex divide-x divide-gray-400r">
                            
                            <a href="javascript:void(0)" data-modal-target="pharAccounts"  data-modal-toggle="pharAccounts" data-id="<?= $phaInfo['id']?>"
                            class="block views flex-1 text-center text-sm text-gray-600 dark:text-white hover:text-green-500 font-medium px-3 py-4 group" href="#0">
                                <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                        <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                    </svg>
                                    <span>Update Company</span>
                                </div>
                            </a>
                            <a class="block flex-1 text-center text-sm text-green-500 hover:text-green-600 font-medium px-3 py-4" href="#0">
                                <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-green-500">
                                <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                </svg>

                                    <span>Export</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        <div>
          <div class="max-w-sm mx-auto bg-gray-100 dark:bg-slate-800 shadow-lg rounded-md border border-gray-600">
                  <div class="flex flex-col h-full">
                      <!-- Card top -->
                      <?php
                          $pharprofile = getAll ('pharprofile');
                          if (mysqli_num_rows($pharprofile) > 0) {
                            ?>
                            <?php foreach($pharprofile as $phaInfo) :?>
                      <div class="dark:bg-green-500 m-2">
                      </div>
                      <div class="flex-grow p-5">
                          <div class="flex justify-center">
                              <!-- Image + name -->
                            <div class="flex flex-col gap-2 items-center justify-center ">
                              <div class="text-2xl"> Minimum Quantities: </div>
                              <?php endforeach?>
                            <?php
                          }else{
                              ?>
                              <tr>
                                  <td>
                                    <!--Currency-->
                                    <span class="text-sm">
                                      <?php echo $profile['Currency'];?>
                                    </span>
                                    <?php $phaInfo['initalCapital'] = 0;
                                      echo $phaInfo['initalCapital'];
                                  ?></td>
                              </tr>
                            <?php
                          }
                          ?>
                            </div>
                              
                          </div>
                          <!-- Info -->
                          <div class="mt-2 flex justify-center">
                              <div class="text-xs italic text-slate-400">This are the Mimimum/Maximum quantites for the pharmacy</div>
                          </div>
                          <!-- Accounts -->
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                          <?php
                            $minquantities = getAll ('minquantities');
                            if (mysqli_num_rows($minquantities) > 0) {
                                ?>
                                <?php foreach($minquantities as $QTY) :?>
                                <div class="flex gap-3 justify-between">Pharmacy Balance <span class="text-green-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php echo $QTY['pharBalance'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            
                                <div class="flex gap-3 justify-between">Total Sales <span class="text-green-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php echo $QTY['totalSales'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            
                                <div class="flex gap-3 justify-between">Invoice Due<span class="text-green-500">
                                  <!--Currency-->
                                    <span class="text-sm">
                                      <?php echo $profile['Currency'];?>
                                    </span>
                                  <?php echo $QTY['invoiceDue'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            
                                <div class="flex gap-3 justify-between">Expired<span class="text-green-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php echo $QTY['expired'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            
                                <div class="flex gap-3 justify-between">Wastage <span class="text-green-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                  <?php echo $QTY['wastage'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                            
                                <div class="flex gap-3 justify-between">Profit <span class="text-green-500">
                                  <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                                <?php echo $QTY['profit'];?></span>
                                </div> 
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                          
                              <div class="flex  justify-between gap-3">Total Sales <span class="text-green-500">
                                <!--Currency-->
                                  <span class="text-sm">
                                    <?php echo $profile['Currency'];?>
                                  </span>
                              <?php echo $QTY['todayTSales'];?></span>
                              </div>
                          </div>
                          <div class=" flex flex-col mt-2 border-t py-2 border-gray-600">
                          
                              <div class="flex  justify-between gap-3"> Sales Orders: <span class="text-green-500">
                                <!--Currency-->
                                <span class="text-sm">
                                  <?php echo $profile['Currency'];?>
                                </span>
                              <?php echo $QTY['salesOrders'];?></span>
                              </div>
                          </div>
                              <?php endforeach?>
                          <?php
                          }else{
                              ?>
                            Quanities set will appear here
                            <?php
                          }
                          ?>
                      </div>
                      <!-- Card footer -->
                      <div class="border-t border-gray-600">
                          <div class="flex divide-x divide-gray-400r">
                              <a class="block flex-1 text-center text-sm text-green-500 hover:text-green-600 font-medium px-3 py-4" href="#0">
                                  <div class="flex items-center justify-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-green-500">
                                  <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                  </svg>

                                      <span>Export</span>
                                  </div>
                              </a>
                              <a href="javascript:void(0)" data-modal-target="quanities"  data-modal-toggle="quanities"
                              class="block views flex-1 text-center text-sm text-gray-600 dark:text-white hover:text-green-500 font-medium px-3 py-4 group" href="#0">
                                  <div class="flex items-center justify-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                    <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                  </svg>
                                    
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
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
                        Update User Information
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
                <form action="../admins/code.php" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto w-full px-3 py-4">
                <div class="grid grid-cols-2 gap-2">
                    
              <div class="mb-5">
                <input type="hidden" name="id" value="<?= $_SESSION['loggedInUser']['id'];?>">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" id="name" name="name" value="<?= $_SESSION['loggedInUser']['name'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"   />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                <input type="email" id="email" name="email" value="<?= $_SESSION['loggedInUser']['email'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?= $_SESSION['loggedInUser']['phone'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">text</label>
                <input type="text" id="text" name="text"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
                <input type="file" id="text" name="image"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              
              </div>
              <button type="submit" name="selfUserUpdate" class="w-full text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-800">Update</button>
            </form>
                </div>  
            </div>
        </div>
    </div>
    <!------ end of model ----->

     <!-- Modal1 goes here.. -->
     <div id="pharAccounts" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Pharmacy Accounts Information
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
                <form action="../admins/code.php" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto w-full px-3 py-4">
                <div class="grid grid-cols-2 gap-2">
                    
              <div class="mb-5">
                <input type="hidden" name="pharmId" value="<?= $phaInfo['id']?>">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
                <input type="text" id="name" name="name" value="<?= $phaInfo['name']?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"   />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Email</label>
                <input type="email" id="email" name="email" value="<?= $phaInfo['email']?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?= $phaInfo['phone']?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                <input type="text" id="text" name="location"  value="location" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="Capital" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Inital Capital</label>
                <input type="text" id="text" name="capital" value="<?= $phaInfo['initialCapital']?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
                <input type="file" id="text" name="image"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>

              <div class="mb-5">
                <label for="Currency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Currency</label>
                <input type="text" id="text" name="Currency" value="<?= $phaInfo['Currency']?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
              </div>
              
              </div>
              <button type="submit" name="BsUpdate" class="w-full text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-800">Update</button>
            </form>
                </div>  
            </div>
        </div>
    </div>
    <!------ end of model ----->

     <!-- Modal1 goes here.. -->
     <div id="quanities" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                         Pharmacy  Min Quantities
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
                <form action="../admins/code.php" method="POST" class="grid md:grid-cols-2 gap-2 p-4 mb-5">
            <div class="mb-5">
              <input type="hidden" name="id" value="<?php echo $QTY['id'];?>"/>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pharmacy Balance</label>
              <input type="text" id="email" name="pharBal" value="<?php echo $QTY['pharBalance'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Sales</label>
              <input type="text" id="text" name="totalSales" value="<?php echo $QTY['totalSales'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Sales Today</label>
              <input type="text" id="text" name="totalTSales"  value="<?php echo $QTY['todayTSales'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sales Orders</label>
              <input type="text" id="text" name="salesOrders" value="<?php echo $QTY['salesOrders'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice</label>
              <input type="text" id="text" name="invoices" value="<?php echo $QTY['invoiceDue'];?> " class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wastage</label>
              <input type="text" id="text" name="wastage" value="<?php echo $QTY['wastage'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purchases</label>
              <input type="text" id="password" name="purchases" value="<?php echo $QTY['purchases'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired</label>
              <input type="text" id="text" name="expired" value="<?php echo $QTY['expired'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <div class="mb-5 col-span-2">
              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profit</label>
              <input type="text" id="text" name="profit" value="<?php echo $QTY['profit'];?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light" placeholder="Enter the minimum Qty required" requigreen />
            </div>
            <button type="submit" name="saveQunitities" class="w-full col-span-2 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
          </form>
                </div>  
            </div>
        </div>
    </div>
    <!------ end of model ----->

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
      $('#purName').keyup(function(event){
          event.preventDefault();
          var action = 'searchRecord';
          var purName = $('#purName').val();
          if(purName != ''){

              $.ajax({
                  url: "../includes/purSearch.php",
                  method: "POST",
                  data: {action:action,purName:purName},
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
