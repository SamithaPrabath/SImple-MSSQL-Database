<?php
    require 'db_con.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>AWAS System</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <?php require 'header.php'?>
        <h2>Mark Attendance</h2>
        <div class="table-container">
            <form action="mark_attendence.php" method="post">
                <table>
                    <tr>
                        <td>Attendance ID : </td>
                        <td><input type="text" name="attendance_id"></td>
                        </td>
                    </tr>

                    <tr>
                        <td>Officer Id : </td>
                        <td><select name="officer_id">
                        <?php
                        $sql = "SELECT * FROM [awasdb].[dbo].[officer]";
                        
                        $stmt = sqlsrv_query($conn, $sql);
                        if ($stmt === false) {
                            die(print_r(sqlsrv_errors(), true));
                        }

                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $row['officer_id']?>"><?php echo $row['officer_name']?></option>
                        <?php } ?>
                            </select>
                    </tr>

                    <tr>
                        <td>Date : </td>
                        <td><input type="datetime-local" name="date"></td>
                    </tr>

                    <tr>
                        <td colspan=2><input type="submit" value="Mark" name="mark"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>