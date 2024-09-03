<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <link rel="stylesheet" href="/bitrix/templates/.default/template_style.css"/>
    <script type="text/javascript" src="/bitrix/templates/.default/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/bitrix/templates/.default/js/functions.js"></script>

    <link rel="shortcut icon" type="text/x-icon" href="/bitrix/templates/.default/favicon.ico">

    <!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div class="wrap">
    <div class="hd_header_area">
        <div class="hd_header">
            <? include_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/templates/.default/include/header.php');?>
        </div>
    </div>

    <!--- // end header area --->
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "nav", Array(
            "COMPONENT_TEMPLATE" => ".default",
            "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
            "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
        ),
            false
        );?>

    <div class="main_container page">
        <div class="mn_container">
            <div class="mn_content">
                <div class="main_post">
                    <div class="main_title">
                        <p class="title"><?$APPLICATION->ShowTitle(); ?></p>
                    </div>