<?php
#--------add Folders------

function addFolders($folderName)
{
    global $conn;
    $userId = getCurrentUserId();
    $query = "INSERT INTO `folder`(`name`,`user_id`)VALUES (:name,:UserId)";
    $stmt = $conn->prepare($query);
    $stmt->execute(['name' => $folderName, 'UserId' => $userId]);
    return $stmt->rowCount();

}

#--------get Folders------

function getFolders()
{
    global $conn;
    $userId = getCurrentUserId();
    $query="SELECT * FROM `folder` WHERE user_id=:id";
    $stmt=$conn->prepare($query);
    $stmt->execute(['id'=>$userId]);
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;


}

#------- remove Folders ------
function removeFolder($folderId){
    global $conn;
    $query="DELETE FROM `folder` WHERE id=:Id";
    $stmt=$conn->prepare($query);
    $stmt->execute(['Id'=>$folderId]);
    return $stmt->rowCount();
}


#--------add Tasks-------


function addTask($taskTitle,$foldrId){
    global  $conn;
    $userId=getCurrentUserId();
    $query="INSERT INTO `tasks`(`title`,`user_id`,`folder_id`) VALUES (:title , :userId , :folderId)";
    $stmt=$conn->prepare($query);
    $stmt->execute(['title'=>$taskTitle,'folderId'=>$foldrId,'userId'=>$userId]);
    return $stmt->rowCount();
}



#--------get Tasks-------
function getTasks()
{
    global  $conn;
    $folderid=$_GET['FolderId'] ?? null;
    $folderCondition='';
    if (isset($folderid) AND is_numeric($folderid)){
        $folderCondition=$folderid;
    }
    $UserId=getCurrentUserId();
    $query="SELECT * FROM `tasks` WHERE folder_id=:FolderId AND user_id=:UserId";
    $stmt=$conn->prepare($query);
    $stmt->execute(['FolderId'=>$folderCondition , 'UserId'=>$UserId]);
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;

}


#----------- Remove Tasks ----------
function removeTask($taskId){
    global $conn;
    $query="DELETE FROM `tasks` WHERE id=:Id";
    $stmt=$conn->prepare($query);
    $stmt->execute(['Id'=>$taskId]);
    return $stmt->rowCount();
}