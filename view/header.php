<?php

include("../config/config.php");

// $user = $_SESSION["user"] ?? null;

?>

<!DOCTYPE html>

<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="../public/css/style.css">

        <!--
        <meta name="referrer" content="unsafe-url">
        <link rel="shortcut icon" href="img/favicon.png">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
        -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Goldman">
    </head>

    <body>
        <header class="header">
            <h1>Nättraby Vägmuseum</h1>
            <!--
            <img class="logo" src="img/jlogo.png" alt="logotyp för BTH">
            <span class="subtitle">Jocke's</span>
            <span class="title">Rapportsida</span>
            -->
        </header>

        <nav class="navbar">
                <a href="home.php">Start</a>
                <a href="objects.php">Utställningsobjekt</a>
                <a href="articles.php">Artiklar</a>
                <a href="about.php">Om Oss</a>
                <a href="contact.php">Kontakt</a>
                <a href="search.php">Sök</a>
                <a href="gallery.php">Galleri</a>
        </nav>