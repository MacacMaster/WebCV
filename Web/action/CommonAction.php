<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
* CommonAction based on Fred's Code
*--------------------------------------------------- */
	session_start();
	require_once("action/DAO/Constants.php");

	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_MODERATOR = 2;
		public static $VISIBILITY_ADMINISTRATOR = 3;

		private $pageVisibility;
		private $redirectLocation;
		
		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
			$this->redirectLocation = "location:login";
		}

		public function execute() {
			if (isset($_GET["logout"])) {
				session_unset();
				session_destroy();
				session_start();
			}

			if (!isset($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] < $this->pageVisibility) {
				header($this->redirectLocation);
				exit;
			}

			$this->executeAction();
		}

		public function setRedirect($loc){
			$this->redirectLocation = "location:".$loc;
		}
		public function getUsername() {
			return !$this->isLoggedIn() ? "Invité" : $_SESSION["username"];
		}

		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}

		public function genPassword($pwd) {
			// generate password
    		return password_hash($pwd,PASSWORD_DEFAULT);
		}

		abstract protected function executeAction();
	}