<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME"        => Loc::getMessage("CATALOGS_COMPONENT_NAME"),
    "DESCRIPTION" => Loc::getMessage("CATALOGS_COMPONENT_DESC"),
    "COMPLEX"     => "N",
    "PATH" => [
        "ID"   => "example",
        "NAME" => Loc::getMessage("CATALOGS_COMPONENT_PATH_NAME")
    ]
];