<?php
// Log notifier for XCron
// Creates status log files in /tmp when triggered
// rwisner@tucsonfestivalofbooks.org

  class XCronNotifier_logtmp
  {
    public function CheckValid(&$notifyinfo)
    {
      if (isset($notifyinfo["error_limit"]) && !is_int($notifyinfo["error_limit"]))  return array("success" => false, "error" => "Invalid 'error_limit'.  Expected an integer.", "errorcode" => "invalid_error_limit");
      return array("success" => true);
    }

    public function Notify($notifykey, &$notifyinfo, $numerrors, &$sinfo, $schedulekey, $name, $userdisp, $data)
    {
      $body = (isset($data["success"]) ? ($data["success"] ? "Success" : "Failure") : "Other");

      $log = "/tmp/" . $userdisp . "--" . $name . ".log";

      // build the command to execute
      $cmd = "/usr/bin/echo";
      $cmd .= " " . $body;
      $cmd .= " > " . $log;

      // execute the command
      $output = shell_exec($cmd);

      return array("success" => true);
    }
  }
?>
