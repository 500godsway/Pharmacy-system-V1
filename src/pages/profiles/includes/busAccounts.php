
    <div class="h-full w-full">
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
                          <?= $phaInfo['initialCapital']?></span>
                        <?php endforeach?>
                       <?php
                    }else{
                        ?>
                        <tr>
                            <td>Ksh<?php $phaInfo['initalCapital'] = 0;
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
                        $sql ="SELECT SUM(buyingPrice) as 'buyingPrice' FROM purchases ";
                          //create a query that fetch data from the database
                          $result = mysqli_query($conn,$sql);
                          $content = mysqli_fetch_array($result);	
                        ?>
                          <div class="flex gap-3 justify-between">Purchases <span class="text-red-500">-Ksh<?php echo $content['buyingPrice'];?></span>
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
                          <div class="flex gap-3 justify-between">Wastages <span class="text-red-500">-Ksh<?php echo $info['amount'];?></span>
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
                        <div class="flex  justify-between gap-3">Daily Sales: <span class="text-green-500">Ksh<?php echo $data['total_amount'];?></span>
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
                        <div class="flex  justify-between gap-3">Total Sales: <span class="text-green-500">Ksh<?php echo $data['total_amount'];?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-green-500">
                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                        </svg>

                        </div>
                    </div>
                    <div class="flex gap-3 mt-2 border-t py-2 justify-between items-center"> <span class="text-xl">
                    
                   <?php 
                   $phaInfo['initialCapital'] = 1;
                   if ($phaInfo['initialCapital'] == 0){
                   
                  }else{
                    //$phaInfo['initialCapital'] = $phaInfo['initialCapital'];
                  }
                      $balance = $data['total_amount'] + $phaInfo['initialCapital'] - $info['amount'] - $content['buyingPrice'];
                    ?>  
                    Total Balance:</span> <span class="text-green-500">Ksh<?php echo $balance?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-red-600">
                        <path fill-rule="evenodd" d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z" clip-rule="evenodd" />
                        </svg>
                        </div>
                     
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
                        <a href="javascript:void(0)" data-modal-target="pharAccounts"  data-modal-toggle="pharAccounts"
                        class="block views flex-1 text-center text-sm text-gray-600 dark:text-white hover:text-green-500 font-medium px-3 py-4 group" href="#0">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                </svg>
                                <span>Add Company </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  