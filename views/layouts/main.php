<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/**
 * @var string $content
 */

$params = include(ROOT . '/config/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= $params['charset'] ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/templates/css/main.css" />
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap-theme.css" />

    <script type="text/javascript" src="/templates/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="/templates/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/templates/js/jquery-migrate-1.2.1.js"></script>

    <title>Задачник</title>
</head>
<body>
<div class="wrap">

    <nav id="w1" class="navbar-inverse navbar-fixed-top navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">На главную</a>
            </div>
            <div id="w1-collapse" class="collapse navbar-collapse">
                <ul id="w2" class="navbar-nav navbar-right nav">
                    <li><a id="invitation" href="/task/create">Создать задачу</a></li>
                    <? if (!empty($_SESSION['userId'])): ?>

                        <li><a href="/site/logout">Выйти</a></li>
                    <? else: ?>
                        <li><a href="/site/login">Войти</a></li>
                    <? endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <? !empty($view) ? require_once ($view) : ''?>
    </div>
</div>

<footer class="footer" style="background-color: #4e4e4e">
    <div class="container">
        <p class="pull-left" style="color: #fff">&copy; Cashier <?= date('Y') ?></p>
    </div>
</footer>

</body>
</html>
