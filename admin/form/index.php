<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Loader;

Loader::includeModule('form');

$APPLICATION->SetTitle("form"); ?>

<button data-fancybox data-src="#form-popup" href="javascript:;" class="btn btn-primary">Создать</button>


<div id="form-popup" style="display: none;">
    <form id="create-form">
        <input type="text" name="name" placeholder="ФИО">
        <textarea name="description" placeholder="Описание"></textarea>
        <input type="file" name="file">
        <button type="submit">Сохранить</button>
    </form>
</div>

<?php
$rsResults = CFormResult::GetList(1, ($by = "s_timestamp"), ($order = "desc"), [], $isFiltered);

$results = [];
while ($arResult = $rsResults->Fetch()) {
    $results[] = $arResult;
}
?>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Дата создания</th>
        <th>ФИО</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $result): ?>
        <tr>
            <td><?= $result['ID']; ?></td>
            <td><?= $result['DATE_CREATE']; ?></td>

            <?php
            $arrAnswer = CFormResult::GetDataByID($result['ID'], ['form_text_1'], $resultFields, $resultAnswers);
            $fio = $resultAnswers['form_text_1'][1]['USER_TEXT'];
            ?>
            <td>
                <a href="javascript:void(0);" class="fio-link" data-id="<?= $result['ID']; ?>">
                    <?= htmlspecialchars($fio); ?>
                </a>
            </td>

            <td><?= $result['STATUS_TITLE']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {

        $('#create-form').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '/admin/form/ajax/form_save.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert("успешно!");
                    $.fancybox.close();
                    location.reload();
                }
            });
        });


        $(document).on('click', '.fio-link', function () {
            var resultId = $(this).data('id');
            $.ajax({
                url: '/admin/form/ajax/form_edit.php',
                type: 'GET',
                data: {id: resultId},
                success: function (response) {
                    $('#edit-form').html(response);
                    $.fancybox.open({
                        src: '#edit-form',

                    });
                }
            });
        });

        $('#edit-form').on('submit', function (e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '/admin/form/ajax/form_update.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    alert(response.message);
                    if (response.success) {
                        $.fancybox.close();
                        location.reload();
                    }
                }
            });
        });
    });
</script>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>


