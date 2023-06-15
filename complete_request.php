<?php
    require 'db_con.php';
    
    if(isset($_POST['submit'])){
        $procedureName = "{call completeRequestStage(?, ?)}";

        $req_id = $_POST['req_id'];
        $date = $_POST['date'];

        $mssqlDateTime = date('Y-m-d H:i:s', strtotime($date));
        $params = array(&$req_id, &$mssqlDateTime);
        
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