<?php
session_start();
include('../database/env.php');

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);



// error_validation
$errors = [];


//userName validation

if (empty($name)) {
  $errors['name_error'] = "Name Is Missing.";
}



//email validation

if (empty($email)) {
  $errors['email_error'] = "Email Is Missing.";
}elseif (!$isValidEmail) {
  $errors['email_error'] = "Invalid Email";
}else {
  $id = $_SESSION['auth']['id'];
  $query = "SELECT email FROM users WHERE email = '$email' AND id != '$id' ";
  $result = mysqli_query($connection, $query);

     if ($result ->num_rows > 0){

      $errors['email_error'] = "Email Is Already Available";

     }
    }


if (count($errors) > 0) {

  $_SESSION['errors'] = $errors;
  header('Location: ../dashboard/Profile.php');
}
