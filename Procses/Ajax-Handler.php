<?php
include '../Bootstrap/init.php';
if (!isAjaxRequest()) {
    Msg("Request Time Out");
    die();
}
if (!isset($_POST['action']) || empty($_POST['action'])) {
    Msg("action Con not be empty");
}

switch ($_POST['action']) {
    case "addFolder";
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            Msg('folderName Con not less than 3 word');
            die();

        }
        echo addFolders($_POST['folderName']);

        break;
    case "addTask";
    if ($_POST['folderId'] == 0){
        Msg('Select Folder !!!');
    }else{
        if (strlen($_POST['TaskName'] < 3 )){
            Msg('Task Title Con not less than 3 word !!');
            die();
        }else{
            echo addTask($_POST['TaskName'],$_POST['folderId']);
        }
    }
}




