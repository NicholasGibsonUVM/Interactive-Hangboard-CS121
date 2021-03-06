<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <meta name="author" content="Nicholas Gibson | Ethan West">
        <meta name="description"
            content="">
        <title>Interactive Hangboard</title>
        <link rel="shortcut icon" type="image/jpg" href="../images/logo.png"/>
        <link rel="stylesheet" 
              href="../style/style.css?version=<?php print time();?>"
              type="text/css">
    </head>
    <?php
    include "../lib/constants.php";
    if (DEVELOPMENT || DEBUG) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    }
    require_once("../lib/database.php");
    require('../lib/passwords.php');
    $databaseWriter = new DataBase($dbUsername, 'w', $dbName);
    require_once("../lib/functions.php");
    print'<body class="' . PATH_PARTS['filename'] . '">' . PHP_EOL;
    print'<!-- ***** START OF BODY ***** -->';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    print PHP_EOL;
    ?>