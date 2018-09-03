<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	class LoginAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
            $this->wrongLogin = false;
             if (isset($_POST["user"]) && isset($_POST["pwd"]) ) {
                // https://stackoverflow.com/questions/2109325/how-to-strip-all-spaces-out-of-a-string-in-php
                $username = preg_replace('/\s+/', '', $_POST["user"]);
                $user = UserDAO::authenticate($username, $_POST["pwd"]);
                
                if (!empty($user)) {
                    $_SESSION["visibility"] =   $user["USER_RANK"];
                    $_SESSION["username"] =     $user["USER_NAME"];
                    header("location:admin.php");
                    exit;
                }
                else {
                    $this->wrongLogin = true;
                }
            }
            else if (isset($_GET['tk']) && !empty($_GET['tk'])){
                $this->validateTk($_GET['tk']);
            }
            else if (isset($_POST["token"]) && !empty($_POST["token"])) {
                $this->validateTk($_POST["token"]);
            }
        }
        // Verifies token validity
        protected function validateTk($token) {
            $reponsetoken = UserDAO::validateToken($token);
            // if valid, returns date object
            if (!empty($reponsetoken)) {
                // checks if token is still valid
                if ($reponsetoken >= time()){
                    $_SESSION["token"] =   $token;
                    $_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
                    header("location:cv.php");
                    exit;
                }
            }
            else {
                $this->wrongLogin = true;
            }
        }
    }	
