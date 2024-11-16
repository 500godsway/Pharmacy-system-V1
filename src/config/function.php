<?php
session_start();

// Input field validatation


    require 'dbcon.php';
    function validate($inputData){
    
    global $conn;
    $validateData = mysqli_real_escape_string($conn, $inputData);
    return trim($validateData);

}

// Redirect from 1 page to another page with the message (status)

function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('Location:'.$url);
    exit();
}

//Display messages or status after any process

function alertMessage(){
    if(isset($_SESSION['status'])){
      echo '<div class="p-4 mb-4 text-sm text-white rounded-lg bg-green-500 dark:text-green-800" role="alert">
       <span class="font-medium">Alert!</span> 
      '.$_SESSION['status'].'    
        </div>';
        unset($_SESSION['status']);
    }
}

 // Insert record using this function
    function insert($tableName, $data)
    {
        global $conn;

    $table = validate($tableName);

    
    $columns = array_keys($data);
    $values = array_values($data);

    $finalColumn = implode(', ', $columns);
    $finalValues = "'".implode("', '", $values)."'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn, $query);
    return $result;

}
//Archive
function updateArchive($tableName, $medId, $data) {

    global $conn;
    $table = validate($tableName);
    $medId = validate($medId);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE medId = '$medId'";
    $result = mysqli_query($conn, $query);
    return $result;
}
// Update record using this function

function update($tableName, $id, $data) {

    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}
 // Invoice pay
function pay($tableName, $sId, $data) {

    global $conn;
    $table = validate($tableName);
    $sId = validate($sId);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE sId = '$sId'";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Custome Update record using this function

function amend($tableName, $mId, $data) {

    global $conn;
    $table = validate($tableName);
    $mId = validate($mId);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE mId = '$mId'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function report($tableName, $orderNo, $data) {

    global $conn;
    $table = validate($tableName);
    $mId = validate($orderNo);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE orderNo = '$orderNo'";
    $result = mysqli_query($conn, $query);
    return $result;
}
$rows_per_page = 100;
$start=0;
function getAll( $tableName , $status = NULL) {

    $start=0;
    global $conn;
    //global $start;
    global $page;
    global $rows_per_page;
   
    // Get the page no.
    if(isset($_GET['page-nr'])){
        $page = $_GET['page-nr']-1;
        $start = $page * $rows_per_page;
      }

    $table = validate($tableName);
    $status = validate($status);
    //$start = $page * $rows_per_page;
  
    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status = '0' ";
    }else{
        $query = "SELECT * FROM $table LIMIT $start, $rows_per_page";
    }
    return mysqli_query($conn, $query); 


}
function fetchAll( $tableName , $status = NULL) {

    $start=0;
    global $conn;
    //global $start;
    global $page;
    global $rows_per_page;
   
    // Get the page no.
    if(isset($_GET['page-nr'])){
        $page = $_GET['page-nr']-1;
        $start = $page * $rows_per_page;
      }
    $table = validate($tableName);
    $status = validate($status);
    //$start = $page * $rows_per_page;
  
    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status = '0'";
    }else{
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn, $query); 
}

function getbyId($tableName, $id){

    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM  $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if($result->num_rows == 1){
            
            $row =mysqli_fetch_assoc($result);  
            $response = [
                'status' => 200,
                'data'=> $row,
                'message' => 'Data found'
            ];
            return $response;
    }else {
        $response = [
            'status' => 404,
                'message' => 'No data found'
        ];
    }
    

}
}

// Delete data from databae using id

