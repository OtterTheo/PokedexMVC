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

    <link rel="stylesheet" href="/<?=WEBROOT2?>/webroot/assets/app.css">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">


</head>
<header <?php
//if(isset($couleurheader)){
//    echo $couleurheader;
//} ?>
<div class="header-area ">
    <div id="sticky-header" class="main-header-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-2">
                    <div class="logo">
                        <a href="/<?=WEBROOT2?>/">
                            <!--                                95x90-->
                            <img style="max-height: 90px;" src="/<?=WEBROOT2?>/webroot/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a class="active" href="/<?=WEBROOT2?>/">Accueil</a></li>
                                <li><a href="#aboutme">A Propos de moi...</a></li>
                                <li><a href="#portfolio">Mes créations</a></li>
                                <li><a href="/<?=WEBROOT2?>/login_admin/login">Connexion</a></li>
                                <?php
                                if ((!empty($_SESSION['user']->identifiant) && (isset($_SESSION['user']->identifiant))) && (!empty($_SESSION['user']->admin && $_SESSION['user']->admin == '1D8c*A4R$T2ea3'))) {
                                    echo '<li><a href="/'.WEBROOT2.'/admin/portfolio_admin">Gérer portfolio</a></li>';
                                    echo '<li><a href="/'.WEBROOT2.'/login_admin/logout">Déconnexion</a></li>';
                                }?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                    <div class="Appointment">
                        <div class="book_btn d-none d-lg-block">
                            <a  href="#">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>

        </div>
    </div>

</div>
