<?php
 require"../../../config/function.php";
if(isset($_POST['adjustStock'])) {
    //echo "I was clicked";
    
    $medId = $_POST['medId'];
    //$name = $_POST['name'];
    $expenseType = $_POST['expenseType'];
    $expenseDate = $_POST['expenseDate'];
    $adjQty = $_POST['adjQty'];
    $categoryName = $_POST['categoryName'];
    $price = $_POST['price'];
    $note = $_POST['note'];
    $adjNo = "".rand(1111,9999);
    $order_place_by_id = $_SESSION['loggedInUser']['id'];
    $amount = $adjQty * $price;

   // echo $medId;
      $data = [
         
         'medId'=> $medId,
         'expenseDate'=> $expenseDate,
         'expenseType'=> $expenseType,
         'category'=> $categoryName,
         'note'=> $note,
         'price'=> $price,
         'Qty'=> $adjQty,
         'amount'=> $amount,
         'adjNo'=> $adjNo,
         'user_placed_by_id'=> $order_place_by_id
      ];
  
       // Inserting Expenses items
      $result = insert('expenses', $data);
    
        // Checkig for the medicine quantity nd decreasing quantity and making total quantity
       
        $checkProductQuantityQuery = mysqli_query($conn,"SELECT * FROM products WHERE id = $medId" );
        $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
        $totalProductQuantity = $productQtyData['quantity'] - $adjQty;
  
        $dataUpdate = [
          'quantity'=> $totalProductQuantity
        ];
  
        $updateProductQty = update('products', $medId, $dataUpdate);
        if ($updateProductQty = TRUE) {
            header("Location:../stock.php");
        }
    }
    
