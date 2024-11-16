<?php

  require"../../../config/function.php";

  if (!isset($_SESSION['requestItem'])) {
    $_SESSION['requestItem'] = [];
  }
  if (!isset($_SESSION['requestItemIds'])) {
    $_SESSION['requestItemIds'] = [];
  }

  if (isset($_POST["requestAdd"])) {

    $requestId = validate($_POST["medicineId"]);
    $quantity = validate($_POST["quantity"]);
    $user = validate($_POST["user"]);
    $destination = validate($_POST["destination"]);

    // Sessions
    $_SESSION["quantity"] = $quantity;
    $_SESSION["user"] = $user;
    $_SESSION["destination"] = $destination;
    

    $checkMedicine = mysqli_query($conn, "SELECT * FROM purchases WHERE mId='$requestId' LIMIT 1");
    if($checkMedicine){

        if(mysqli_num_rows($checkMedicine) > 0){
            $row = mysqli_fetch_array($checkMedicine);
            if($row['quantity'] < $quantity) {
                redirect('../products/requisation.php','CurrentStock:'.$row['quantity'].', Your Request Exceed Stock!');
            }

            $medicineData = [
                'requestId'=> $row['mId'],
                'name'=> $row['name'],
                'quantity'=> $quantity,
                'user'=> $user,
                'destination'=> $destination,
            ];
            if (!in_array($row['mId'],$_SESSION['requestItemIds'])) {

                array_push($_SESSION['requestItemIds'],$row['mId']);
                array_push($_SESSION['requestItem'],$medicineData);

            }else{
                foreach($_SESSION['requestItem'] as $key => $medSession) {
                    if ($medSession['requestId'] == $row['mId']) {
                        
                        $newQuantity = $medSession['quantity'] + $quantity;

                        $medicineData = [
                            'requestId'=> $row['requestId'],
                            'name'=> $row['name'],
                            'quantity'=> $newQuantity,  
                        ];
                        $_SESSION['requestItem'][$key] = $medicineData;
                    }
            }
        }
        redirect('../products/requisation.php','Medicine Added Successfully' .$row['name']);
    }else {
        redirect('../products/requisation.php','No such product found!');
    }

  }else {
    redirect('../products/requisation.php','Something went wrong!');
  }
}


if(isset($_POST['proceedToRequestBtn'])) {

  $user = validate($_POST['user']);
  
  $checkMedicine = mysqli_query( $conn, "SELECT * FROM purchases ");
  if($checkMedicine){
      if(mysqli_num_rows($checkMedicine) > 0) {
        $_SESSION['orderNo'] = "O-".rand(1111,9999);
        
        
        jsonResponse(200, 'success', 'Medicine Found') ;
      }
      else{
        $_SESSION["user"] = "$user";
        jsonResponse(404, 'warning', 'Medicine  not found!') ;
      }
  }
  else{
    jsonResponse(500, 'error', 'Something went wrong') ;
  }
}


if(isset($_POST['saveRequest'])) {

  $user = validate($_SESSION['user']);


  $checkOrders = mysqli_query( $conn, "SELECT * FROM purchases");
  if($checkOrders){

    //jsonResponse(500, "error", "Something went wrong") ;
  }
  if (mysqli_num_rows($checkOrders) > 0) {
    $sessionProducts = $_SESSION['requestItem'];
    foreach($sessionProducts as $orderItem) {
      $quantity = $orderItem['quantity'];
    }

    $checkOrders = mysqli_fetch_assoc($checkOrders);
    //$totalPurchaseQuantity = $checkOrders['quantity'] - $quantity;

    if (!isset($_SESSION["requestItem"])) {
      jsonResponse(404, "warning", "No items to place order") ;

      
    }
    $sessionProducts = $_SESSION['requestItem'];
    foreach($sessionProducts as $orderItem) {
      
      $quantity = $orderItem['quantity'];
      $name = $orderItem['name'];
      $user = $orderItem['user'];
      $destination = $orderItem['destination'];
      $requestId = $orderItem['requestId'];
      

      $data = [
        'mId' => $orderItem['requestId'],
        'requestNo'=> "requestNo-".rand(1111,9999),
        'quantity'=> $quantity,
        'name'=> $name,
        'user'=> $user,
        'destination'=> $destination,
 
     ];
 
     $result = insert('requisitions', $data);

      // Checkig for the medicine quantity nd decreasing quantity and making total quantity
     
      $checkProductQuantityQuery = mysqli_query($conn,"SELECT * FROM products WHERE id=$requestId");
      $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
      $totalProductQuantity = $productQtyData['quantity'] + $quantity;
      

      $dataUpdate = [
        'quantity'=> $totalProductQuantity
      ];

      // Update products
      $updateProductQty = update('products', $requestId, $dataUpdate);


      // Checkig for the medicine quantity and decreasing quantity and making total quantity
     
      $checkPurchaseQuantityQuery = mysqli_query($conn,"SELECT * FROM purchases WHERE mId=$requestId");
      $purchasesQtyData = mysqli_fetch_assoc($checkPurchaseQuantityQuery);
      $totalPurchaseQuantity = $purchasesQtyData['quantity'] - $quantity;
     // echo "$requestId";

      $orderUpdate = [
        'quantity'=> $totalPurchaseQuantity
      ];

      // Update products
      $updatePurchaseQty = amend('purchases', $requestId, $orderUpdate);

      
    }
    
    unset($_SESSION['requestItemIds']);
    unset($_SESSION['requestItem']);
    unset($_SESSION['user']);
    unset($_SESSION['payment_mode']);
    unset($_SESSION['quantity']);
    unset($_SESSION['destinition']);


    $response = [
      'status' => 200,
      'status_type'=> 'success',
      'message'=> 'Added',
    ];
    echo json_encode($response);
    return;
  }
  else{
    jsonResponse(404,'warning','No customer found');
  }
}
