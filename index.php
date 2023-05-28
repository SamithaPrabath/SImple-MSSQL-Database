<?php
    require 'db_con.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- Your HTML content goes here -->
</head>
<body>
  <?php require 'header.php'?>
<div class="container main">
  <div class="row">
    <div class="col-sm">
      <h2>Available Request</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Description</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $viewName = "Incomplete_Exporter_Requests";
            $sql = "SELECT * FROM $viewName";
            
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row['Exporter_Request_ID']; ?></th>
            <td><?php echo $row['Exporter_Request_Desc']; ?></td>
            <td><?php echo $row['Exporter_Name']; ?></td>
          </tr>
          <?php
            }
            sqlsrv_free_stmt($stmt);
          ?>
        </tbody>
      </table>
      <a href="make_request_form.php"><button type="button" class="btn btn-success">Add Request</button></a>
      <a href="complete_request_form.php"><button type="button" class="btn btn-warning">Complete Request</button></a>
    </div>

    <div class="col-sm">
      <h2>Task Allocation</h2>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Description</th>
            <th scope="col">Name</th>
            <th scope="col">Attendence ID</th>
            <th scope="col">Officer Name</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $viewName = "Display_Assigned_Tasks";
            $sql = "SELECT * FROM $viewName";
            
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row['Exporter_Request_ID']; ?></th>
            <td><?php echo $row['Exporter_Request_Desc']; ?></td>
            <td><?php echo $row['Exporter_Name']; ?></td>
            <td><?php echo $row['Attendance_ID']; ?></td>
            <td><?php echo $row['Officer_Name']; ?></td>
          </tr>
          <?php
            }
            sqlsrv_free_stmt($stmt);
          ?>
        </tbody>
      </table>
    </div>

    <div class="col-sm">
    <h2>Attendence</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Attendence ID</th>
            <th scope="col">Officer ID</th>
            <th scope="col">Officer Name</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            $viewName = "Display_Available_Officers";
            $sql = "SELECT * FROM $viewName";
            
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row['Attendance_ID']; ?></th>
            <td><?php echo $row['Officer_ID']; ?></td>
            <td><?php echo $row['Officer_Name']; ?></td>
            
          </tr>
          <?php
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
          ?>
        </tbody>
      </table>
      <a href="mark_attendance_form.php"><button type="button" class="btn btn-success">Mark Attendence</button></a>
      <a href="sign_off_form.php"><button type="button" class="btn btn-warning">Sign Off</button></a>
    </div>
  </div>
</div>
</body>
</html>
