<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;
use \Bitrix\Webp\Main;

Loader::includeModule('webp');

class Catalogs extends CBitrixComponent {

    /**
     * Проверка наличия модулей, требуемых для работы компонента
     */
    private function _checkModules() {
        if ( !Loader::includeModule('iblock')) {
            throw new \Exception('Не загружен модуль ИБ, необходимый для работы компонента');
        }
        return true;
    }

    /**
     * Подготовка параметров компонента
     */
    public function onPrepareComponentParams($arParams) {
        $arParams['CACHE_TIME'] = isset($arParams["CACHE_TIME"])
            ? $arParams["CACHE_TIME"]
            : 3600000;
        return $arParams;
    }

    /*
    * Собираем массив элементов в arItems
    */
    public function getItems () {
        $arSelect = Array("NAME", "PROPERTY_LINK", "PROPERTY_TITLE", "PREVIEW_PICTURE", "PREVIEW_TEXT");
        $arFilter = Array("IBLOCK_ID"=>44, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array('SORT' => 'ASC'), $arFilter, $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $preview_picture = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
            $arFields['PREVIEW_PICTURE_SRC']  = $preview_picture;
            $arFields['PREVIEW_PICTURE_WEBP'] = Main::makeWebp($preview_picture);
            $arItems[] = $arFields;
        }
        return $arItems;
    }

    /**
     * Точка входа в компонент
     */
    public function executeComponent() {
        $this->_checkModules();
        if ($this->startResultCache()) {
            $this->arResult['ITEMS'] = $this->getItems();
            $this->includeComponentTemplate();
        }
    }

}