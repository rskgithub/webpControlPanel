<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (!isset($_SESSION["user"])) { header("Location: index.php"); die();}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="templates/styles/customtwo.css">
<link rel="stylesheet" type="text/css" href="templates/styles/bootstrap.css">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webParakeet</title>
</head>
<body>