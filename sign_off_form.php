
<!DOCTYPE HTML>
<html>
    <head>
        <title>AWAS System</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <?php require 'header.php'?>
        <h2>Sign-off Attendance</h2>
        <div class="table-container">
            <form action="sign_off.php" method="post">
                <table>
                    <tr>
                        <td>Attendance ID : </td>
                        <td><input type="text" name="attendance_id"></td>
                    </tr>

                    <tr>
                        <td>Date : </td>
                        <td><input type="datetime-local" name="date"></td>
                    </tr>

                    <tr>
                        <td colspan=2><input type="submit" value="Sign Off" name="sign_off"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>