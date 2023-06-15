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
        <h2>Make Request</h2>
        <div class="table-container">
            <form action="make_request.php" method="post">
                <table>
                    <tr>
                        <td>RS ID : </td>
                        <td><input type="text" name="req_id"></td>
                    </tr>

                    <tr>
                        <td>ECOO Number : </td>
                        <td><input type="text" name="ecoo_number"></td>
                    </tr>

                    <tr>
                        <td>Type : </td>
                        <td><select name="type">
                        <?php
                        $sql = "SELECT * FROM [awasdb].[dbo].[Stage_Type]";
                        
                        $stmt = sqlsrv_query($conn, $sql);
                        if ($stmt === false) {
                            die(print_r(sqlsrv_errors(), true));
                        }
                            
                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                
                        ?>
                            <option value="<?php echo $row['stage_type_id']?>"><?php echo $row['stage_type_name']?></option>
                        <?php } ?>
                            </select></td>
                    </tr>

                    <tr>
                        <td>Date : </td>
                        <td><input type="datetime-local" name="date"></td>
                    </tr>

                    <tr>
                        <td colspan=2><input type="submit" value="Submit" name="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>