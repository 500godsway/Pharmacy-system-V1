<?php



function get( $tableName ) {
    
    
    global $rows_per_page;
    global $conn;

    $table = validate($tableName);
    $query = "SELECT * FROM $table ";
    
    
    $query = get ('products');

    $nr_of_rows = $query->num_rows;
    // calculating the nr of pages
   
    if(isset($_GET['page-nr'])){
        
        
         $_GET['page-nr'] -1;
         $pages = ceil($nr_of_rows / $rows_per_page);
         $start = $pages * $rows_per_page;
         
       }
       
   
   
}