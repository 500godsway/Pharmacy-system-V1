<?php

require '../config/function.php';

if (isset($_SESSION['productItem'])) {
    orderSession();
    redirect('index.php','Logged Out Successfully.');
}