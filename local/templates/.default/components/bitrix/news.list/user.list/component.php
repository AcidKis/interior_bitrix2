<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arFilter = [];
if (!empty($_GET['filter_last_login'])) {
    $arFilter['>=LAST_LOGIN'] = $_GET['filter_last_login'] . " 00:00:00";
}
if (!empty($_GET['filter_email'])) {
    $arFilter['EMAIL'] = "%" . $_GET['filter_email'] . "%";
}

$arSort = ["LAST_LOGIN" => "DESC"];

$rsUsers = CUser::GetList($by = $arSort, $order = "ASC", $arFilter);
$arResult['USERS'] = [];

while ($user = $rsUsers->Fetch()) {
    $arResult['USERS'][] = $user;
}

$this->IncludeComponentTemplate();
?>