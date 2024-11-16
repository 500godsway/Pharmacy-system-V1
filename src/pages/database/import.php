<div class="h-full flex flex-col gap-4 items-center justify-center bg-gray-50 dark:bg-gray-900">
<link href="../../output.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>
<?php   require"../../config/function.php";
// get all the tables of the database


$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));

$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($conn,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($handle);
echo "

<div class='flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400' role='alert'>
  <svg class='flex-shrink-0 inline w-4 h-4 me-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
    <path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z'/>
  </svg>
  <span class='sr-only'>Info</span>
  <div>
    <span class='font-medium'>Success alert!</span> Database Exported Successfully.
  </div>
</div>
";
?>
    <a href="database.php" class="bg-green-500 p-4 text-white">Back</a>
</div>