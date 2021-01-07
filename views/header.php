<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" lang="fr">
    <!-- Primary Meta Tags -->
    <!--    <meta name="description" content="--><?php //echo $description;?><!--">-->
<!--    <title>--><?php //echo $title; ?><!--</title>-->


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="canonical" href="--><?php //echo $urlcanonique;?><!--" />-->
    <!-- Logo apple -->
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon.ico">


    <link rel="shortcut icon" href="/<?=WEBROOT2?>/favicon.ico" type="image/x-icon">
    <link href="/<?=WEBROOT2?>/webroot/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="/<?=WEBROOT2?>/webroot/css/app.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2412e698c.js" crossorigin="anonymous"></script>


</head>
<header <?php
//if(isset($couleurheader)){
//    echo $couleurheader;
//} ?>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-xl-1 col-lg-2">
                    <div class="logo">
                        <a href="/<?=WEBROOT2?>/">
                            <!--                                95x90-->
                            <img style="max-height: 90px;" src="/<?=WEBROOT2?>/webroot/img/pokedex.png" alt="">
                        </a>
                    </div>
                </div>
                <ul class="navbar-nav col-lg-11 justify-content-center">
                    <li class="nav-item">
                        <a class="color-red-pokemon  nav-link active" aria-current="page" href="/<?=WEBROOT2?>/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="color-red-pokemon  nav-link" href="/<?=WEBROOT2?>/Pokedex">Pokedex</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

