<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="reviews">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="review-text">
                <div class="review-block-title">
                    <span class="review-block-name"><a href="#"><?=$arItem["NAME"]?></a></span>
                    <span class="review-block-description">
                        <?if(isset($arItem["DISPLAY_PROPERTIES"]["JOB"]["VALUE"])):?>
                            <?=$arItem["DISPLAY_PROPERTIES"]["JOB"]["VALUE"]?>
                        <?endif;?>
                        <?if(isset($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])):?>
                            , <?=$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>
                        <?endif;?>
                    </span>
                </div>
                <div class="review-text-cont">
                    <?if(isset($arItem["DISPLAY_PROPERTIES"]["REVIEW"]["VALUE"])):?>
                        <?=$arItem["DISPLAY_PROPERTIES"]["REVIEW"]["VALUE"]?>
                    <?endif;?>
                </div>
            </div>
            <div class="review-img-wrap">
                <?if($arItem["PREVIEW_PICTURE"]):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img"></a>
                <?else:?>
                    <img src="/bitrix/templates/.default/content/8.png" alt="img">
                <?endif;?>
            </div>
            <div class="clearboth"></div>
        </div>
    <?endforeach;?>
</div>