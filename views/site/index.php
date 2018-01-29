<?php



?>



<table class="table table-bordered table-hover">

    <tr>

        <th>Картинка</th>

        <th>
            <a href="/<?= $page ?>/<?= $sort != 'name' ? 'name' : 'name-' ?>">
                Имя пользователя
                <?= $sort == 'name' ? '<i class="glyphicon glyphicon-sort-by-alphabet"></i>' : '' ?>
                <?= $sort == 'name-' ? '<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>' : '' ?>
            </a>
        </th>

        <th>
            <a href="/<?= $page ?>/<?= $sort != 'email' ? 'email' : 'email-' ?>">
                E-mail
                <?= $sort == 'email' ? '<i class="glyphicon glyphicon-sort-by-alphabet"></i>' : '' ?>
                <?= $sort == 'email-' ? '<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>' : '' ?>
            </a>
        </th>

        <th>
            <a href="/<?= $page ?>/<?= $sort != 'text' ? 'text' : 'text-' ?>">
                Текст задачи
                <?= $sort == 'text' ? '<i class="glyphicon glyphicon-sort-by-alphabet"></i>' : '' ?>
                <?= $sort == 'text-' ? '<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>' : '' ?>
            </a>
        </th>

        <?= Router::getAccess('admin') ? '<th></th>' : '' ?>

    </tr>





    <? foreach ($list as $item): ?>

        <tr>

            <td><img src="/res/<?= $item['imageName'] ?>" /></td>

            <td><?= $item['name'] ?></td>

            <td><?= $item['email'] ?></td>

            <td><?= $item['text'] ?></td>

            <?= Router::getAccess('admin') ?

                '<td><a href="/task/edit/'.$item['id'].'" class="glyphicon glyphicon-pencil"></a></td>' : '' ?>

        </tr>

    <? endforeach; ?>

</table>



<ul class="pagination">

    <li><a href="/<?= trim($sort) != '' ? '1/'.$sort : '' ?>">«</a></li>

    <? for ($i=1;$i<=$countPages;$i++): ?>

    <li><a href="/<?= $i > 1 ? $i . (trim($sort) != '' ? '/'.$sort : '') : '' . (trim($sort) != '' ? '1/'.$sort : '')  ?>"><?= $i ?></a></li>

    <? endfor; ?>

    <li><a href="/<?= $countPages . (trim($sort) != '' ? '/'.$sort : '') ?>">»</a></li>

</ul>

<script>

   /* $(function () {

        $('.open-popup').click(function () {

            var id=$(this).attr('data-id');

            $('#'+id).toggleClass('hidden');

        });



        $('.close-popup, .select-no').click(function () {

            $(this).closest('.fixed').addClass('hidden');

        });



        $('#select-service').find('.service-block').click(function () {

            $(this).closest('.fixed').addClass('hidden');

            $('#voucher').val($(this).attr('data'));

            $('#add-price').removeClass('hidden');

        });



        $('#write-code').find('.select-yes').click(function () {

            var $this=$(this);

            $this.html('<img src="/images/load.gif" />');

            $this.attr('disabled', 'disabled');

            $.ajax({

                url: "/site/get-account",

                data: {

                    code: $('input#code').val()

                },

                type: "POST",

                dataType: 'json'

            }).done(function (data) {

                document.location = '/'+data.id;

                $this.html('OK');

                $this.attr('disabled', false);

            }).fail(function (jqXHR, textStatus, errorThrown) {

                $this.html('OK');

                $this.attr('disabled', false);

                alert("Ошибка: " + jqXHR.status + " " + jqXHR.statusText);

            })

        });



        $('#add-price').find('.select-yes').click(function () {

            var $this=$(this);

            $this.html('<img src="/images/load.gif" />');

            $this.attr('disabled', 'disabled');

            $.ajax({

                url: "/site/add-money",

                data: {

                    voucher: $('input#voucher').val(),

                    amount: $('input#price').val()

                },

                type: "POST",

                dataType: 'json'

            }).done(function (data) {

                document.location = '/'+data.id;

                $this.html('OK');

                $this.attr('disabled', false);

            }).fail(function (jqXHR, textStatus, errorThrown) {

                $this.html('OK');

                $this.attr('disabled', false);

                alert("Ошибка: " + jqXHR.status + " " + jqXHR.statusText);

            })

        });





    })*/

</script>