<?php 
include 'top.php';
$user_data = check_login($dbUsername, $dbName);
$sqlInsert = 'INSERT INTO `tblSession` (`fpkUsername`) VALUES (?)';
$data = array($user_data[0]['pmkUsername']);
if ($databaseWriter->insert($sqlInsert, $data)) {
    $sqlSelect = 'SELECT `pmkSessionId` FROM `tblSession` ORDER BY `pmkSessionId` DESC LIMIT 1';
    $id = $databaseWriter->select($sqlSelect);
    if (DEBUG) {
        print_r($id);
    } else if ($id != null) {
        header("Location: http://169.254.74.233/cgi-bin/app.py?sesid=" . $id[0]['pmkSessionId'], true, 303);
        exit();
    } else {
        print $databaseWriter->displayQuery($sqlSelect);
    }
} else {
    print '<p>Failed Insert</p>';
    print $databaseWriter->displayQuery($sqlInsert, $data);
}
?>