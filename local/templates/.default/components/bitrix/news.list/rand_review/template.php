<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="news-list">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="sb_reviewed" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if($arItem["PREVIEW_PICTURE"]):?>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="sb_rw_avatar" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"/>
            <?else:?>
                <img src="/bitrix/templates/.default/content/8.png" class="sb_rw_avatar" alt=""/>
            <?endif;?>
            <span class="sb_rw_name"><?=$arItem["NAME"]?></span>
            <?if(isset($arItem["DISPLAY_PROPERTIES"]["JOB"]["VALUE"])):?>
                <span class="sb_rw_job"><?=$arItem["DISPLAY_PROPERTIES"]["JOB"]["VALUE"]?>
                    <?if(isset($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])):?>
                        , <?=$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>
                    <?endif;?>
                </span>
                <br>
            <?endif;?>
            <?if(isset($arItem["DISPLAY_PROPERTIES"]["REVIEW"]["VALUE"])):?>
                <p>“<?=$arItem["DISPLAY_PROPERTIES"]["REVIEW"]["VALUE"]?>”</p>
            <?endif;?>
            <div class="clearboth"></div>
            <div class="sb_rw_arrow"></div>
        </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
