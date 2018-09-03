<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
require_once("action/DAO/Connection.php");
class UserDAO {

    public static function authenticate($username, $pwd) {
        $failbackuser = 'Macac';
        $failbackupwd = 'bob';
        $user = null;
        try{
            $connection = Connection::getConnection();
            $statement = $connection->prepare("SELECT * FROM USERS WHERE user_name = upper(?) ");
            $statement->bindParam(1, $username);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(); 
            
            if ($user = $statement->fetch()) {
                if (!password_verify($pwd, $user["USER_PASSWORD"])) {
                    $user = null;
                }
            }
        }
        catch(Exception $e){
            // failback control
            if(strtoupper($username) === strtoupper($failbackuser) && $pwd === $failbackupwd){
                $_SESSION['error'] = 'FAILBACK ADMIN';
                $user = [];
                $user["USER_RANK"] = 3;
                $user["USER_NAME"] = $username;
            }
        }
        return $user;
    }

    public static function validateToken($token) {
        try{
            $connection = Connection::getConnection();
            $statement = $connection->prepare("SELECT TOKEN_EXPIRATION FROM TOKENS WHERE TOKEN = ?");
            $statement->bindParam(1, $token);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute(); 
            if ($expiration = $statement->fetch()){

            }
        }
        catch(Exception $e){
            $_SESSION['error'] .= ' - catch'.$e;
        }
        return $expiration;
    }

    public static function addUser($username, $pwd) {
        // placeholder
    }

}