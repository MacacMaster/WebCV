<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/DAO/Connection.php");
	class AdminDAO {
		public static function sendProjectData($project_name, $project_description, $project_image, $project_technologies, $project_lang) {
			// language validation
			$sent = null;
			try{
                $connection = Connection::getConnection();
				$statement = $connection->prepare("CALL addProject(:name,:description,:imagelocation,:technologies,:lang)");
                $statement->bindParam(':name', $project_name);
                $statement->bindParam(':description', $project_description);
                $statement->bindParam(':imagelocation', $project_image);
                $statement->bindParam(':technologies', $project_technologies);
                $statement->bindParam(':lang', $project_lang);
                $sent = $statement->execute();
                $_SESSION['adminstats'] = 'Project sent to DB';
			}
			catch(Exception $e){
				$_SESSION['error'] = "Could not access DB";
			}
			return $sent;
        }
		
		public static function changeSiteContent($content_title, $content_description_1, $content_description_2, $content_lang){
			// language validation
			$sent = null;
			try{
                $connection = Connection::getConnection();
				$statement = $connection->prepare(
					"CALL changeSiteContent(:content_title, :content_description_1, :content_description_2, :lang)"
				);
                $statement->bindParam(':content_title', $content_title);
                $statement->bindParam(':content_description_1', $content_description_1);
                $statement->bindParam(':content_description_2', $content_description_2);
                $statement->bindParam(':lang', $content_lang);
                $sent = $statement->execute();
                $_SESSION['adminstats'] = 'New content sent to DB';
			}
			catch(Exception $e){
				$_SESSION['error'] = "Could not access DB";
			}
			return $sent;
        }
		// writes token to db
        public static function newToken($email,$token) {
            // language validation
            $state = true;
			try{
				$connection = Connection::getConnection();
				$statement = $connection->prepare("CALL newToken(?,?)");
				$statement->bindParam(1, $token);
				$statement->bindParam(2, $email);
				$statement->execute();
			}
			catch(Exception $e){
                $_SESSION['error'] = "Could not access DB";
                $state = false;
			}
			return $state;
        }
	}