<?php
// The config file is require for all the CRUD operations and DB connection-------------------------
include("../../config/function.php");

// Add  to Favorite Start---------------------------------------------------------------------------

if (isset($_POST['favorite'])) {

   // $favoriteItem = validate($_POST['favoriteItem']);
    $favoriteItem = isset($_POST["favoriteItem"]) == true ? 1:0;
    $productId = validate($_POST['productId']);
    
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Product id $productId");

    $data =[
        'favorite' => $favoriteItem,
    ];
    $result = update('products',$productId,$data);

    if($result) {
        redirect('../products/productOverview.php?id='.$productId, 'Product Edited Succesfully');
    }else {
        redirect('../products/productOverview.php?id='.$productId, 'Something went wrong');
    }
}

// Add  to Favorite Start End------------------------------------------------------------------------

// Create Users Start--------------------------------------------------------------------------------

if (isset($_POST["saveUser"])) {
    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $phone = validate($_POST["phone"]);
    $role = validate($_POST["role"]);
    $is_ban = isset($_POST["is_ban"]) == true ? 1:0;

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Saved the user  $name");

    if ($name != '' && $email != '' && $password != '') {

        $emailCheck = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") ;
        if($emailCheck) {
            if(mysqli_num_rows($emailCheck) > 0) {
              redirect('addUsers.php','Email already used by another user');  
            }
        }
        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
        $data = [
            'name' => $name,
            'email'=> $email,
            'password'=> $bcrypt_password,
            'phone'=> $phone,
            'role'=> $role,
            'is_ban'=> $is_ban, 
        ];
        $result = insert('users', $data);


        if($result) {
            redirect('users.php','User created successfully');
        }else {
            redirect('addUsers.php','Something went wrong!');
        }
    }else {
            redirect('addUsers.php','Please fill required fields');
    }
}

// Create Users End----------------------------------------------------------------------------------

// Update Users Start--------------------------------------------------------------------------------

if(isset($_POST['updateAdmin'])) {
    $userId = validate($_POST["userId"]);
    $userData = getById ('users', $userId);
    if($userData['status'] != 200) {
        redirect('userUpdate.php?id='.$userId,'Please fill required fields');
    }
    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $phone = validate($_POST["phone"]);
    $role = validate($_POST["role"]);
    $is_ban = isset($_POST["is_ban"]) == true ? 1:0;
// Track the activity (Update users)
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Updated the user $name");
// Check if the email exist
    $EmailCheckQuery = "SELECT * FROM users WHERE email = '$email' AND id!='$userId'";
    $checkResult = mysqli_query($conn, $EmailCheckQuery);
    if($checkResult){
            if(mysqli_num_rows($checkResult) > 0) {
                redirect('admins_edit.php?id='.$userId,'Email Already exist');
        }
    }
// Hash the password for extra security
    if($password != '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }else {
       $hashedPassword =$userData['data']['password'];
    }
     if ($name != '' && $email != '' ) {
           $data = [
            'name' => $name,
            'email'=> $email,
            'password'=> $hashedPassword,
            'phone'=> $phone,
            'role'=> $role,
            'is_ban'=> $is_ban, 
        ];
        $result = update('users',$userId, $data);

        if($result) {
            redirect('userUpdate.php?id='.$userId, 'User Updated successfully');
        }else {
            redirect('userUpdate.php?id='.$userId,'Something went wrong!');
        }
     }else {
        redirect('addUsers.php','Please fill required fields');
     }
}

// Update Users End----------------------------------------------------------------------------------

// Create Categories Start---------------------------------------------------------------------------

if (isset($_POST['saveCategory'])) {
   $name = validate($_POST['name']);
   $description = validate($_POST['description']);
   $status = isset($_POST['status'] ) == true ? 1:0;
// Track activity (Create Categories)
   require"../../config/log.php";
   $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Category $name");

   $data =[
    'categoryName'=> $name,
    'description'=> $description,
    'status'=> $status,
   ];
   $result = insert('categories',$data);
   if($result) {
    redirect('../categories/categories.php', 'Category added Successifully');
       }else {
         redirect('../categories/categories.php', 'Something Went wrong');
       }

}

