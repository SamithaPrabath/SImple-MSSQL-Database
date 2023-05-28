<?php
    require 'db_con.php';
   
    if(isset($_POST['mark'])){
        $procedureName = "{call markAttendance(?, ?, ?)}";

        $attendance_id = $_POST['attendance_id'];
        $officer_id = $_POST['officer_id'];
        $date = $_POST['date'];
        
        $mssqlDateTime = date('Y-m-d H:i:s', strtotime($date));
        
        $params = array(&$attendance_id, &$officer_id, &$mssqlDateTime);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);
        if ($stmt === false) {
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