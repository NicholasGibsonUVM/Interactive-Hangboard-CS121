<?php 
include 'connect-DB.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dataIsGood = false;
$email = '';
$firstName = '';
$lastName = '';
$username = '';
$password = '';
$age = '';
$weight = '';
$yrs_climbing = '';
$V_grade = '';
$lead_grade = '';

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
        
        $firstName = getData("txtFirstName");
        $lastName = getData("txtLastName");
        $email = getData("txtEmail");
        $username = getData("txtUsername");
        $password = getData("txtPassword");
        $age = getData("intAge");
        $weight = getData("intWeight");
        $yrs_climbing = getData("intYrs_Climbing");
        $V_grade = getData("intV_Grade");
        $lead_grade = getData("intLead_Grade");

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if($firstName == ""){
            print '<p class = "mistake"> Please enter your first name.</p>';
            $dataIsGood = false;
        }

        if($lastName == ""){
            print '<p class = "mistake"> Please enter your last name.</p>';
            $dataIsGood = false;
        }

        if($email == ""){
            print '<p class="mistake">Please enter your email address.</p>';
            $dataIsGood = false;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            print '<p class="mistake">Your email address appears to be incorrect.</p>';
            $dataIsGood = false;
        }

        if($username == ""){
            print '<p class = "mistake"> Please enter a username.</p>';
            $dataIsGood = false;
        }

        if($password == ""){
            print '<p class="mistake">Please enter a valid password.</p>';
            $dataIsGood = false;
        }

        if($age == ""){
            print '<p class = "mistake"> Please enter your age name.</p>';
            $dataIsGood = false;
        }

        if($weight == ""){
            print '<p class = "mistake"> Please enter your weight name.</p>';
            $dataIsGood = false;
        }

        if($yrs_climbing == ""){
            print '<p class="mistake">Please enter how many years you\'ve been climbing.</p>';
            $dataIsGood = false;
        }

        if($V_grade == ""){
            print '<p class = "mistake"> Please enter a your V Grade.</p>';
            $dataIsGood = false;
        }

        if($lead_grade == ""){
            print '<p class="mistake">Please enter your lead grade.</p>';
            $dataIsGood = false;
        }

        if($dataIsGood){
            try{
                $sql1 = 'INSERT INTO tblUsers (fldEmail, fldFirstName, fldLastName, fldUsername, fldPassword) VALUES (?, ?, ?, ?, ?)';
                $statement1 = $pdo->prepare($sql1);
                $params1 = array($email, $firstName, $lastName, $username, $password);
            
                if($statement1->execute($params1)){
                    
                        print '<p>Record was successfuly saved.</p>';

                        $to = $email;
                        $from = 'Ascentionist <ewest3@uvm.edu>';
                        $subject = 'Account Created';

                        $mailMessage = 'Thank you for creating an account with ascentionist. Be sure to update with your most recent ascents on the home page!';
                        $mailMessage .= ' -Ascentionist';
                
                        $headers = "MIME-Version 1.0\r\n";
                        $headers .= "Content-type: text/html; charset=utf-8\r\n";
                        $headers .= "From: " . $from . "\r\n";

                        $mailSent = mail($to, $subject, $mailMessage, $headers);

                        if($mailSent){
                            print '<p>An email has been sent to you confirming your account creation.</p>';
                        }
                }
                else{
                    print '<p>Record was NOT successfully saved.</p>';
                }

                $sql2 = 'INSERT INTO tblUser_Info (fldUsername, fldAge, fldWeight, fldYrs_Climbing, fldV_Grade, fldLead_Grade) VALUES (?, ?, ?, ?, ?, ?)';
                $statement2 = $pdo->prepare($sql2);
                $params2 = array($username, $age, $weight, $yrs_climbing, $V_grade, $lead);
            
                if($statement2->execute($params2)){
                        print '<p>Record was successfuly saved.</p>';
                }
                else{
                    print '<p>Record was NOT successfully saved.</p>';
                }

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
        <p class = "signup">
            <label for="txtFirstName">First</label>
            <input type="text" name = "txtFirstName" id = "txtFirstName" value= "<?php print $firstName; ?>" required>
        </p>
        <p class = "signup">
            <label for="txtLastName">Last</label>
            <input type="text" name = "txtLastName" id = "txtLastName" value= "<?php print $lastName; ?>" required>
        </p>
        <p class = "signup">
            <label for="txtEmail">Email</label>
            <input type="email" name = "txtEmail" id = "txtEmail" value= "<?php print $email; ?>" onkeyup="checkemail();" required>
            <span id="email_status"></span>
            <br> 
        </p>
        <p class = "signup">
            <label for="txtUsername">Username</label>
            <input type="text" name = "txtUsername" id = "txtUsername" value= "<?php print $username; ?>" onkeyup="checkname();" required>
            <span id="name_status"></span>
            <br>   
        </p>
        <p class = "signup">
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

        <p class = "user_info">
            <label for="intAge">First</label>
            <input type="int" name = "intAge" id = "intAge" value= "<?php print $age; ?>" required>
        </p>
        <p class = "user_info">
            <label for="intWeight">First</label>
            <input type="int" name = "intWeight" id = "intWeight" value= "<?php print $weight; ?>" required>
        </p>
        <p class = "user_info">
            <label for="intYrs_Climbing">First</label>
            <input type="int" name = "intYrs_Climbing" id = "intYrs_Climbing" value= "<?php print $yrs_climbing; ?>" required>
        </p>
        <p class = "user_info">
            <label for="intV_Grade">First</label>
            <input type="int" name = "intV_Grade" id = "intV_Grade" value= "<?php print $V_grade; ?>" required>
        </p>
        <p class = "user_info">
            <label for="txtLead_Grade">First</label>
            <input type="text" name = "txtLead_Grade" id = "txtLead_Grade" value= "<?php print $lead_grade; ?>" required>
        </p>
    </fieldset>
    <fieldset class = "submit">
                <p>
                    <input type="submit" id='submit' name = "btnSubmit" href = 'profile.php'>
                </p>
    </fieldset>
</form>
<footer style='background:none'><script src="js/accountValidation.js"></script>
        <script src="js/passwordValidation.js"></script></footer>
</main>
</html>