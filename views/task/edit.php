<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-login">
    <h1>Редактировать задачу</h1>

    <form method="post">
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" readonly="readonly" id="name" name="name" class="form-control" value="<?= $task['name'] ?>" />
        </div>
        <input type="hidden" name="id" value="<?= $task['id'] ?>" />
        <input type="hidden" name="email" value="<?= $task['email'] ?>" />
        <div class="form-group">
            <label for="text">Текст задачи</label>
            <textarea id="text" name="text" class="form-control"><?= $task['text'] ?></textarea>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <input type="submit" class='btn btn-primary' name='edit-button' value="Редактировать" />
            </div>
        </div>
    </form>
</div>
