<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("users");
?><br>
 <?$APPLICATION->IncludeComponent(
    "my_components:user.list",
    "",
    [
        "FILTER_DATE_FROM" => $_GET['FILTER_DATE_FROM'] ?? '',
        "FILTER_DATE_TO" => $_GET['FILTER_DATE_TO'] ?? '',
        "FILTER_EMAIL" => $_GET['FILTER_EMAIL'] ?? ''
    ]
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>