<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 3/25/13
 * Time: 6:50 PM
 * To change this template use File | Settings | File Templates.
 */
class Logger_Controller extends Base_Controller
{
    public $restful = true;
    private $userRepo;
    private $projectRepo;
    private $exceptionLogRepo;

    public function __construct()
    {
        parent::__construct();
        $this->userRepo = new UserRepository();
        $this->projectRepo = new ProjectRepository();
        $this->exceptionLogRepo = new ExceptionLogRepository();
    }

    public function get_logs()
    {

        $data = $data = Input::all();
        if (empty($data['project_key']))
            return false;

    }

    public function get_log_exception()
    {

        $data = Input::all();
        if (empty($data['project_key']))
            return false;
        //TODO: add validation
        $callback = $data['callback'];
        $projectId = $this->projectRepo->getProjectId($data['project_key']);
        $message = $data['message'];
        $error_type = $data['error_type'];
        $file_name = $data['file_name'];
        $line = $data['line'];
        $date = new DateTime('now');
        $priority = $data['priority'];
        $ip = Request::ip();
        $exceptionLogRepo = new ExceptionLogRepository();
        $exceptionLog = $exceptionLogRepo->insertLog($projectId, $message, $error_type, $file_name, $line, $date, $priority, $ip);
        $jsonResponse = "{\"message\":\"" . $message . "\"}";
        return Response::make($callback . "(" . $jsonResponse . ")", 200, array('content-type' => 'application/javascript'));

    }

    public function get_get($key)
    {
        $throwError = Input::get("t");
        return Response::make(View::make("logger.log")->with(array('key' => $key, 'throwError' => $throwError)), 200, array('content-type' => 'application/javascript'));
    }
}
