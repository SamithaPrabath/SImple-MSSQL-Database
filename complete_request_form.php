
<!DOCTYPE HTML>
<html>
    <head>
        <title>AWAS System</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <?php require 'header.php'?>
        <h2>Complete Request</h2>
        <div class="table-container">
            
            <form action="complete_request.php" method="post">
                <table>
                    <tr>
                        <td>Request ID : </td>
                        <td><input type="text" name="req_id"></td>
                    </tr>

                    <tr>
                        <td>Date : </td>
                        <td><input type="datetime-local" name="date"></td>
                    </tr>

                    <tr>
                        <td colspan=2><input type="submit" value="Compute Request" name="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>