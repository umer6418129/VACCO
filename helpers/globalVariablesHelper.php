<?php

class globalVariablesHelper
{
    public static $siteTitle =  "VACCO";
    public static $backgroundAuthImage = 'background:url(../../../assets/images/big/auth-bg.jpg) no-repeat center center';
    public static $iconAuthPath = "../../../assets/images/logo-icon.png";

    public static function getTitle($pageTitle) {
        return self::$siteTitle . '-' . $pageTitle;
    }
}

