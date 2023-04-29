<?php

$serverName = "localhost";
$connectionOptions = array(
    "Database" => "testdb",
    "UID" => "sa",
    "PWD" => "Un!q@to2023"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Executes a simple query
$sql = "SELECT @@VERSION as Version";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Retrieves and displays the query results
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "SQL Server version: " . $row["Version"] . PHP_EOL;
}

// Frees statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>
