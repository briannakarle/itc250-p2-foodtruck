<?php
//header.php
/**
 * header.php Is the head of the food truck app   
 * 
 * This is a basic header which includes the top of the html, from the head through the end of the header
 *
 * @package itc250_p2_foodtruck
 * @author Thomas Karchesy <tkarchesy@gmail.com>
 * @author Ed Brovick <ed@brovick.com>
 * @author Brianna Karle <briannarkarle@gmail.com>
 * @version 1.0 2016/02/02 
 * @link App: http://briannakarle.com/itc250/itc250-p2-foodtruck/index.php 
 * @link Staging Area: https://docs.google.com/document/d/1UTRfRWKYdKOKimCZd1oRzVTSKSXVe4bN8KZIHfo9ksw/edit?usp=sharing
 * @link Github repo: https://github.com/briannakarle/itc250-p2-foodtruck
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see 'index.php'
 * @todo add google doc link
 */

echo '
<!DOCTYPE html>
<html>
<head>
    <title>' . $pageTitle . '</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>  Aunt Betty\'s Biscuit Truck</h1>
            <h2>Made with the freshest flour and lard</h2>
        </header>
';
