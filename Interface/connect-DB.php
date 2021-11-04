<?php
$databaseName = 'CS121';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'ewest3_writer';
$password = 'Sw9NPsapIxh7N5eW';

$pdo = new PDO($dsn, $username, $password);
// $mysqli = new mysqli($dsn, $username, $password);
?>