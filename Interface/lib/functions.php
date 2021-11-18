<?php
function check_login()
{

	if(isset($_SESSION['id']))
	{

		$id = array($_SESSION['id']);
		$query = "select `pmkUsername` from tblUsers where `pmkUsername` = ? limit 1";

		$result = $databaseWriter->select($query, $id);
		if($result && count($result, COUNT_RECURSIVE) == 2) 
		{
			$query = "select * from tblUsers where `pmkUsername` = ?";
			$user_data = $databaseWriter->select($query, $id);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php", true, 303);
	die;
}

//Get trim and sanatize data
function getData($field)
{
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = htmlspecialchars(trim($_POST[$field]));
    }
    return $data;
} 

?>