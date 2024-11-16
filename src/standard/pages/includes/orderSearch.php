<?php
  require"../../../config/function.php";

  /*  Search by Medicine name*/
  if ($_POST['action'] == 'searchRecord') {
  $orderNo = $_POST['orderNo'];
   $product = "SELECT * FROM salesorders WHERE orderNo LIKE '%$orderNo%' ORDER BY id DESC "; 
   $result = mysqli_query($conn,$product);
   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $orderNo = $row['orderNo'];
        $customerName = $row['customerName'];
        $phone = $row['phone'];
        $email = $row['email'];
        $shippingStatus = $row['shippingStatus'];
        $status = $row['status'];
        $shippingStatus = $row['shippingStatus'];
        ?>
         <tr class="text-white border-b bg-green-500 dark:border-gray-700 hover:bg-green-400 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
            <?php echo $orderNo;?>
            </td>
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
            <?php echo $customerName;?>
            </th>
            <td class="px-6 py-4">
            <?php echo $phone;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $email;?>
            </td>
            
            <td class="px-6 py-4">
            <?php echo $shippingStatus;?>
            </td>
            <td class="px-6 py-4">
            <?php echo $status;?>
            </td>
            <td class="px-6 py-4">
                <a href="viewOrder.php?track=<?php echo $orderNo;?>" class="font-medium text-white hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                </svg>
                </a>
            </td>

            <td class="px-6 py-4">
                <a href="#" class="font-medium text-white ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600">
                <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
                </svg>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
    <?php
    
      }else{
        echo "<td class='px-4 py-2 font-medium  whitespace-nowrap text-red-500'>No records !!</td>";
      }
    }
    ?>