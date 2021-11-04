<?php 
include 'connect-DB.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dataIsGood = false;
$username = '';
$password = '';

function getData($field){
if(!isset($_POST[$field])){
    $data = "";
}
else{
    $data = trim($_POST[$field]);
    $data = htmlspecialchars($data);
}
return $data;
}
?>
<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$path_parts = pathinfo($phpSelf);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ascentionist</title>
        <meta name="author" content="Ethan West">
        <meta name="description" content="Ascentionist: log your climbs and see what your friends are up to!">
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <meta name = "viewport" content = "width=device-width initial-scale = 1.0">
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
    </head>
<main>
    <?php
    // forDebugging
    //print '<p>Post Array:</p><pre>';
    // print_r($_POST);
    // print '</pre>';
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dataIsGood = true;
        $username = getData("txtUsername");
        $password = getData("txtPassword");

        if($username == ""){
            print '<p class = "mistake"> Please enter a username.</p>';
            $dataIsGood = false;
        }

        if($password == ""){
            print '<p class="mistake">Please enter a valid password.</p>';
            $dataIsGood = false;
        }
        
        #FIXME validate username and password from database
        if($dataIsGood){
            try{
                #VERIFY THROUGH DATABASE AND GO TO PROFILE
                // $sql = 'INSERT INTO tblAccount (fldEmail, fldFirstName, fldLastName, fldUsername, fldPassword) VALUES (?, ?, ?, ?, ?)';
                // $statement = $pdo->prepare($sql);
                // $params = array($email, $firstName, $lastName, $username, $password);
            
                // if($statement->execute($params)){
                    
                //         print '<p>Record was successfuly saved.</p>';
                // }
                // else{
                //     print '<p>Record was NOT successfully saved.</p>';
                // }
            }
            catch(PDOException $e){
                print '<p>Couldn\'t insert the record, please contact someone.</p>';
            }
        }
    }
    if($dataIsGood){
        print '<h2>Thank you, your information has been recieved.</h2>';
    }
    ?>
<section >
    <a href='index.php'><img src="images/logo.png" class='logo' alt='logo'></a>
</section>
<form action="#" method="POST" >
    <fieldset>
        <h1>Register</h1>
        <p class = "login">
            <label for="txtUsername">Username</label>
            <input type="text" name = "txtUsername" id = "txtUsername" value= "<?php print $username; ?>" onkeyup="checkname();" required>
            <span id="name_status"></span>
            <br>   
        </p>
        <p class = "login">
            <label for="txtPassword">Password</label>
            <input type="password" id="txtPassword" name="txtPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>   
            <input type="checkbox" onclick="showPassword()">Show Password         
            <p id="pswrdMessage">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </p>
        </p>
    </fieldset>
    <fieldset class = "submit">
                <p>
                    <input type="submit" id='submit' name = "btnSubmit">
                </p>
    </fieldset>
    <a href = "signup.php">Create Account</a>
</form>
<footer style='background:none'><script src="js/accountValidation.js"></script>
        <script src="js/passwordValidation.js"></script></footer>
</main>
</html>