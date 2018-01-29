<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-login">
    <h1>Войти</h1>

    <form method="post">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="form-control" />
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <input type="submit" class='btn btn-primary' name='login-button' value="Войти" />
            </div>
        </div>
    </form>
</div>
