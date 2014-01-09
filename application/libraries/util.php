<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 1/4/13
 * Time: 3:49 PM
 * To change this template use File | Settings | File Templates.
 */

class Util
{
    public static function convertToAbsoluteURL($filePath)
    {
        return path('public') . ltrim($filePath, "/");
    }
}