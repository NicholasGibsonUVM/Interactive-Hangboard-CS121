<nav>
    <a href='index.php'><img src="images/logo.png" class='navLogo' alt='logo'></a>
    <a class ="<?php
    if($path_parts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href = "index.php">Home</a>

    <a class ="<?php
    if($path_parts['filename'] == "profile") {
        print 'activePage';
    }
    ?>" href = "profile.php">Ethan West</a>
    
    <a class ="<?php
    if($path_parts['filename'] == "addAscent") {
        print 'activePage';
    }
    ?>" href = "addAscent.php">Add Ascent</a>

    <a class ="<?php
    if($path_parts['filename'] == "createAccount") {
        print 'activePage';
    }
    ?>" href = "createAccount.php">Create Account</a>
</nav>