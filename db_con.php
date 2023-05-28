<?php
$serverName = "CHOK-PC";
$connectionOptions = array(
    "Database" => "awasdb", // Replace with your database name
    "Uid" => "", // Replace with your username
    "PWD" => "" // Replace with your password
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if the connection was successful
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
// sqlsrv_close($conn);
// Perform your database operations here
?>
