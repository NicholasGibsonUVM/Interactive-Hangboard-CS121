<nav>
    <ul>
        <li>
            <a href='index.php'><img src="../images/logo.png" class='navLogo' alt='logo'></a>
        </li>
        <li>
            <a class ="<?php
            if($path_parts['filename'] == "profile") {
                print 'activePage';
            }
            ?>" href = "profile.php">Home</a>
        </li>
        <li>
            <a class ="<?php
            if($path_parts['filename'] == "userinfo") {
                print 'activePage';
            }
            ?>" href = "userinfo.php">My Info</a>
        </li>
        <li>
            <a class ="<?php
            if($path_parts['filename'] == "about") {
                print 'activePage';
            }
            ?>" href = "about.php">About</a>
        </li>
        <li style='float:right'>
            <a class ="<?php
            if($path_parts['filename'] == "logout") {
                print 'activePage';
            }
            ?>" href = "logout.php">Log Out</a>
        </li>
    </ul>
</nav>