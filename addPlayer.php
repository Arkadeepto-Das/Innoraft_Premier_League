<?php
  require_once 'vendor/autoload.php';
  use classes\Database;

  if ($_POST["id"] == '' || $_POST["name"] == '' || $_POST["type"] == '' || $_POST["points"] == '') {
    $response["message"] = "All fields should be filled.";
    print_r(json_encode($response));
  }
  else {
    $query = new Database();
    $result = $query->addPlayer($_POST["id"], $_POST["name"], $_POST["type"], $_POST["points"]);
    if ($result === TRUE) {
      $response["message"] = "New player added.";
      print_r(json_encode($response));
    }
    else {
      $response["message"] = "New player was not added.";
      print_r(json_encode($response));  
    }
  }
