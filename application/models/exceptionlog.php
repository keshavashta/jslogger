<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 29/3/13
 * Time: 10:13 PM
 * To change this template use File | Settings | File Templates.
 */

class ExceptionLog extends Eloquent
{

    public static $table = "exception_logs";

    public function project()
    {
        return $this->belongs_to('Project');
    }
}