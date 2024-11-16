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
  <body class="bg-gray-100 dark:bg-slate-900">
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
      <?php 
          alertMessage();
        ?>
            <section class="flex flex-col w-full justify-center  antialiased  dark:text-white text-gray-600 ">
                <div class=" flex flex-col items-center h-full">
                    <!-- Card -->
                    <div class="w-ful md:w-1/2 p-4 m-4 flex justify-center bg-white dark:bg-slate-800 shadow-lg rounded-md border border-gray-600">
                        <div class="flex flex-col h-full p-4">
                            <!-- Card top -->
                            <div class="flex-grow p-5">
                                <div class="flex flex-col justify-between items-start">
                                <header class="border-b border-slate-800 w-full">
                                        <div class="flex mb-2 justify-center w-full">
                                            <h1 class="text-2xl">Activity Log</h1>
                                        </div>
                                </header>
                                <?php
                                //$id = $_SESSION['loggedInUser']['id'];
                                $query = "SELECT l.*, a.* FROM  site_activity_log_automation_tbl l, admins a WHERE a.id = l.user_id ORDER BY l.createdAt DESC";
                            
                                $result = mysqli_query($conn,$query);
                                if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                
                                $name = $row['name'];
                                $action	= $row['action'];
                                $createdAt	 = $row['createdAt'];
                                $image	 = $row['image'];
                                $id	= $row['id'];
                                $url	= $row['url'];
                                $image	= $row['image'];
                                
                                ?>
                                <ol class="relative border m-2 w-full border-white dark:border-gray-800">                  
                                    <li class="ms-6 mb-2">
                                        <span class="absolute flex items-center justify-center w-10 h-10 rounded-full -start-3 ring-4 ring-white dark:ring-gray-900 ">
                                            <img class="rounded-full shadow-lg" src="../images/uploads/1716548439.png" alt="Jese Leos image"/>
                                        </span>
                                        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-800 dark:border-gray-600">
                                            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"> <span class="px-2">At </span><?php echo $createdAt;?> </time>
                                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300"><?php echo $name;?>, <?php echo $action?> <a href="<?php echo $url;?>" class="font-semibold text-green-600 dark:text-green-500 hover:underline"> Url, </a>  
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                                <?php
                                }
                                }
                                ?>
                                </div>
                            </div>
                            <!-- Card footer -->
                        </div>
                    </div>
                </div>
            </section>
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
  </body>
</html>
