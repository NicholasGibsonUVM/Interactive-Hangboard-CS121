<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <meta name="author" content="Nicholas Gibson | Ethan West">
        <meta name="description"
            content="">
        <title></title>

        <link rel="stylesheet" 
              href="../style/forms_style.css?version=<?php print time();?>"
              type="text/css">
    </head>
    <?php
    include "../lib/constants.php";
    require_once("../lib/functions.php");
    require_once("../lib/database.php");
    $databaseWriter = new DataBase("root", 'w', "hangboard");
    print'<body class="' . PATH_PARTS['filename'] . '">' . PHP_EOL;
    print'<!-- ***** START OF BODY ***** -->';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    print PHP_EOL;
    ?>