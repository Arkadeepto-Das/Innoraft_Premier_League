<?php
  require_once 'vendor/autoload.php';

  use classes\Database;
  use classes\Validation;

  $emailId = $_POST["emailId"];
  $password = $_POST["password"];
  $query = new Database();
  $validate = new Validation();
  $userDetails = $query->userDetails($emailId);
  $response = [];
  if ($validate->emailValidation($emailId) === TRUE) {
    $response['status'] = 0;
    $response['emailId'] = "Email-ID format is incorrect.";
    print_r(json_encode($response));
  }
  elseif ($userDetails === NULL || $emailId != $userDetails["email_id"]) {
    $response['status'] = 0;
    $response['emailId'] = "Email-ID doesn't exist.";
    print_r(json_encode($response));
  }
  elseif ($validate->passwordValidation($password) === FALSE) {
    $response['status'] = 0;
    $response['password'] = "Password should be of min 8 characters with atleast 1 uppercase, 1 lowercase, 1 digit and 1 special character.";
    print_r(json_encode($response));
  }
  elseif ($password != $userDetails["password"]) {
    $response['status'] = 0;
    $response['password'] = "Incorrect password";
    print_r(json_encode($response));
  }
  else {
    $response['status'] = 1;
    $response['role'] = $userDetails["role"];
    print_r(json_encode($response));
  }

