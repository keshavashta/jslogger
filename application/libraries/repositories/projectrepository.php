<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 30/3/13
 * Time: 8:10 AM
 * To change this template use File | Settings | File Templates.
 */

class ProjectRepository
{

    public function getProjectId($key)
    {
        $id = DB::table('projects')->where('project_key', '=', $key)->only('id');
        return $id;
    }

}