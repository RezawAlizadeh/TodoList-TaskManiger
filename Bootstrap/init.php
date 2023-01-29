<?php
session_start();
include "constant.php";
include BASE_URL.'/Libs/helper.php';
include BASE_URL."/Bootstrap/config.php";

try {
    $conn=new  PDO("mysql:dbname=$config->dbName;host={$config->host}",$config->username,$config->password);

}catch (PDOException $Error){
    echoLine("Connection Error : Error : ".$Error->getMessage().$Error->getLine());
}

include BASE_URL."/Libs/lib-auth.php";
include BASE_URL."/Libs/lib-task.php";
