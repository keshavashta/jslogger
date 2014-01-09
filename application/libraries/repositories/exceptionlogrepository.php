<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 30/3/13
 * Time: 8:11 AM
 * To change this template use File | Settings | File Templates.
 */

class ExceptionLogRepository
{


    public function insertLog($projectId, $message, $error_type, $file_name, $line, $date, $priority, $ip)
    {
        $exception_log = new ExceptionLog();
        $exception_log->project_id = $projectId;
        $exception_log->message = $message;
        $exception_log->error_type = $error_type;
        $exception_log->file_name = $file_name;
        $exception_log->line = $line;
        $exception_log->date = $date;
        $exception_log->priority = $priority;
        $exception_log->ip = $ip;
        try {
            $exception_log->save();
        } catch (Exception $e) {
            Log::exception($e);
            return false;
        }
        return $exception_log;

    }

    public function getLogs($projectId)
    {
        $result = DB::table("exception_logs")->where("project_id", "", $projectId)->get();
        return $result;
    }
}