<?php
#------- User Register ------


function Register($UserData)
{
    global $conn;
    $username = $UserData['username'];
    $email = $UserData['email'];
    $password = $UserData['password'];
    #------ username Validation ------
    if (strlen($username) < 3) {
        ErrorMsg("Username con not less than 3 word");
    } else {

        if (empty($username)) {
            ErrorMsg("User name con not Empty!!!");
        } else {
            if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                ErrorMsg("Username Not Valid");
            } else {

                #------ Email Validation ------

                if (empty($email)) {
                    ErrorMsg("Email con not empty");
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        ErrorMsg("Email Not Valid");
                    } else {

                        #------Password Validation-----
                        if (strlen($password) < 3) {
                            ErrorMsg("password con not less than 3 word");
                        } else {
                            if (empty($password)) {
                                ErrorMsg('Password Not Valid');
                            } else {
                                if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
                                    ErrorMsg("Password Not valid");
                                } else {
                                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                                    $query = "INSERT INTO `users`(`username`,`password`,`email`) VALUES (:username , :password ,:email)";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute(['username' => $username, 'password' => $password_hash, 'email' => $email]);
                                    $result = $stmt->rowCount();
                                    if ($result) {
                                        header("Location:http://localhost/Mp/Tpl/tpl-auth.php");
                                    }

                                }

                            }
                        }
                    }
                }
            }
        }
    }
}


#------- User Login ------
function isLogged()
{
    if (isset($_SESSION['Login'])) {
        return true;
    } else {
        return false;

    }
}



function getCurrentUserId()
{

  return getUserLogged()->id;
}

function getUserLogged(){
    return $_SESSION['Login'] ?? null;
}

function getUserByEmail($email)
{
    global $conn;
    $query = "SELECT * FROM  `users` WHERE email=:email";
    $stmt = $conn->prepare($query);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result[0] ?? null;

}

function Login($email, $password)
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
       return  false;
    } else {
        if (password_verify($password, $user->password)) {
            $user->img = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)));
            $_SESSION['Login'] = $user;
            return true;
        }else{
            return false;
        }
    }

}

#-------Log out User -------
function Logout(){
    unset($_SESSION['Login']);
}











