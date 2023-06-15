<?php
    require 'db_con.php';
    
    if(isset($_POST['submit'])){
        $procedureName = "{call sendRequestStage(?, ?, ?,?)}";

        $req_id = $_POST['req_id'];
        $ecoo_number = $_POST['ecoo_number'];
        $type = $_POST['type'];
        $date = $_POST['date'];

        $mssqlDateTime = date('Y-m-d H:i:s', strtotime($date));
        echo $mssqlDateTime;
        $params = array(&$req_id, &$ecoo_number, &$mssqlDateTime ,&$type);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "There was an error please try again!!!!";
        }
        else{
            header('Location: index.php');
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
        }
        
    }
    else{
        echo "not ok";
    }
?>