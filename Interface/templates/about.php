<?php
include 'top.php';
session_start();
$user_data = check_login($con);
?>

<main>
    <div class="flex-container">
        <p>
            About Ethan
        </p>
        <p>
            About Nick
        </p>
    </div>
    <p>
        About the project (Proposal)
    </p>
</main>