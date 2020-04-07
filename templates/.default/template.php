<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalogs hidden">
    <div class="row no-gutters justify-content-center">
        <div class="col-xl-6">
            <div class="row no-gutters">
                <?foreach ($arResult['ITEMS'] as $arItem):?>
                    <div class="col-sm-6">
                        <div class="catalogs-item big-m-b">
                            <picture>
                                <source type="image/webp" srcset="<?=$arItem["PREVIEW_PICTURE_WEBP"]?>">
                                <img src="<?=$arItem["PREVIEW_PICTURE_SRC"]?>" alt="main-banner">
                            </picture>
                            <div class="d-flex flex-wrap p-lr">
                                <div class="catalogs-title uppercase"><?=$arItem['NAME']?></div>
                                <p><?=$arItem['PREVIEW_TEXT']?></p>
                                <?if(isset($arItem['PROPERTY_LINK_VALUE'])):?>
                                    <a target="_blank" href="<?=$arItem['PROPERTY_LINK_VALUE'];?>" class="but">Посмотреть и скачать</a>
                                <?endif;?>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
 </div>
