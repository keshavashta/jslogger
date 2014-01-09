<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 30/3/13
 * Time: 12:33 AM
 * To change this template use File | Settings | File Templates.
 */

class Project extends Eloquent
{
    public function exceptionLogs()
    {
        return $this->has_many('ExceptionLog');
    }

    public function users()
    {
        return $this->has_many_and_belongs_to('User','user_project');
    }

}