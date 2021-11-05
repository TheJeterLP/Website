<!DOCTYPE HTML>
<!--
Website erstellt durch Joey Peter.
https://jp-motortechnik.de
-->
<html lang="en-gb">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="KFZ Tuning">
        <meta name="author" content="Joey Peter">
        <meta name="keywords" content="z20let, z20leh, z20ler, z20lel, z20lex"/>

        <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#8769c3">
        <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#8769c3">

        <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.3/css/bulma.min.css"/>

        <link rel="stylesheet" type="text/css" href="/css/<?php echo $css ?>">
        <link rel="stylesheet" type="text/css" href="/css/captcha.css">
        <link rel="stylesheet" type="text/css" href="/lib/to-top/material-scrolltop.css"/>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

        <?php
        if (isset($ret['additional-css'])) {
            echo '<link rel="stylesheet" type="text/css" href ="/css/' . $ret['additional-css'] . '">';
        }
        ?>
        <script src="https://www.google.com/recaptcha/api.js?render=6Lf2BHQaAAAAAP1v0qqNX2vHZhUp6_BQ7h9fSY4x"></script>        
    </head>

    <body>
        <section class="hero is-fullheight">
            <?php
            if ($headerfooter) {
                ?>
                <div class="hero-head">
                    <nav class="navbar is-white">
                        <div class="container">
                            <div class="navbar-brand">
                                <a href= "/" class="navbar-item">
                                    <img alt="Logo" src="img/logos/logo-transparent-black.png" height="200" width="260">
                                </a>
                                <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div id="navbarMenu" class="navbar-menu">
                                <div class="navbar-start">
                                    <a class="navbar-item" href="/">
                                        Über mich
                                    </a>

                                    <a class="navbar-item" href="/">
                                        Referenzen
                                    </a>     
                                    
                                    <a class="navbar-item" href="/">
                                        Links
                                    </a>  
                                    
                                    <a class="navbar-item" href="/">
                                        Motordaten
                                    </a>  
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <?php
            }
            ?>

            <div class="hero-body">
                <div class="container has-text-centered">
                    <!-- Template here -->
