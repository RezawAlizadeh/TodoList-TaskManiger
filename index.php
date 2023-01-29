<?php
include "Bootstrap/init.php";
if (isset($_GET['logout'])){
    Logout();
}
if (!isLogged()){
    header('Location:http://localhost/Mp/Tpl/tpl-auth.php');
}

if (isset($_GET['folder_Id']) && is_numeric($_GET['folder_Id'])){
    removeFolder($_GET['folder_Id']);
}

if (isset($_GET['TaskId']) && is_numeric($_GET['TaskId'])){
    removeTask($_GET['TaskId']);
}
$user=getUserLogged();
$Folders=getFolders();

$Tasks=getTasks();







include "Tpl/tpl-index.php";