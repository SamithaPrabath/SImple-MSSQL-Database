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
            <th scope="col">RS ID</th>
            <th scope="col">ECOO NUMBER</th>
            <th scope="col">Time Created</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $viewName = "UI_Incomplete_Request_Stages";
            $sql = "SELECT * FROM $viewName";
            
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row['request_stage_id']; ?></th>
            <td><?php echo $row['ecoo_number']; ?></td>
            <td><?php echo $row['request_stage_date_time']->format('Y-m-d H:i:s'); ?></td>
            <td><?php echo $row['stage_type_name']; ?></td>
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
    <h2>Attendence</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Attendence ID</th>
            <th scope="col">Officer ID</th>
            <th scope="col">Officer Name</th>
            <th scope="col">Designation</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            $viewName = "UI_Available_Officers";
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
            <td><?php echo $row['designation_name']; ?></td>
          </tr>
          <?php
            }
            sqlsrv_free_stmt($stmt);
          ?>
        </tbody>
      </table>
      <a href="mark_attendance_form.php"><button type="button" class="btn btn-success">Mark Attendence</button></a>
      <a href="sign_off_form.php"><button type="button" class="btn btn-warning">Sign Off</button></a>
    </div>
  </div>
  <div class="row">
  <div class="col-sm">
      <h2>Task Allocation</h2>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">RS ID</th>
            <th scope="col">Type</th>
            <th scope="col">ECOO Number</th>
            <th scope="col">Attendence ID</th>
            <th scope="col">Officer Name</th>
            <th scope="col">Designation</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $viewName = "UI_Assigned_Tasks";
            $sql = "SELECT * FROM $viewName";
            
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          ?>
          <tr>
            <th scope="row"><?php echo $row['request_stage_id']; ?></th>
            <td><?php echo $row['stage_type_name']; ?></td>
            <td><?php echo $row['ecoo_number']; ?></td>
            <td><?php echo $row['Attendance_ID']; ?></td>
            <td><?php echo $row['Officer_Name']; ?></td>
            <td><?php echo $row['designation_name']; ?></td>
          </tr>
          <?php
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
          ?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>
