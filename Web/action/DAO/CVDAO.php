<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/DAO/Connection.php");
	class CVDAO {
		public static function getJobsData($lang) {
			// language validation
			$index = null;
			try{
				$lang = CVDAO::checkLang($lang);
				$connection = Connection::getConnection();
				$statement = $connection->prepare("SELECT * FROM VIEWJOBS WHERE lang = ?");
				$statement->bindParam(1, $lang);
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				$statement->execute();
				$jobs = $statement->fetchAll();
			}
			catch(Exception $e){
				$_SESSION['error'] = "Could not access DB";
			}
			return $jobs;
		}
        private static function checkLang($lang){
			switch ($lang){
				case 'en':
				case 'fr': break;
				default: $lang = 'en';
			}
			return $lang;
		}
	}