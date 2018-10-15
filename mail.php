<?php 

      $password = trim($_POST['password']);
      $confirm_password = trim($_POST['confirm_password']);      

      if(empty(trim($_POST['password']))){
          $password_err = "Please enter a password.";     
      } elseif(strlen(trim($_POST['password'])) < 6){
          $password_err = "Password must have atleast 6 characters.";
      } else{
          $password = trim($_POST['password']);
      }
      // Validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = 'Please confirm password.';     
      } else{
          $confirm_password = trim($_POST['confirm_password']);
          if($password != $confirm_password){
              $confirm_password_err = 'Password did not match.';
          }
      }
      // Validate email
      if(empty(trim($_POST['email']))){
          $email_err = "Please enter an email.";     
      } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $email_err = "Invalid email format";
      } else{
          $email = trim($_POST['email']);
      }
      // Validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = 'Please confirm password.';     
      } else{
          $confirm_password = trim($_POST['confirm_password']);
          if($password != $confirm_password){
              $confirm_password_err = 'Password did not match.';
          }
      }

?>