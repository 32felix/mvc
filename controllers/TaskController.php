<?php

include_once ROOT . '/models/Task.php';

class TaskController
{

    public function actionCreate()
    {
        session_start();

        $model = new Task();

        if (!empty($_FILES) && !empty($_FILES['image'] && !empty($_FILES['image']['tmp_name'])))
        {
            $_POST['image'] = Image::getImage($_FILES);
            $model->imageName = $_FILES['image']['name'];
        }

        if (!empty($_POST['name']) && !empty($_POST['email'])
            && !empty($_POST['text']) && $model->edit())
            return Router::redirect('/');

        $view = ROOT . '/views/task/create.php';

        require_once(ROOT . '/views/layouts/main.php');

        return true;
    }

    public function actionEdit($id=null)
    {
        session_start();

        if (!Router::getAccess('admin'))
            return Router::redirect('/');

        $model = new Task();

        $model->id=$id;

        if (!empty($_POST['name']) && !empty($_POST['email'])
             && !empty($_POST['text']) && $model->edit())
            return Router::redirect('/');

        $view = ROOT . '/views/task/edit.php';

        $task = $model->getTask($id);

        if (!$task)
            return Router::redirect('/task/create');

        require_once(ROOT . '/views/layouts/main.php');

        return true;
    }
}
