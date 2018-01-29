<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-login">
    <h1>Создать задачу</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" id="image" name="image" />
        </div>
        <div class="form-group">
            <label for="text">Текст задачи</label>
            <textarea id="text" name="text" class="form-control"><?= isset($_POST['text']) ? $_POST['text'] : '' ?></textarea>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <input type="submit" class='btn btn-primary' name='create-button' value="Создать" />
                <div class='btn btn-info' style="margin-left: 5px" id="preview">Предварительный просмотр</div>
            </div>
        </div>
    </form>
</div>

<?  require(ROOT . '/views/task/preview.php'); ?>

<script>
    $(function () {
        $('#preview').click(function () {
            $('#image-preview').attr('src', '/res/'+$('#image').val());
            $('#text-preview').text($('#text').val());
            $('#name-preview').text($('#name').val());
            $('#email-preview').text($('#email').val());

            $('#preview-block').removeClass('hidden');
        });
    });
</script>