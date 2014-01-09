<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 30/3/13
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

class ExceptionsLogTest extends PHPUnit_Framework_TestCase
{


    public function testLogException()
    {
//        $user = new User();
//        $user->email = "test@test.com";
//        $user->password = "asdf";
//        $user->save();
//
//        $project = new Project();
//        $project->name = "demo project";
//        $project->url = "http://abc.com";
//        $project->project_key = Str::random(64,"alnum");
//        $project = $user->projects()->insert($project);


        $this->assertTrue(true);
    }

    public function testLogExceptions()
    {
        $user = new User();
        $user->email = "test@test.com";
        $user->password = "asdf";
        $user->save();

        $project = new Project();
        $project->name = "demo project";
        $project->url = "http://abc.com";
        $project->project_key = Str::random(64, "alnum");
        $project->save();

        $user->projects()->attach($project->id);

        $data = array("project_key" => $project->project_key,
            'message' => "Testing",
            "error_type" => "caught",
            'file_name' => "abc.js",
            "line" => 1,
            'date' => date("Y-m-d"),
            'priority' => "info",
        );


        Input::$json = (object)$data;

        Request::setMethod('GET');

        $response = Controller::call('logger@log_exception');

        $this->assertNotNull($response);
        $this->assertEquals(200, $response->status());
        var_dump(count($response->content));
    }


}