function delete($tableName, $id) {

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}

    function checkParamId($type){

        if (isset($_GET[$type])) {
            if($_GET[$type] != '') {

                return $_GET[$type];
            }else {
                return 'No Id Found';
            }
        }else {
            return 'No Id Given';
        }
    }


    function logoutSession(){
        unset($_SESSION['logged']);
        unset($_SESSION['loggedUser']);
    }

    function jsonResponse($status, $status_type, $message) {

        $response = [
            'status' => $status,
            'status_type'=> $status_type,
            'message'=> $message,
          ];
          echo json_encode($response);
          return;
    }

    function getCount($tableName) {
        global $conn;

        $table = validate($tableName);

        $query = "SELECT * FROM $table";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
           $totalCount = mysqli_num_rows($query_run);
           return $totalCount;
        
        }else {
            return"Something Went Wrong!";
        }
    }
    function getCountCriteria($tableName) {
        global $conn;

        $table = validate($tableName);

        $query = "SELECT * FROM $table WHERE expenseType = 'Damaged'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
           $totalCount = mysqli_num_rows($query_run);
           return $totalCount;
        
        }else {
            return"Something Went Wrong!";
        }
    }

    // Count by Creteria
    function CountDam($tableName) {
        global $conn;

        $table = validate($tableName);

        $query = "SELECT * FROM $table WHERE expenseType = 'Damaged' ";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
           $totalCount = mysqli_num_rows($query_run);
           return $totalCount;
        
        }else {
            return"Something Went Wrong!";
        }
    }

    // Count by Creteria
    function CountExp($tableName) {
        global $conn;

        $table = validate($tableName);

        $query = "SELECT * FROM $table WHERE expenseType = 'Expired Medicine' ";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
           $totalCount = mysqli_num_rows($query_run);
           return $totalCount;
        
        }else {
            return"Something Went Wrong!";
        }
    }


 
    if(session_status() === PHP_SESSION_NONE)
        session_start();
    
    /** 
     * Class Required Parameters
     * @param str DB Host Name
     * @param str DB User Name
     * @param str DB Password
     * @param str DB Name
     * @param str DB Prefix;
    */
    class ActivityLog{
    
        // DB Connection
        private $db;    
        // Log Table Name
        private $dbTbl = "site_activity_log_automation_tbl";
        // DB Prefix
        private $db_prefix;
    
        function __construct($dbhost="", $dbuser = "", $dbpassword = "", $dbname = "", $db_prefix =""){
            // Check if DB credentials is empty
            if(empty($dbhost) || empty($dbuser) || empty($dbname)){
                throw new ErrorException("Database Credentials cannot be empty!");
                exit;
            }
            // SEt DB Prefix to log db table
            $this->db_prefix = $db_prefix;
            if(!empty($this->db_prefix)){
                $this->db_prefix .= "_";
            }
            $this->dbTbl = $this->db_prefix . $this->dbTbl;
    
            // Connect to the database
            try{
                $this->db = new MySQLi($dbhost, $dbuser, $dbpassword, $dbname);
            }catch(Exception $e){
                throw new ErrorException($e->getMessage());
                exit;
            }
    
            // Check if Log Table already exists, otherwise, create table
            try{
                $tbl_described =  $this->db->query("DESCRIBE `{$this->db_prefix}`");
            }catch(Exception $e){
                $this->create_tbl();
            }
            
        }
    
        /**
         * Log Table Creation
         */
        function create_tbl(){
            $sql = "CREATE TABLE IF NOT EXISTS `{$this->dbTbl}`
                (
                    `id` bigint(30) PRIMARY KEY AUTO_INCREMENT,
                    `user_id` bigint(30) NOT NULL,        
                    `ip` varchar(25) NOT NULL,        
                    `url` text NOT NULL,        
                    `action` text NOT NULL,        
                    `created_at` datetime NOT NULL DEFAULT current_timestamp()        
                )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
            ";
            try{
                $table_create = $this->db->query($sql);
            }catch(Exception $e){
                throw new ErrorException($e->getMessage());
                exit;
            }
        }
    
        /**
         * Sanitize values
         * @param mixed any
         */
        function sanitize_value($value){
            if(!is_numeric($value) && empty($value)){
                if( is_object($value) && is_array($value) ){
                    $value = json_encode($value);
                }else{
                    $value = addslashes(htmlspecialchars($value));
                }
            }
            return $value;
        }
    
        /**
         * Insert Activity Log
         * @param array [user_id, ip, url, action] 
         *  
         */
        public function log( $data = [] ){
            if(empty($data)){
                throw new ErrorException("Log data are required!");
                exit;
            }
    
            
            $params_values = [];
            $params_format = [];
            $query_values  = [];
    
            foreach($data as $k => $v){
                $v = $this->sanitize_value($v);
                if(!empty($v)){
                    if(is_numeric($v)){
                        $fmt = "d";
                    }else{
                        $fmt = "s";
                    }
                    $query_values[] = "`{$k}`";
                    $params_values[] = $v;
                    $params_format[] = $fmt;
                }
            }
    
            if(empty($query_values)){
                throw new ErrorException("All Log data provided are empty or invalid!");
                exit;
            }
    
            $sql = "INSERT INTO `{$this->dbTbl}` (".implode(",", $query_values).") VALUES (".( implode( ",", str_split( str_repeat( "?", count( $query_values ) ) ) ) ).")";
    
            $stmt = $this->db->prepare($sql);
    
            $fmts = implode("", $params_format);
    
            $stmt->bind_param($fmts, ...$params_values);
    
            $executed = $stmt->execute();
    
            if($executed){
    
               $resp = [
                    "status" => "success"
               ];
    
            }else{
    
                $resp = [
                    "status" => "error",
                    "sql" => $sql,
                    "queries" => $query_values,
                    "formats" => $fmts,
                    "values" => $params_values,
               ];
    
            }
            return $resp;
        }
    
        /**
         * Log Data 
         * @param $user_id mixed|int User ID
         * @param $action  str       Action Data
         */
        
        public function setAction($id= "", $action = ""){
            $data = [];
    
            extract($_SERVER);
            $data['ip'] = $REMOTE_ADDR;
            $data['url'] = (empty($HTTPS) ? 'http' : 'https') . "://{$HTTP_HOST}{$REQUEST_URI}";
            $data["user_id"] = $id;
            $data["action"] = addslashes(htmlspecialchars($action));
    
            return $this->log($data);
        }
    
        /**
         * Get All Logs
         */
        public function getLogs(){
    
            $query = $this->db->query("SELECT * FROM `{$this->dbTbl}` order by `id` desc");
            $result = $query->fetch_all(MYSQLI_ASSOC);
    
            return $result;
        }
    
        function __destruct()
        {
            if($this->db){
                $this->db->close();
            }
        }
    }