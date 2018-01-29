<?php
/**
 * Created by PhpStorm.
 * User: Івася
 * Date: 24.07.2017
 * Time: 22:07
 */

?>

<div id="preview-block" class="hidden">
    <div>\
        <div class="block-show">
            <div class="popup-close"><img src="/templates/images/exit.png" /></div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Картинка</th>
                    <td><img id="image-preview" /></td>
                </tr>
                <tr>
                    <th>Имя</th>
                    <td id="name-preview"></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td id="email-preview"></td>
                </tr>
                <tr>
                    <th>Текст задачи</th>
                    <td id="text-preview"></td>
                </tr>
            </table>
        </div>
    </div>
</div>


<script>
    $(function () {
        $('.popup-close').click(function () {
            $(this).closest('#preview-block').addClass('hidden');
        });
    });
</script>
