<?php   require"../../config/function.php";?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <title>UltimatePharmacy</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <div class="flex flex-col gap-4  w-full py-4 justify-center items-center ">
            <h1 class="text-3xl flex items-center justify-center text-slate-800 dark:text-white">Edit Account</h1>
        <div class="flex flex-col  items-center justify-center mt-10 w-full ">
          <?php 
              alertMessage();
            ?>
        <div class="grid lg:grid-cols-2 gap-3  bg-white rounded-md dark:bg-slate-800  w-2/3">
          <div>
            <img src="../images/uploads/1716548439.png" class=" h-full" alt="">
          </div>
          <div class="flex flex-col justify-center items-center ">
            
              <form action="code.php" method="POST" class="max-w-sm mx-auto w-full px-3 py-4">
              
                <?php
                    if (isset($_GET["id"])) {
                        $userId = $_GET["id"];
                        
                        if ($_GET['id'] !='') {
                            $user = $_GET['id'];
                        }else {
                            echo'No id found';
                            return false;
                        }
                    } else {  
                        echo 'No id found in the params';
                        return false;
                      }
                        $userData = getById('users', $userId);
                        if ($userData) {
                            if ($userData['status'] = 200) {
                               ?>
            <div class="grid grid-cols-2 gap-2">
                <div class="mb-5">
                    <input type="hidden" name="userId" value="<?= $userData['data']['id'];?>">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                    <input type="text" id="name" name="name" value="<?= $userData['data']['name'];?>" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"   />
                </div>
                  <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                    <input type="email" id="email" name="email" value="<?= $userData['data']['email'];?>" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
                  </div>
                  <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="<?= $userData['data']['phone'];?>" class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
                  </div> 
                  <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="phone" name="password" 
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light"  />
                  </div> 
                  <div class="mb-5">
                  <label for="Role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                  <select name="role" id="" class="shadow-sm bg-white border border-slate-400 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light">
                    <option value="<?= $userData['data']['role'];?>"><?= $userData['data']['role'];?></option>
                    <option value="adminstrator">adminstrator</option>
                    <option value="standard">standard</option>
                  </select>
                  
                  </div>
                  <div class="mb-5">
                    <label for="banned" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Banned</label>
                    <input type="checkbox" id="banned" name="is_ban" 
                    <?= $userData['data']['is_ban'] == true ? 'Checked' : '';?> 
                    class=" w-4 h-4 p-3 bg-white border border-gray-300 text-gray-900 text-sm   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "  />
                  </div>
              </div>
              <button type="submit" name="updateAdmin" class="w-full text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
                               <?php
                            }
                        }else {
                            echo 'Something went wrong';
                            return false;
                        }
                ?>
            </form>
          </div>
        </div>
      </div>
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
  </body>
</html>
