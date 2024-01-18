<?php

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

       //instantiate
       include '../database/Connection.php';
       include '../class/csLogin.php';

       $login = new Login($email, $password);
       $login->logUser();
      
}