<?php

require_once 'init.php';
?>
<html>
<head>
    <title>Receiv</title>
    <meta charset="utf-8">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Receiv</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?= $_SERVER["REQUEST_URI"] == '/pages/customer/form.php' ? 'class="active"' : '' ?>><a href="../customer/form.php">+ Devedores</a></li>
                        <li <?= $_SERVER["REQUEST_URI"] == '/pages/customer/list.php' ? 'class="active"' : '' ?>><a href="../customer/list.php">Listar Devedores</a></li>
                        <li <?= $_SERVER["REQUEST_URI"] == '/pages/debts/form.php' ? 'class="active"' : '' ?>><a href="../debts/form.php">+ Débitos</a></li>
                        <li <?= $_SERVER["REQUEST_URI"] == '/pages/debts/list.php' ? 'class="active"' : '' ?>><a href="../debts/list.php">Listar Débitos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="principal">
                <?=
                    $flashScopeMessageHelper->getSuccess();
                ?>
                <?=
                    $flashScopeMessageHelper->getError();
                ?>
                