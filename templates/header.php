<!DOCTYPE HTML>
<html lang="en-gb">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Programming">
        <meta name="author" content="Jeter">
        <meta name="keywords" content="Programming, java, php, sql, chatex, admincmd, bukkit, plugin, spigot, bungeecord"/>
        <link rel="apple-touch-icon" sizes="57x57" href="https://www.thejeterlp.dev/img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://www.thejeterlp.dev/img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://www.thejeterlp.dev/img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="https://www.thejeterlp.dev/img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://www.thejeterlp.dev/img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="https://www.thejeterlp.dev/img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://www.thejeterlp.dev/img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="https://www.thejeterlp.dev/img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://www.thejeterlp.dev/img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="https://www.thejeterlp.dev/img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://www.thejeterlp.dev/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="https://www.thejeterlp.dev/img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://www.thejeterlp.dev/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="https://www.thejeterlp.dev/img/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css"/>

        <link rel="stylesheet" type="text/css" href="/css/<?php echo $css ?>">
        <link rel="stylesheet" type="text/css" href="/css/captcha.css">
        <link rel="stylesheet" type="text/css" href="/lib/to-top/material-scrolltop.css"/>

        <?php
        if (isset($ret['additional-css'])) {
            echo '<link rel="stylesheet" type="text/css" href ="/css/' . $ret['additional-css'] . '">';
        }
        ?>
        <script src="https://www.google.com/recaptcha/api.js?render=6Lf2BHQaAAAAAP1v0qqNX2vHZhUp6_BQ7h9fSY4x"></script>
    </head>

    <body>
        <section class="hero is-fullheight" id="particles-js">
            <?php
            if ($headerfooter) {
                ?>
                <div class="hero-head">
                    <nav class="navbar is-dark">
                        <div class="container">
                            <div class="navbar-brand">
                                <a href= "/" class="navbar-item">
                                    <img alt="TheJeterLP" src="img/thejeterlp.png" width="75">
                                </a>
                                <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div id="navbarMenu" class="navbar-menu">
                                <div class="navbar-start">
                                    <a class="navbar-item is-white" href="/">
                                        Home
                                    </a>

                                    <a class="navbar-item is-white" href="https://short.thejeterlp.dev">
                                        ShortLinker
                                    </a>

                                    <div class="navbar-item is-dark has-dropdown is-hoverable">
                                        <a class="navbar-link">
                                            Legal
                                        </a>

                                        <div class="navbar-dropdown">
                                            <a class="navbar-item has-text-black" href="/imprint">
                                                Imprint
                                            </a>
                                            <a class="navbar-item has-text-black" href="/data-protection">
                                                Data Protection
                                            </a>
                                            <a class="navbar-item has-text-black" href="mailto:joey.peter1998@gmail.com">
                                                Contact
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-end">
                                    <div class="tabs is-right">
                                        <span class="navbar-item">
                                            <a class="button is-white is-outlined" href="https://github.com/TheJeterLP"
                                               target="_blank">
                                                <span class="icon">
                                                    <i class="fab fa-github"></i>
                                                </span>
                                                <span title="GitHub">Checkout my GitHub</span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <?php
            }
            ?>

            <div class="hero-body">
                <div class="container has-text-centered has-text-white">
                    <!-- Template here -->
