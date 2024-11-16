<?php   require"../../config/function.php";?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        background-color: gray;
        display: flex;
        align-items: center;
        color:white !important;
        
      }
      
    </style>
  </head>
  <body class="bg-slate-200 dark:bg-slate-900 ">
    <button
      data-drawer-target="sidebar-multi-level-sidebar"
      data-drawer-toggle="sidebar-multi-level-sidebar"
      aria-controls="sidebar-multi-level-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
      <?php 
          alertMessage();
        ?>
      <div class="flex flex-col gap-4  w-full p-4 justify-center items-center">
      <h2 class="text-2xl text-slate-800 dark:text-white">Add Purchases</h2>
      <div class="flex w-auto md:w-1/2 border border-slate-400 dark:border-slate-700 bg-white rounded-md dark:bg-slate-800 p-4">    
          <form method="POST" action="../admins/code.php"
           class="w-full max-w-lg text-slate-400 dark:text-white  ">
          <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                    Medicine Name
                  </label>
                  <select name="name"
                  class=" appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2 dark:text-white" name="state">
                  <option value="AL">--Select Medicine --</option>
                    <?php
                      $products = getAll('products');
                      if ($products) {
                        if (mysqli_num_rows($products) > 0) {
                         foreach ($products as $key => $proItem) {
                          ?>
                          <option value="<?= $proItem['name'];?>"><?= $proItem['name'];?></option>
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
              </div>
              <div class="flex -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                    Category
                  </label>
                  <select name="category"
                  class=" appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2" name="state">
                    <option value="AL">--Select Category --</option>
                    <?php
                      $categories = getAll('categories');
                      if ($categories) {
                        if (mysqli_num_rows($categories) > 0) {
                         foreach ($categories as $key => $cateItem) {
                          ?>
                          <option value="<?= $cateItem['categoryName'];?>"><?= $cateItem['categoryName'];?></option>
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
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                  Expiry Date
                  </label>
                  <input name="expiryDate" type="date"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-slate-800" id="grid-first-name" type="text" placeholder=" Buying P">
                  </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                    Supplier
                  </label>
                  <select name="supplier"
                  class=" appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2" name="state">
                  <option value="AL">--Select supplier --</option>
                    <?php
                      $suppliers = getAll('suppliers');
                      if ($suppliers) {
                        if (mysqli_num_rows($suppliers) > 0) {
                         foreach ($suppliers as $key => $supItem) {
                          ?>
                          <option value="<?= $supItem['name'];?>"><?= $supItem['name'];?></option>
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
              </div>
              <div class="flex -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                  PurchaseQuantity
                  </label>
                  <input name="quantity"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-slate-800" id="grid-first-name" type="text" placeholder="Enter Quantity">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                  Buying Price
                  </label>
                  <input name="buyingPrice" onclick="subtract()" id="buyingPrice"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-slate-800" id="grid-first-name" type="text" placeholder=" Buying P">
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                    Selling Price
                  </label>
                  <input name="sellingPrice" onclick="subtract()" id="sellingPrice"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none " id="grid-last-name" type="text" placeholder=" Selling P">
                </div>
                <div class="w-full md:w-1/2 px-3"> 
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                   Profit
                  </label>
                  <input name="profit" onclick="subtract()" id="profit"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-slate-400 dark:border-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none " 
                  id="grid-password" 
                  type="number" >
                </div>
              </div>

              <button type="submit" name="savePurchases" class="w-full  bg-green-500 p-3 mt-4 text-white">Submit</button>
              </div>
          </form>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      </script>
      <script>
        function subtract(){
        var buyingPrice = document.getElementById('buyingPrice').value;
        var sellingPrice = document.getElementById('sellingPrice').value;
        var profit =parseFloat(sellingPrice)-parseFloat(buyingPrice);
        document.getElementById('profit').value = profit;
      }
      
    </script>
  </body>
</html>
