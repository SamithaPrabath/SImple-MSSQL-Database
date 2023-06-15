<?php
    require 'db_con.php';
    $procedureName = "{call GetPerformanceReport(?)}";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);
    google.charts.setOnLoadCallback(drawChart4);

    function drawChart1() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');

      <?php
        $designation_Name = 'AD';
    
        $params = array(&$designation_Name);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "There was an error. Please try again!";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $category = $row['officer_name'];
                $value = $row['Officer_Rate'];
                echo "data.addRow(['$category', $value]);";
            }
        }
        sqlsrv_free_stmt($stmt);
      ?>

      var options = {
        title: 'AO Chart',
        width: 600,
        height: 400,
        orientation: 'horizontal',
        colors: ['green'],
        hAxis: {
          title: 'Officer Name'
        },
        vAxis: {
          title: 'Officer Rate'
        }
      };

      // Instantiate and draw the chart
      var chart = new google.visualization.BarChart(document.getElementById('chart-container1'));
      chart.draw(data, options);
    }

    function drawChart2() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');

      <?php
        $designation_Name = 'CRO';
    
        $params = array(&$designation_Name);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "There was an error. Please try again!";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $category = $row['officer_name'];
                $value = $row['Officer_Rate'];
                echo "data.addRow(['$category', $value]);";
            }
        }
        sqlsrv_free_stmt($stmt);
      ?>

      var options = {
        title: 'CRO Chart',
        width: 600,
        height: 400,
        orientation: 'horizontal',
        colors: ['blue'],
        hAxis: {
          title: 'Officer Name'
        },
        vAxis: {
          title: 'Officer Rate'
        }
      };

      // Instantiate and draw the chart
      var chart = new google.visualization.BarChart(document.getElementById('chart-container2'));
      chart.draw(data, options);
    }

    function drawChart3() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');

      <?php
        $designation_Name = 'DO';
    
        $params = array(&$designation_Name);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "There was an error. Please try again!";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $category = $row['officer_name'];
                $value = $row['Officer_Rate'];
                echo "data.addRow(['$category', $value]);";
            }
        }
        sqlsrv_free_stmt($stmt);
      ?>

      var options = {
        title: 'DO Chart',
        width: 600,
        height: 400,
        orientation: 'horizontal',
        colors: ['red'],
        hAxis: {
          title: 'Officer Name'
        },
        vAxis: {
          title: 'Officer Rate'
        }
      };

      // Instantiate and draw the chart
      var chart = new google.visualization.BarChart(document.getElementById('chart-container3'));
      chart.draw(data, options);
    }

    function drawChart4() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');

      <?php
        $designation_Name = 'MSO';
    
        $params = array(&$designation_Name);
        
        $stmt = sqlsrv_query($conn, $procedureName, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "There was an error. Please try again!";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $category = $row['officer_name'];
                $value = $row['Officer_Rate'];
                echo "data.addRow(['$category', $value]);";
            }
        }
        sqlsrv_free_stmt($stmt);
      ?>

      var options = {
        title: 'MSO Chart',
        width: 600,
        height: 400,
        orientation: 'horizontal',
        colors: ['yellow'],
        hAxis: {
          title: 'Officer Name'
        },
        vAxis: {
          title: 'Officer Rate'
        }
      };

      // Instantiate and draw the chart
      var chart = new google.visualization.BarChart(document.getElementById('chart-container4'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <?php require 'header.php'; ?>
  <div class="container main">
    <div class="row">
        <div class="col-sm">
        <h2>AD Report</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Officer ID</th>
                <th scope="col">Officer Name</th>
                <th scope="col">Designation Id</th>
                <th scope="col">Designation Name</th>
                <th scope="col">Total Tasks</th>
                <th scope="col">Total Days</th>
                <th scope="col">Officer Rate</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $designation_Name = 'AD';
        
                $params = array(&$designation_Name);
                
                $stmt = sqlsrv_query($conn, $procedureName, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['officer_id']; ?></th>
                <td><?php echo $row['officer_name']; ?></td>
                <td><?php echo $row['designation_id']?></td>
                <td><?php echo $row['designation_name']; ?></td>
                <td><?php echo $row['Total_Tasks']; ?></td>
                <td><?php echo $row['Total_Days']; ?></td>
                <td><?php echo $row['Officer_Rate']; ?></td>
            </tr>
            <?php
                }
                sqlsrv_free_stmt($stmt);
            ?>
            </tbody>
        </table>
        </div>

        <div id="chart-container1" class="col-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
        <h2>CRO Report</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Officer ID</th>
                <th scope="col">Officer Name</th>
                <th scope="col">Designation Id</th>
                <th scope="col">Designation Name</th>
                <th scope="col">Total Tasks</th>
                <th scope="col">Total Days</th>
                <th scope="col">Officer Rate</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $designation_Name = 'CRO';
        
                $params = array(&$designation_Name);
                
                $stmt = sqlsrv_query($conn, $procedureName, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['officer_id']; ?></th>
                <td><?php echo $row['officer_name']; ?></td>
                <td><?php echo $row['designation_id']?></td>
                <td><?php echo $row['designation_name']; ?></td>
                <td><?php echo $row['Total_Tasks']; ?></td>
                <td><?php echo $row['Total_Days']; ?></td>
                <td><?php echo $row['Officer_Rate']; ?></td>
            </tr>
            <?php
                }
                sqlsrv_free_stmt($stmt);
            ?>
            </tbody>
        </table>
        </div>

        <div id="chart-container2" class="col-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
        <h2>DO Report</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Officer ID</th>
                <th scope="col">Officer Name</th>
                <th scope="col">Designation Id</th>
                <th scope="col">Designation Name</th>
                <th scope="col">Total Tasks</th>
                <th scope="col">Total Days</th>
                <th scope="col">Officer Rate</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $designation_Name = 'DO';
        
                $params = array(&$designation_Name);
                
                $stmt = sqlsrv_query($conn, $procedureName, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['officer_id']; ?></th>
                <td><?php echo $row['officer_name']; ?></td>
                <td><?php echo $row['designation_id']?></td>
                <td><?php echo $row['designation_name']; ?></td>
                <td><?php echo $row['Total_Tasks']; ?></td>
                <td><?php echo $row['Total_Days']; ?></td>
                <td><?php echo $row['Officer_Rate']; ?></td>
            </tr>
            <?php
                }
                sqlsrv_free_stmt($stmt);
            ?>
            </tbody>
        </table>
        </div>

        <div id="chart-container3" class="col-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
        <h2>MSO Report</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Officer ID</th>
                <th scope="col">Officer Name</th>
                <th scope="col">Designation Id</th>
                <th scope="col">Designation Name</th>
                <th scope="col">Total Tasks</th>
                <th scope="col">Total Days</th>
                <th scope="col">Officer Rate</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $designation_Name = 'MSO';
        
                $params = array(&$designation_Name);
                
                $stmt = sqlsrv_query($conn, $procedureName, $params);
                if ($stmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                }

                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            ?>
            <tr>
                <th scope="row"><?php echo $row['officer_id']; ?></th>
                <td><?php echo $row['officer_name']; ?></td>
                <td><?php echo $row['designation_id']?></td>
                <td><?php echo $row['designation_name']; ?></td>
                <td><?php echo $row['Total_Tasks']; ?></td>
                <td><?php echo $row['Total_Days']; ?></td>
                <td><?php echo $row['Officer_Rate']; ?></td>
            </tr>
            <?php
                }
                sqlsrv_free_stmt($stmt);
            ?>
            </tbody>
        </table>
        </div>

        <div id="chart-container4" class="col-sm">
        </div>
    </div>
</div>
</body>
</html>
