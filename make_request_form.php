
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
                        <td>Request ID : </td>
                        <td><input type="text" name="req_id"></td>
                    </tr>

                    <tr>
                        <td>Exporter ID : </td>
                        <td><input type="text" name="exporter_id"></td>
                    </tr>

                    <tr>
                        <td>Description : </td>
                        <td><textarea name="description" id="" cols="30" rows="10"></textarea></td>
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