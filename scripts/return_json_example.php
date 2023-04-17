#!/usr/bin/php
<?php

  $xcronErrorCode = 0;
  $xcronErrorMsg = "An error has occurred";
  $xcronHostName = gethostname();
  $xcronFilePath = __FILE__;
  $xcronDateTime = date("Y-m-d H:i:s");

  //
  // put your code here
  //
  // if you want to trigger an xcron notification
  // set $xcronErrorCode to 1 and update $xcronErrorMsg
  //

  if ($xcronErrorCode) {
    $xcronReturn = array(
      "success" => false,
      "errorcode" => $xcronErrorCode,
      "error" => $xcronErrorMsg,
      "stats" => array(
        "success" => 0,
        "failure" => 1
      ),
      "hostname" => $xcronHostName,
      "filepath" => $xcronFilePath,
      "triggered" => $xcronDateTime
    );
    echo json_encode($xcronReturn, JSON_UNESCAPED_SLASHES) . "\n";
    exit();
  }

  $xcronReturn = array(
    "success" => true,
    "stats" => array(
      "success" => 1,
      "failure" => 0
    ),
    "hostname" => $xcronHostName,
    "filepath" => $xcronFilePath,
    "triggered" => $xcronDateTime
  );
  echo json_encode($xcronReturn, JSON_UNESCAPED_SLASHES) . "\n";
  exit();

?>
