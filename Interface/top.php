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

    <?php
    print '<body class = "flexbox" id = "' . $path_parts['filename'] . '">';
    print '<!-- ###    Start of Body   ### -->';
    include 'connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    ?>