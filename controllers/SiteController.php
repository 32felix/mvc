<?php

include_once ROOT . '/models/Task.php';
include_once ROOT . '/models/form/LoginForm.php';

class SiteController
{

    public function actionIndex($page=1, $sort=null)
    {
        session_start();

        $list = Task::getTasks($page, 3, $sort);

        $countPages = Task::getCountPages();

        $view = ROOT . '/views/site/index.php';

        require_once(ROOT . '/views/layouts/main.php');

        return true;
    }

    public function actionLogin()
    {
        session_start();
        $view = ROOT . '/views/site/login.php';

        $model = new LoginForm();

        if (isset($_POST['login']) && isset($_POST['password']) && $model->login($_POST))
            return Router::redirect('/');

        require_once(ROOT . '/views/layouts/main.php');

        return true;
    }

    public function actionLogout()
    {
        session_start();

        if ($_SESSION['userId'])
            $_SESSION = [];

        return Router::redirect('/');
    }
}
