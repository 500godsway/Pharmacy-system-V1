<?php   require"../../config/function.php";
?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="../../output.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <div class="flex flex-col dark:text-white p-4">
        <div class="text-2xl">Expenses Overview</div>
      </div>
      <div class="grid lg:grid-cols-4 gap-4 my-6 flex-wrap h-full">
        <div class="flex flex-col gap-10 p-4 text-slate-400 dark:text-white items-center w-auto border border-slate-400 dark:border-slate-700 rounded-md bg-white dark:bg-slate-800 h-auto">
            <div class="text-3xl  ">Expired</div>
            <div class="flex flex-col items-center font-bold text-slate-400 dark:text-white">
                <div class="text-5xl"><?= CountExp('expenses');?></div>  
                <div class="italic text-sm">Drugs</div>      
            </div>
            <div class="italic text-sm">Worth</div>  
            <?php 
                $sql ="SELECT SUM(amount) as 'Price' FROM expenses WHERE expenseType= 'Expired Medicine'";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                  $data = mysqli_fetch_array($res);	
                ?> 
            <div class="text-3xl"><?php echo $currency?>.<?php echo $data['Price'];?></div>  
            <a href="expired.php" class="p-4 text-white bg-green-500">View more Details</a>
        </div>
        <div class="flex flex-col gap-10 p-4 text-slate-400 dark:text-white items-center w-auto bg-white dark:bg-slate-800 h-auto border border-slate-400 dark:border-slate-700 rounded-md">
            <div class="text-3xl  ">Purchases</div>
            <div class="flex flex-col items-center font-bold text-slate-400 dark:text-white">
                <div class="text-5xl"><?= getCount('purchases');?></div>  
                <div class="italic text-sm">Drugs</div>      
            </div>
            <div class="italic text-sm">Worth</div> 
            <?php 
                $sql ="SELECT SUM(amount) as 'amount' FROM purchases";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                  $data = mysqli_fetch_array($res);	
                ?> 
            <div class="text-3xl"><?php echo $currency?>.<?php echo $data['amount'];?></div>  
            <a href="../purchases/purchases.php" class="p-4 text-white bg-green-500">View more Details</a>
        </div>
        <div class="flex flex-col gap-10 p-4 text-slate-400 dark:text-white items-center w-auto border border-slate-400 dark:border-slate-700 rounded-md bg-white dark:bg-slate-800 h-auto">
            <div class="text-3xl  ">Damaged</div>
            <div class="flex flex-col items-center font-bold text-slate-400 dark:text-white">
                <div class="text-5xl"><?= CountDam('expenses');?></div>  
                <div class="italic text-sm">Drugs</div>      
            </div>
            <div class="italic text-sm">Worth</div>  
            <?php 
                $sql ="SELECT SUM(amount) as 'amount' FROM expenses WHERE expenseType= 'Damaged'";
                  //create a query that fetch data from the database
                  $res = mysqli_query($conn,$sql);
                  $data = mysqli_fetch_array($res);	
                ?> 
            <div class="text-3xl"><?php echo $currency?>.<?php echo $data['amount'];?></div>  
            <a href="../expenses/damaged.php" class="p-4 text-white bg-green-500">View more Details</a>
        </div>
       
        <!-- Component Start -->
        <div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white dark:bg-slate-900 border border-1 border-slate-400 dark:border-slate-700 dark:text-white rounded-lg shadow-xl sm:p-8">
            <h2 class="text-xl font-bold">Expenses Overview</h2>
            <span class="text-sm font-semibold text-gray-500">2024</span>
            <div class="w-64 h-64 mt-9">
                <canvas id="donut-chart"></canvas>
            </div>
        </div>
        <!-- Component End  -->

        </body>
        </div>                              
        </div>
        
      </div>c5
    </div>
    
    <script>
    // Get the canvas element
    var canvas = document.getElementById('donut-chart');

    
        // Set the chart data
        var data = {
            labels: ['Expired',  'Purchases'],
            datasets: [{
                label: 'Expenses overview',
                <?php 
                $product = "SELECT (SUM(sellingPrice)/2) as 'sellingPrice', (SUM(amount)/2) as 'amount'
                FROM  purchases  as pc, expenses as e";  
                $result = mysqli_query($conn,$product);
                $data = mysqli_fetch_array($result);	
                ?>
               
                data: [<?php echo $data['amount']?>,<?php echo $data['sellingPrice']?>],
               
                backgroundColor: [
                    '#EF4444',
                    '#3B82F6',
                    '#FBBF24'
                ],
                hoverOffset: 4
            }]
        };

        // Set the chart options
        var options = {
            plugins: {
                legend: {
                    display: false
                }
            },
            aspectRatio: 1,
            cutout: '50%',
            animation: {
                animateRotate: false
            }
        };

        // Create the chart
        var chart = new Chart(canvas, {
            type: 'doughnut',
            data: data,
            options: options
        });
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
