<?php
    require 'db_con.php';
    echo $_POST['submit'];
    if(isset($_POST['sign_off'])){
        $procedureName = "{call signOffAttendance(?, ?)}";

        $attendance_id = $_POST['attendance_id'];
        $date = $_POST['date'];

        $mssqlDateTime = date('Y-m-d H:i:s', strtotime($date));

        $params = array(&$attendance_id, &$mssqlDateTime);
        
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