// Create Categories  End-----------------------------------------------------------------------------

// Update Categories Start----------------------------------------------------------------------------

if (isset($_POST['updateCategory'])) {

    $categoryId = validate($_POST['categoryId']);
    $name = validate($_POST['name']);   
    $description = validate($_POST['description']);
    $status = isset($_POST['status'] ) == true ?1:0;
// Track activity (Update Categories)
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Product $name");

    $data =[
        'status' => $status,
        'description' => $description,
        'categoryName'=> $name
    ];
    $result = update('categories',$categoryId,$data);

    if($result) {
        redirect('../categories/category_edit.php?id='.$categoryId, 'Category Edited Succesfully');
    }else {
        redirect('../categories/category_edit.php?id='.$categoryId, 'Something went wrong');
    }
}

// Update Categories End------------------------------------------------------------------------------

//Create Suppliers start------------------------------------------------------------------------------

if (isset($_POST['saveSupplier'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $is_ban = isset($_POST['is_ban'] ) == true ? 1:0;
// Track activity (Create Suppliers)-------------------------------------------------
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Product $name");

    $data =[
     'name'=> $name,
     'phone'=> $phone,
     'email'=> $email,
     'is_ban'=> $is_ban,
    ];
    $result = insert('suppliers',$data);
    if($result) {
     redirect('../suppliers/suppliers.php', 'Supplier added Successifully');
        }else {
          redirect('../suppliers/suppliers.php', 'Something Went wrong');
        }
 
 }

// Create Suppliers End ------------------------------------------------------------------------------

// Update Suppliers Start-----------------------------------------------------------------------------

if (isset($_POST['updateSupplier'])) {

    $supplierId = validate($_POST['supplierId']);
    $name = validate($_POST['name']);   
    $email = validate($_POST['email']);   
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban'] ) == true ? 1:0;
// Track activity (Create Suppliers)------------------
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Product $name");

    $data =[
        'phone' => $phone,
        'is_ban' => $is_ban,
        'email' => $email,
        'name'=> $name,
    ];
    $result = update('suppliers',$supplierId,$data);

    if($result) {
        redirect('../suppliers/supplierEdit.php?id='.$supplierId, 'Suppliers Edited Succesfully');
    }else {
        redirect('../suppliers/supplierEdit.php?id='.$supplierId, 'Something went wrong');
    }
}

// Update Suppliers End-------------------------------------------------------------------------------

// Create Product Start-------------------------------------------------------------------------------

if (isset($_POST['saveProduct'])) {

    $categoryId = validate($_POST['categoryId']);
    $supplierId = validate($_POST['supplierId']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
// Track activity (Create product) ----------------
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Product $name");

    $expiryDate = validate($_POST['expiryDate']);

    $is_ban = isset($_POST['is_ban'] ) == true ? 1:0;
 
    if($_FILES['image']['size'] > 0) {
        $path = "../images/uploads";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().".".$image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "images/uploads/".$filename;

    }else {
        $finalImage = '';
    }

    $data =[
     'categoryId'=> $categoryId,
     'supplierId'=> $supplierId,
     'name'=> $name,
     'description'=> $description,
     'image'=> $finalImage,
     'is_ban'=> $is_ban
    ];
    $result = insert('products',$data);
    if($result) {
     redirect('../products/addproducts.php', 'Product added Successifully');
    
        }else {
          redirect('../products/addproducts.php', 'Something Went wrong');
        }
}

// Create Product End---------------------------------------------------------------------------------

// Update Products Start------------------------------------------------------------------------------

if(isset($_POST['updateProduct'])) {

    $name = validate($_POST['name']);

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Product $name");

    $id = validate($_POST['product_id']);

    $productData = getById('products',$id);
        if(!$productData) {
            redirect('../products.php?id='.$id, 'No such product found');
        }

    $categoryId = validate($_POST['categoryId']);
    $supplierId = validate($_POST['supplierId']);

    $description = validate($_POST['description']);

    $sprice = validate($_POST['sPrice']);
    $bprice = validate($_POST['bPrice']);
    $quantity = validate($_POST['quantity']);

    $expiryDate = validate($_POST['expiryDate']);

    $is_ban = isset($_POST['is_ban'] ) == true ? 1:0;
 
    if($_FILES['image']['size'] > 0) {
        $path = "../images/uploads";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().".".$image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "images/uploads/".$filename;

        $deleteImage = "../".$productData['data']['image'];
        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

    }else {
        $finalImage = $productData['data']['image'];
    }

    $data =[
     'categoryId'=> $categoryId,
     'id'=> $id,
     'supplierId'=> $supplierId,
     'name'=> $name,
     'description'=> $description,
     'sprice'=> $sprice,
     'bprice'=> $bprice,
     'image'=> $finalImage,
     'expiryDate'=> $expiryDate,
     'is_ban'=> $is_ban
    ];
    $result = update('products',$id, $data);
    if($result) {
     redirect('../products/product_edit.php?id='.$id, 'Product updated Successifully');
        }else {
          redirect('../products/product_edit.php?id='.$id, 'Something Went wrong');
        }
}

// Update Products End--------------------------------------------------------------------------------
//Archive Expenses start -----------------------------------------------------------------------------
if (isset($_POST['archived'])) {

    $medId = validate($_POST['medId']);
    $archived = validate($_POST['archive']);
    $name = validate($_POST['name']);
    
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Archived $name");

    $data =[
    'archived'=> $archived,
    ];
    $result = updateArchive('expenses',$medId,$data);

    if($result) {
        redirect('../expenses/expired.php?meId='.$medId, 'Archived Succesfully');
    }else {
        redirect('../expenses/expired.php?meId='.$medId, 'Something went wrong');
    }
}
//Archive Expenses End--------------------------------------------------------------------------------

//Update pharmacy information--------------------------------------------------------------------------------

if (isset($_POST['BsUpdate'])) {

    $id = validate($_POST['pharmId']);
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $Currency = validate($_POST['Currency']);
    $email = validate($_POST['email']);
    $location = validate($_POST['location']);
    $capital = validate($_POST['capital']);

// Tract activity (Business Information) ---------
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Business information $name");

// Check if the details already exist ------------
     $Qty = mysqli_query($conn, "SELECT * FROM pharprofile ");
     if(mysqli_num_rows($Qty) > 1){
         $row = mysqli_fetch_array($Qty);
         redirect('../profiles/profileSettings.php', 'You can only have one set of Pharmacy information. Ops');
     }else{
        if($_FILES['image']['size'] > 0) {
            $path = "../images/uploads";
            $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
            $filename = time().".".$image_ext;
    
            move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);
    
            $finalImage = "images/uploads/".$filename;
    
            $deleteImage = "../".$productData['data']['image'];
            if(file_exists($deleteImage)) {
                unlink($deleteImage);
            }
    
        }else {
            $finalImage = $productData['data']['image'];
        }

    $data =[
     'id'=> $id,
     'name'=> $name,
     'Currency'=> $Currency,
     'email'=> $email,
     'phone'=> $phone,
     'location'=> $location,
     'initialCapital'=> $capital,
     'image'=> $finalImage,
    ];
    $result = update('pharprofile',$id, $data);
    if($result) {
     redirect('../profiles/profileSettings.php', 'Info updated Successifully');
        }else {
          redirect('../profiles/profileSettings.php', 'Something Went wrong');
        }
}
}

// Create Business Information Start------------------------------------------------------------------

if(isset($_POST['selfUserUpdate'])) {
 
    $id = validate($_POST['id']);

    $productData = getById('admins',$id);
        if(!$productData) {
            redirect('../profile/profileSettings.php?id='.$id, 'No such user found');
        }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $password = validate($_POST['password']);

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Updated profile $name");

    if($_FILES['image']['size'] > 0) {
        $path = "../images/uploads";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().".".$image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "images/uploads/".$filename;

        $deleteImage = "../".$productData['data']['image'];
        if(file_exists($deleteImage)) {
            unlink($deleteImage);
        }

    }else {
        $finalImage = $productData['data']['image'];
    }
    $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
    $data =[
     'name'=> $name,
     'phone'=> $phone,
     'email'=> $email,
     'password'=> $bcrypt_password,
     'image'=> $finalImage,
     
    ];
    $result = update('admins',$id, $data);
    if($result) {
     redirect('../profiles/profileSettings.php?id='.$id, 'User updated Successifully');
        }else {
          redirect('../profiles/profileSettings.php?id='.$id, 'Something Went wrong');
        }
}
// Create Business Information End--------------------------------------------------------------------

// Create  Customers Start ---------------------------------------------------------------------------

if(isset($_POST['saveCustomer'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $dob = validate($_POST['dob']);
    $phone = validate($_POST['phone']);
    $phone2 = validate($_POST['phone2']);
   
  

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Customer $name");

   $data =[
    'customerName'=> $name,
    'email'=> $email,
    'dob'=> $dob,
    'phone'=> $phone,
    'phone2'=> $phone2,
   
   ];
   $result = insert('customers',$data);
   if($result) {
    redirect('../customers/customers.php', 'Customer added Successifully');
       }else {
         redirect('../customers/customers.php', 'Something Went wrong');
       }
}
// Create Customers End-------------------------------------------------------------------------------

// Update Customers Start-----------------------------------------------------------------------------

if(isset($_POST['updateCustomer'])) {

    $name = validate($_POST['name']);
    $customerId = validate($_POST['customerId']);
    $email = validate($_POST['email']);
    $dob = validate($_POST['dob']);
    $phone = validate($_POST['phone']);
    $phone2 = validate($_POST['phone2']);
    
  
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Update Customer $name");

   $data =[
    'customerName'=> $name,
    'email'=> $email,
    'dob'=> $dob,
    'phone'=> $phone,
    'phone2'=> $phone2,
   ];
   $result = update('customers',$customerId,$data);
   if($result) {
    redirect('../customers/customers.php', 'Customer updated Successifully');
       }else {
         redirect('../customers/customers.php', 'Something Went wrong');
       }

}

// Update Customers End------------------------------------------------------------------------------

// Create Purchases Start----------------------------------------------------------------------------

if(isset($_POST['savePurchases'])) {

    $name = validate($_POST['name']);
    $category = validate($_POST['category']);
    $quantity = validate($_POST['quantity']);
    $supplier = validate($_POST['supplier']);
    $buyingPrice = validate($_POST['buyingPrice']);
    $sellingPrice = validate($_POST['sellingPrice']);
    $expiryDate = validate($_POST['expiryDate']);
    $profit = validate($_POST['profit']);

    $amount = $buyingPrice * $quantity;


    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added a Purchase of $name");
    // Get Account Balance
    $accountBalance = mysqli_query($conn, "SELECT * FROM pharprofile ");
        if($accountBalance){

            if(mysqli_num_rows($accountBalance) > 0){
                $row = mysqli_fetch_array($accountBalance);
                $accountBalance = $row['initialCapital'];
            }
        }
        if($buyingPrice > $accountBalance  ) {
            redirect('../purchases/addPurchases.php', 'Insuffient Funds');
    }else{
        // Get medicine ID
    $medicineId = mysqli_query($conn, "SELECT * FROM products WHERE name='$name' LIMIT 1");
    if($medicineId){

        if(mysqli_num_rows($medicineId) > 0){
            $row = mysqli_fetch_array($medicineId);
            $mId = $row['id'];

            $dataUpdate = [
                'sPrice'=> $sellingPrice,
                'bPrice'=> $buyingPrice,
                'profit'=> $profit,
                'expiryDate'=> $expiryDate,
                //'sPrice'=> $sellingPrice,
              ];
              $updateProductQty = update('products', $mId, $dataUpdate);
        }
            }
        $data =[
        'name'=> $name,
        'mId'=> $mId,
        'purchaseNo'=> "".rand(1111,9999),
        'category'=> $category,
        'quantity'=> $quantity,
        'supplier'=> $supplier,
        'buyingPrice'=> $buyingPrice,
        'sellingPrice'=> $sellingPrice,
        'expiryDate'=> $expiryDate,
        'profit'=> $profit,
        'amount'=> $amount,
        ];
        // Check  if the medicine already exist in the purchases list
        $medicineId = mysqli_query($conn, "SELECT * FROM purchases WHERE name='$name' LIMIT 1");
            // If it exist update else add it.
        if(mysqli_num_rows($medicineId) > 0){
            $row = mysqli_fetch_array($medicineId);
            $mId = $row['id'];
            $existingQuanitity = $row['quantity'];
            $newQuantity = $existingQuanitity + $quantity;

            $medicineData =[
                'quantity'=> $newQuantity,
                'buyingPrice'=> $buyingPrice,
                'sellingPrice'=> $sellingPrice,
            ];
            $result = update('purchases',$mId, $medicineData);
        }else{
            $result = insert('purchases',$data);
        }
        if($result) {
        redirect('../purchases/purchases.php', 'Purchase added Successifully');
        }else {
            redirect('../purchases/purchases.php', 'Something Went wrong');
        }
            }
        }

// Create Purchases End------------------------------------------------------------------------------

// Update Purchases Start----------------------------------------------------------------------------

    if (isset($_POST['updatePurchases'])) {

    $name = validate($_POST['name']);
    $mId = validate($_POST['mId']);
    $category = validate($_POST['category']);
    $purchaseId = validate($_POST['purchaseId']);
    $quantity = validate($_POST['quantity']);
    $supplier = validate($_POST['supplier']);
    $buyingPrice = validate($_POST['buyingPrice']);
    $sellingPrice = validate($_POST['sellingPrice']);
    $profit = validate($_POST['profit']);
    $expiryDate = validate($_POST['expiryDate']);
    $DOP = validate($_POST['DOP']);

    echo $supplier;

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Purchases $name");
    
    $data =[
    'name'=> $name,
    'category'=> $category,
    'quantity'=> $quantity,
    'supplier'=> $supplier,
    'buyingPrice'=> $buyingPrice,
    'sellingPrice'=> $sellingPrice,
    'profit'=> $profit,
    'expiryDate'=> $expiryDate,
    'DOP'=> $DOP,
    ];
    $result = update('purchases',$purchaseId,$data);

    $productData =[
    //'quantity'=> $quantity,
    'bPrice'=> $buyingPrice,
    'sPrice'=> $sellingPrice,
    'profit'=> $profit,
    ];

    $productResult = update('products',$mId,$productData);

    if($result) {
        redirect('../purchases/purchaseEdit.php?id='.$purchaseId, 'Purchases Edited Succesfully');
    }else {
        redirect('../purchases/purchaseEdit.php?id='.$purchaseId, 'Something went wrong');
    }
}

// Update Purchases End-----------------------------------------------------------------------------

// Create Qunitities Start--------------------------------------------------------------------------

if(isset($_POST['saveQunitities'])) {

    $id = validate($_POST['id']);
    $pharBal = validate($_POST['pharBal']);
    $totalSales = validate($_POST['totalSales']);
    $totalTSales = validate($_POST['totalTSales']);
    $purchases = validate($_POST['purchases']);
    $salesOrders = validate($_POST['salesOrders']);
    $invoices = validate($_POST['invoices']);
    $wastage = validate($_POST['wastage']);
    $expired = validate($_POST['expired']);
    $profit = validate($_POST['profit']);

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Updated Minimum Quantities $name");

    // Get Account Balance
    $Qty = mysqli_query($conn, "SELECT * FROM minquantities ");
        if(mysqli_num_rows($Qty) > 1){
            $row = mysqli_fetch_array($Qty);
            redirect('../profiles/profileSettings.php', 'Looks like that is already set. Ops');
        }else{
    
        $data =[
        'id'=> $id,
        'pharBalance'=> $pharBal,
        'totalSales'=> $totalSales,
        'purchases'=> $purchases,
        'todayTSales	'=> $totalTSales,
        'salesOrders'=> $salesOrders,
        'invoiceDue'=> $invoices,
        'wastage'=> $wastage,
        'expired'=> $expired,
        'profit'=> $profit,
        ];
        $result = update('minquantities',$id,$data);
        if($result) {
        redirect('../profiles/profileSettings.php', 'Qty added Successifully');
        }else {
            redirect('../profiles/profileSettings.php', 'Something Went wrong');
        }
            
        }
    }

// Create Qunitities End---------------------------------------------------------------------------

// Create Units Start------------------------------------------------------------------------------

if(isset($_POST['saveUnit'])) {

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status'] ) == true ? 1:0;

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Added Unit $name");

   $data =[
    'name'=> $name,
    'description'=> $description,
    'status'=> $status,
   ];
   $result = insert('units',$data);
   if($result) {
    redirect('../medicineSize/medicineSizeAdd.php', 'Medecine Size added Successifully');
       }else {
         redirect('../medicineSize/medicineSizeAdd.php', 'Something Went wrong');
       }
}
// Create Units End--------------------------------------------------------------------------------

// Update Units Start------------------------------------------------------------------------------

if (isset($_POST['updateUnit'])) {

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status'] ) == true ? 1:0;
    $unitId = validate($_POST['unitId']);
   
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Unit $name");

    $data =[
    'name'=> $name,
    'description'=> $description,
    'status'=> $status,
    
    ];
    $result = update('units',$unitId,$data);

    if($result) {
        redirect('../medicineSize/unitsEdit.php?id='.$unitId, 'Unit Edited Succesfully');
    }else {
        redirect('../medicineSize/unitsEdit.php?id='.$unitId, 'Something went wrong');
    }
}

// Update Units End--------------------------------------------------------------------------------

// Update OrderSales Start-------------------------------------------------------------------------

if (isset($_POST['updateOrderSales'])) {

    $orderNo = validate($_POST['orderNo']);
    $shippingStatus = validate($_POST['shippingStatus']);
    $paymentStatus = validate($_POST['paymentStatus']);
    $paid = validate($_POST['paid']);
    
    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Edited Sales Orders $name");

    $data =[
    'shippingStatus'=> $shippingStatus,
    'status'=> $paymentStatus,
    'totalAmount'=> $paid,
   
    ];
    $result = report('salesorders',$orderNo,$data);

    if($result) {
        redirect('../sales/salesOrdersList.php?id='.$orderNo, 'Order updated Succesfully');
    }else {
        redirect('../sales/salesOrdersList.php?id='.$orderNo, 'Something went wrong');
    }
}

// Update OrderSales End---------------------------------------------------------------------------

// Pay Invoices Start------------------------------------------------------------------------------

if (isset($_POST['payInvoice'])) {

    $sId = validate($_POST['sId']);
    $balance = validate($_POST['balance']);
    $trackingNo = validate($_POST['trackingNo']);
    $prvPaid = validate($_POST['prvPaid']);
    $currentAmount = validate($_POST['pAmount']);
    $newBalance = $balance - $currentAmount;
    $newlyPaid = $prvPaid + $currentAmount;

    require"../../config/log.php";
    $activityLog->setAction($_SESSION['loggedInUser']['id'], "Received of $currentAmount for the  invoice $trackingNo");

    $data =[
    'sId'=> $sId,
    'balance'=> $newBalance,
    'pAmount'=> $newlyPaid,
    ];
    $result = pay('sales',$sId,$data);

    if($result) {
        redirect('../sales/sales.php?id='.$trackingNo, 'Paid Succesfully');
    }else {
        redirect('../sales/sales.php?id='.$trackingNo, 'Something went wrong');
    }
}

// Pay Invoices End--------------------------------------------------------------------------------