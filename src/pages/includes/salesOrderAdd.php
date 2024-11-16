<?php

  require"../../config/function.php";

  if (!isset($_SESSION['salesOrder'])) {
    $_SESSION['salesOrder'] = [];
  }
  if (!isset($_SESSION['salesOrderIds'])) {
    $_SESSION['salesOrderIds'] = [];
  }

  if (isset($_POST["salesOderPlace"])) {

    $shippingStatus = validate($_POST["shippingStatus"]);
    $status = validate($_POST["status"]);
    $Qty = validate($_POST["Qty"]);
    $cName = validate($_POST["cName"]);
    $phone = validate($_POST["phone"]);
    $email = validate($_POST["email"]);
    $medicineName = validate($_POST["medicineName"]);

    
    
    // Sessions
    $_SESSION['custDetails'] = [
        'phone'=> $phone,
        'cName'=> $cName,
        'email'=> $email,
        //'email'=> $row['email'],
    ];
    
    $checkMedicine = mysqli_query($conn, "SELECT * FROM products WHERE name = '$medicineName' ");
    if($checkMedicine){

        if(mysqli_num_rows($checkMedicine) > 0){
            $row = mysqli_fetch_array($checkMedicine);
           if ($Qty > $row['quantity']) {
            redirect('../sales/salesOrder.php','CurrentStock:'.$row['quantity'].', Your Request Exceed Stock!');
           }else {
            $medicineData = [
              'orderId'=> $row['id'],
              'price'=> $row['sPrice'],
              'cName'=> $cName,
              'email'=> $email,
              'phone'=> $phone,
              'shippingStatus'=> $shippingStatus,
              'status'=> $status,
              'Qty'=> $Qty,
              'totalAmount'=> $totalAmount,
              'medicineName'=> $medicineName,
          ];
          
          if (!in_array($row['id'],$_SESSION['salesOrderIds'])) {

              array_push($_SESSION['salesOrderIds'],$row['id']);
              array_push($_SESSION['salesOrder'],$medicineData);

          }else{
              foreach($_SESSION['salesOrder'] as $key => $medSession) {
                  if ($medSession['salesOrder'] == $row['id'] ) {
                      
                      //$newQuantity = $medSession['quantity'] - $quantity;

                      $medicineData = [
                          //'requestId'=> $row['requestId'],
                          'name'=> $row['name'],
                          'customer'=> $row['customer'],
                          'email'=> $row['email'],
                          'phone'=> $row['phone'],
                          'shippingStatus'=> $row['shippingStatus'],
                          'status'=> $row['status'],
                          'Qty'=> $row['Qty'],
                          'medicineName'=> $row['medicineName'], 
                      ];
                      $_SESSION['salesOrder'][$key] = $medicineData;
                  }
          }
      }
      redirect('../sales/salesOrder.php','Medicine Added Successfully' .$row['name']);

           }
    }else {
        redirect('../sales/salesOrder.php','No such medicine found!');
    }

  }else {
    redirect('../sales/salesOrder.php','Something went wrong!');
  }
}

if(isset($_POST['orderIncDec'])) {

  $orderId = validate($_POST['orderId']);
  $quantity = validate ($_POST['quantity']);
  

$flag = false;

  foreach($_SESSION['salesOrder'] as $key => $item) {
    if ($item['orderId'] == $orderId) {

      $flag = true;
      $_SESSION['salesOrder'][$key]['Qty'] = $quantity;
    }
}
if ($flag) {

  jsonResponse(200, 'success', 'Quantity Updated') ;

}else{

  jsonResponse(500, 'fail', 'Could not Update . Please Refresh') ;
}

}

if(isset($_POST['continueToOrderBtn'])) {

  $username = validate($_POST['username']);
  
  $checkMedicine = mysqli_query( $conn, "SELECT * FROM products ");
  if($checkMedicine){
      if(mysqli_num_rows($checkMedicine) > 0) {
        $_SESSION['orderNo'] = "O-".rand(1111,9999);
        
        
        jsonResponse(200, 'success', 'Medicine Found') ;
      }
      else{
        $_SESSION["username"] = "$username";
        jsonResponse(404, 'warning', 'Medicine  not found!') ;
      }
  }
  else{
    jsonResponse(500, 'error', 'Something went wrong') ;
  }
}


if(isset($_POST['saveSalesOrder'])) {

//$username = validate($_SESSION['username']);


  $checkOrders = mysqli_query( $conn, "SELECT * FROM products");
  if($checkOrders){

    //jsonResponse(500, "error", "Something went wrong") ;
  }
  if (mysqli_num_rows($checkOrders) > 0) {
    $sessionOrders = $_SESSION['salesOrder'];
    foreach($sessionOrders as $orderItem) {
      $quantity = $orderItem['Qty'];
    }

    $checkOrders = mysqli_fetch_assoc($checkOrders);
    //$totalPurchaseQuantity = $checkOrders['quantity'] - $quantity;

    if (!isset($_SESSION["salesOrder"])) {
      jsonResponse(404, "warning", "No items to place order") ;

      
    }
    $orderNo = "".rand(1111,9999);
    $salesOrder = $_SESSION['salesOrder'];
    foreach($salesOrder as $orderItem) {
      
      $quantity = $orderItem['Qty'];
      $cName = $orderItem['cName'];
      $status = $orderItem['status'];
      $price = $orderItem['price'];
    //$totalAmount = $orderItem['totalAmount'];
      $email = $orderItem['email'];
      $phone = $orderItem['phone'];
      $shippingStatus = $orderItem['shippingStatus'];
      $medicineName = $orderItem['medicineName'];
      $orderId = $orderItem['orderId'];
      
     	


      $data = [
        'orderId' => $orderItem['orderId'],
        'orderNo'=> $orderNo,
        'quanitity'=> $quantity,
        'customerName'=> $cName,
        'status'=> $status,
        'price'=> $price,
        //'totalAmount'=> $totalAmount,
        'email'=> $email,
        'phone'=> $phone,
        'shippingStatus'=> $shippingStatus,
        'medicineName'=> $medicineName,
 
     ];
 
     $result = insert('salesorders', $data);

      // Checkig for the medicine quantity nd decreasing quantity and making total quantity
     
      $checkProductQuantityQuery = mysqli_query($conn,"SELECT * FROM products WHERE id=$orderId");
      $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
      $totalProductQuantity = $productQtyData['quantity'] - $quantity;
      

      $dataUpdate = [
        'quantity'=> $totalProductQuantity
      ];

      // Update products
      $updateProductQty = update('products', $orderId, $dataUpdate);

    }
    
    unset($_SESSION['salesOrder']);
    unset($_SESSION['salesOrderIds']);
    unset($_SESSION['user']);
    unset($_SESSION['custDetails']);
    

    $response = [
      'status' => 200,
      'status_type'=> 'success',
      'message'=> 'Added',
    ];
    echo json_encode($response);
    return;
  }
  else{
    jsonResponse(404,'warning','No Medicine found');
  }
}
