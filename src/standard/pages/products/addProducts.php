<?php   require"../../../config/function.php";?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
  <body class="bg-gray-100 dark:bg-slate-900">
    <button
      data-drawer-target="sidebar-multi-level-sidebar"
      data-drawer-toggle="sidebar-multi-level-sidebar"
      aria-controls="sidebar-multi-level-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
      <div class="flex flex-col gap-4  w-full p-4 justify-center items-center ">
            <h2 class="text-2xl text-slate-800 dark:text-white">Add Product</h2>
          <div class="flex w-auto md:w-1/2 justify-center bg-white rounded-md border dark:border-gray-600 dark:bg-slate-800 px-4">    
          <form method="POST" action="../admins/code.php" enctype="multipart/form-data"
          class="w-full max-w-lg text-slate-400 dark:text-white ">
          <div class="flex flex-wrap -mx-3 my-3">
                <div class="w-full px-3">
                   <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                    Medicine Name
                  </label>
                  <input name="name"
                  class="appearance-none block w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:dark:bg-slate-700" id="grid-first-name" type="text" placeholder="Enter Product name">
                  </div>
              </div>
              <div class="flex flex-wrap -mx-3 my-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                   Category
                  </label>
                  <select name="categoryId"
                  class=" appearance-none block w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700   rounded py-3 px-4 leading-tight focus:outline-none mySelect2" name="state">
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
                          echo'<option value="AL">No products found</option>';
                        }
                      }else {
                        echo'<option value="AL">Something Went Wrong</option>';
                      }
                    ?>
                </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-first-name">
                   Unit
                  </label>
                  <select name="supplierId"
                  id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 mySelect2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white  ">
                    <option value="" >Choose Unit</option>
                    <?php 
                      $units = fetchAll ('units');
                      if($units){
                              if (mysqli_num_rows($units)) {
                               foreach ($units as $unitItem) {
                                echo '<option value="'.$unitItem['id'].'">'.$unitItem['name'].'</option>';
                               }
                              }else {
                                echo '<option >No Category Found</option>';
                              }
                      }else{
                        echo '<option >Something Went Wrong</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              <div class="flex flex-wrap -mx-3 my-3">
                <div class="w-full  px-3 mb-6 md:mb-0">
                <div class="w-full  px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-last-name">
                    Product Image
                  </label>
                  <input name="image"
                  class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"  type="file">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 my-3">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide  text-xs font-bold mb-2" for="grid-password">
                    Description
                  </label>
                  <div class="w-full  px-3">
                  <textarea name="description" class="appearance-none  w-full 
                  bg-gray-100 dark:bg-gray-800 border
                   border-gray-300 dark:border-gray-700  
                   rounded py-3 px-4  leading-tight focus:outline-none" name="" id=""  ></textarea>
                    </div>
                  </div>
              </div>
              <button type="submit" name="saveProduct" 
              class="w-full bg-green-500 p-3 mb-3 text-white">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      </script>
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
