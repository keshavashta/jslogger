<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 28/3/13
 * Time: 11:19 PM
 * To change this template use File | Settings | File Templates.
 */

class User extends Eloquent
{
    public function set_password($string)
    {
        $this->set_attribute('password', Hash::make($string));
    }

    public function projects()
    {
        return $this->has_many_and_belongs_to('Project','user_project');
    }
}