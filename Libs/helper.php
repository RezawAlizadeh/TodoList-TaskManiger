<?php
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function echoLine($Msg){
    echo "$Msg";
    die();

}

function ErrorMsg($MsgE){
echo  "<script> alert('$MsgE') </script>";
}

function Msg($MSG){
    echo "$MSG";

}