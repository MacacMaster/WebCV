<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/DAO/Connection.php");
	class IndexDAO {

		public static function getIndexData($lang) {
			// language validation
			$index = null;
			try{
				$lang = IndexDAO::checkLang($lang);
				$connection = Connection::getConnection();
				$statement = $connection->prepare("SELECT * FROM SITECONTENT WHERE lang = ?");
				$statement->bindParam(1, $lang);
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				$statement->execute();
				$index = $statement->fetch();
			}
			catch(Exception $e){
				$_SESSION['error'] = "Could not access DB";
			}
			return $index;
		}
		public static function getProjectsData($lang) {
			$projects = null;
			try{
				// language validation
				$lang = IndexDAO::checkLang($lang);
				$connection = Connection::getConnection();
				// get max 6 projects
				$statement = $connection->prepare("SELECT * FROM PROJECTS WHERE ROWNUM <= 6 AND lang = ? ");
				$statement->bindParam(1, $lang);
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				$statement->execute();
				$projects = $statement->fetchAll();
			}
			catch(Exception $e){
				$_SESSION['error'] = "Could not access DB";
			}
			return $projects;
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