<?php
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);
define('PUBLIC_AJAX_MODE', true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$_SESSION["SESS_SHOW_INCLUDE_TIME_EXEC"] = "N";
$APPLICATION->ShowIncludeStat = false;

use Bitrix\Main\Loader;
use Bitrix\Main\Application;

Loader::includeModule('form');

$resultId = $_GET['id'];
CFormResult::GetDataByID($resultId, null, $rsFields, $rsAnswers);

?>


<form id="edit-form" data-id="<?= htmlspecialchars($resultId) ?>">
    <input type="text" name="name" value="<?= htmlspecialchars($rsAnswers['form_text_1'][1]['USER_TEXT']) ?>"/>
    <textarea name="description"><?= htmlspecialchars($rsAnswers['form_textarea_2'][2]['USER_TEXT']) ?></textarea>

    <select name="status" id="status">
        <option value="new">Новый</option>
        <option value="processed">Обработан</option>
    </select>

    <div id="comment-field" style="display:none;">
        <textarea name="comment" placeholder="Комментарий"></textarea>
    </div>

    <button type="submit">Сохранить</button>
</form>

<script>
    $('#status').on('change', function () {
        if ($(this).val() == 'processed') {
            $('#comment-field').show();
        } else {
            $('#comment-field').hide();
        }
    });
</script>