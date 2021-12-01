<?php
define("server", 'webdb.uvm.edu');
define("username", 'ewest3_writer');
define('password', 'Sw9NPsapIxh7N5eW');
define('DB', 'EWEST3_labs');
$con = mysqli_connect(server, username, password, DB);

if(mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 

$sqlSessions = 'SELECT pmkSessionId FROM tblSession WHERE fpkUsername = "username"';
$result = mysqli_query($con, $sqlSessions);

// Fetch all
mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

mysqli_close($con);
?>