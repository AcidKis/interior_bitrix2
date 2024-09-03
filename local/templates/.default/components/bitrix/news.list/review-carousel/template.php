<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="rw_reviewed">
    <div class="rw_slider">
        <h4>Отзывы</h4>
        <ul id="foo">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>

                <li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="rw_message">
                        <?if($arItem["PREVIEW_PICTURE"]):?>
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="rw_avatar" alt=""/>
                        <?else:?>
                            <img src="/bitrix/templates/.default/content/8.png" class="rw_avatar" alt=""/>
                        <?endif;?>
                        <span class="rw_name"><?=$arItem["NAME"]?></span>
                        <span class="rw_job"><?=$arItem["PROPERTIES"]["JOB"]["VALUE"]?> <?=$arItem["PROPERTIES"]["COMPANY"]["VALUE"]?></span>
                        <p><?=$arItem["PROPERTIES"]["REVIEW"]["VALUE"]?></p>
                        <div class="clearboth"></div>
                        <div class="rw_arrow"></div>
                    </div>
                </li>
            <?endforeach;?>

        </ul>
        <div id="rwprev"></div>
        <div id="rwnext"></div>
        <a href="" class="rw_allreviewed">Все отзывы</a>
    </div>
</div>