<?php
include "Bootstrap/init.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UserData = $_POST;
    if ($_GET['action'] == 'Register') {
        Register($UserData);
    } elseif ($_GET['action'] == 'Login') {
        $result = Login($UserData['email'], $UserData['password']);
        if (!$result) {
            ErrorMsg("Email or Password wrong");
        } else {
            header("Location:http://localhost/Mp/index.php");

        }
    }


}