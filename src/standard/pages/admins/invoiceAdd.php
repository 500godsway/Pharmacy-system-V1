<?php

  require"../../../config/function.php";

  if (!isset($_SESSION['productItem'])) {
    $_SESSION['productItem'] = [];
  }
  if (!isset($_SESSION['productItemIds'])) {
    $_SESSION['productItemIds'] = [];
  }

  if (isset($_POST["invoiceAdd"])) {

    $productId = validate($_POST["productId"]);
    $quantity = validate($_POST["quantity"]);
    $profit = validate($_POST["profit"]);
    

    $checkProduct = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId' LIMIT 1");
    if($checkProduct){

        if(mysqli_num_rows($checkProduct) > 0){
            $row = mysqli_fetch_array($checkProduct);
            if($row['quantity'] < $quantity) {
                redirect('../sales/posInvoice.php','CurrentStock:'.$row['quantity'].', Your Request Exceed Stock!');
            }

            $productData = [
                'productId'=> $row['id'],
                'name'=> $row['name'],
                'description'=> $row['description'],
                'image'=> $row['image'],
                'price'=> $row['sPrice'],
                'profit'=> $profit,
                'quantity'=> $quantity,
            ];
            if (!in_array($row['id'],$_SESSION['productItemIds'])) {

                array_push($_SESSION['productItemIds'],$row['id']);
                array_push($_SESSION['productItem'],$productData);

            }else{
                foreach($_SESSION['productItem'] as $key => $prodSessionItem) {
                    if ($prodSessionItem['productId'] == $row['id']) {
                        
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;

                        $productData = [
                            'productId'=> $row['productId'],
                            'name'=> $row['name'],
                            'description'=> $row['description'],
                            'image'=> $row['image'],
                            'price'=> $row['sPrice'],
                            'profit'=> $row['profit'],
                            'quantity'=> $newQuantity,
                        ];
                        $_SESSION['productItem'][$key] = $productData;
                    }
            }
        }
        redirect('../sales/posInvoice.php','Item Added Successfully' .$row['name']);
    }else {
        redirect('../sales/posInvoice.php','No such product found!');
    }

  }else {
    redirect('..sales/posInvoice.php','Something went wrong!');
  }
}

if(isset($_POST['productIncDec'])) {

    $productId = validate($_POST['productId']);
    $quantity = validate ($_POST['quantity']);
    

  $flag = false;

    foreach($_SESSION['productItem'] as $key => $item) {
      if ($item['productId'] == $productId) {

        $flag = true;
        $_SESSION['productItem'][$key]['quantity'] = $quantity;
      }
  }
  if ($flag) {

    jsonResponse(200, 'success', 'Quantity Updated') ;

  }else{

    jsonResponse(500, 'fail', 'Could not Update . Please Refresh') ;
  }

}


if(isset($_POST['proceedToPlaceBtn'])) {

  $cphone = validate($_POST['cphone']);
  $transactionCode = validate($_POST['transactionCode']);
  $pAmount = validate($_POST['pAmount']);
  $balance = validate($_POST['balance']);
  $payment_mode = validate($_POST['payment_mode']);
 
  // Checking for the customer

  $checkCustomer = mysqli_query( $conn, "SELECT * FROM customers WHERE phone ='$cphone' LIMIT 1 ");
  if($checkCustomer){
      if(mysqli_num_rows($checkCustomer) > 0) {
        $_SESSION['invoice_no'] = "INV-".rand(1111,9999);
        $_SESSION["cphone"] = $cphone;
        $_SESSION["transactionCode"] = $transactionCode;
        $_SESSION["pAmount"] = $pAmount;
        $_SESSION["balance"] = $balance;
        $_SESSION["payment_mode"] = $payment_mode;

        jsonResponse(200, 'success', 'Customer Found') ;
      }
      else{
        $_SESSION["cphone"] = "$cphone";
        jsonResponse(404, 'warning', 'Customer  not found!') ;
      }
  }
  else{
    jsonResponse(500, 'error', 'Something went wrong') ;
  }

}

if(isset($_POST['saveOrder'])) {

  $cphone = validate($_SESSION['cphone']);
  $payment_mode = validate($_SESSION['payment_mode']);
  $pAmount = validate($_SESSION['pAmount']);
  $transactionCode = validate($_SESSION['transactionCode']);
  $balance = validate($_SESSION['balance']);
  $invoice_no = validate($_SESSION['invoice_no']);
  $order_place_by_id = $_SESSION['loggedInUser']['id'];


  $checkCustomer = mysqli_query( $conn, "SELECT * FROM customers WHERE phone='$cphone' LIMIT 1");
  if($checkCustomer){

    //jsonResponse(500, "error", "Something went wrong") ;
  }
  if (mysqli_num_rows($checkCustomer) > 0) {
  
    $customerData = mysqli_fetch_assoc($checkCustomer);

    if (!isset($_SESSION["productItem"])) {
      jsonResponse(404, "warning", "No items to place order") ;

      
    }

    $sessionProducts = $_SESSION['productItem'];

      $totalAmount = 0;
      foreach($sessionProducts as $amtItem) {
        $totalAmount += $amtItem['price'] * $amtItem['quantity'];
      }

    $data = [
       'customer_id' => $customerData['id'],
       'tracking_no'=> "TrackNo-".rand(1111,9999),
       'invoice_no'=> $invoice_no,
       'pAmount'=> $pAmount,
       'transactionCode'=> $transactionCode,
       'balance'=> $balance,
       'total_amount'=> $totalAmount,
       'sales_data' => date('Y-m-d'),
       'payment_mode'=> $payment_mode,
       'order_placed_by_id'=> $order_place_by_id
    ];

    $result = insert('sales', $data);
    $lastOrderId = mysqli_insert_id($conn);

    foreach($sessionProducts as $prodItem) {
      
      $productId = $prodItem['productId'];
      $price = $prodItem['price'];
      $profit = $prodItem['profit'];
      $quantity = $prodItem['quantity'];
      
      // Inserting orders items
      $dataOrderItem = [

        'order_id'=> $lastOrderId,
        'product_id'=> $productId,
        'price'=> $price,
        'quantity'=> $quantity,
        'profit'=> $profit,

      ];

      $orderItemQuery = insert('medicine_sales', $dataOrderItem);

      // Checkig for the medicine quantity nd decreasing quantity and making total quantity
     
      $checkProductQuantityQuery = mysqli_query($conn,"SELECT * FROM products WHERE id=$productId");
      $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
      $totalProductQuantity = $productQtyData['quantity'] - $quantity;
      $productName = $productQtyData['name'];

      $dataUpdate = [
        'quantity'=> $totalProductQuantity
      ];

      $updateProductQty = update('products', $productId, $dataUpdate);

    }
    require"../../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Sold $productName for $price Invoice No $invoice_no" );
    //redirect('..sales/posInvoice.php','Something went wrong!');
    $_SESSION["print"] = $invoice_no;
    $_SESSION["customerData"] = $customerData['id'];

    unset($_SESSION['productsItemIds']);
    unset($_SESSION['productItem']);
    unset($_SESSION['cphone']);
    unset($_SESSION['payment_mode']);
    unset($_SESSION['invoice_no']);
    unset($_SESSION['pAmount']);
    unset($_SESSION['balance']);

    jsonResponse(200, 'success', 'Sales placed successfully');
    
  }
  else{
    jsonResponse(404,'warning','No customer found');
  }
}