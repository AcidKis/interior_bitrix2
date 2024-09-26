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

$resultId = $request->getPost('id');
$name = $request->getPost('name');
$description = $request->getPost('description');
$status = $request->getPost('status');
$comment = $request->getPost('comment');


CFormResult::Update($resultId, [
    'form_text_1' => $name,
    'form_textarea_2' => $description,
    'form_status' => $status
]);

if ($status == 'processed') {

    $processingTime = time() - strtotime($arResult['DATE_CREATE']);
    CFormResult::SetField($resultId, 'form_text_4', $processingTime);
    CFormResult::SetField($resultId, 'form_textarea_5', $comment);
}

echo json_encode(['success' => true, 'message' => 'Данные обновлены']);