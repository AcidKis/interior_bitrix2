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
$request = Application::getInstance()->getContext()->getRequest();

$name = $request->getPost('name');
$description = $request->getPost('description');
$file = $request->getFile('file');

$formId = 1;

$resultId = CFormResult::Add($formId, [
    'form_text_1' => $name,
    'form_textarea_2' => $description,
    'form_file_3' => $file
]);

if ($resultId) {
    echo json_encode(['success' => true, 'message' => 'Результат сохранен']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ошибка сохранения']);
}


exit;