<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/CommonAction.php");
	require_once("action/DAO/AdminDAO.php");

	class AdminAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_ADMINISTRATOR);
		}

		protected function executeAction() {
			$_SESSION['adminstats'] ='';
			if (isset($_POST['tokenrequesemail'])){
				if (AdminAction::sendToken($_POST['tokenrequesemail'])){
					$_SESSION['adminstats'] = "token successfully sent";
				}
				else{
					$_SESSION['adminstats'] = "Token not Sent";
				}
			}
			if (isset($_FILES['project_image']) &&
				!empty($_POST['project_name']) &&
				!empty($_POST['project_technologies']) &&
				!empty($_POST['project_description']) &&
				!empty($_POST['project_lang'])){
					AdminAction::sendProject();	
			}
			else{
				$_SESSION['adminstats'] = "Project not Sent";
			}
			if (!empty($_POST['content_title']) &&
				!empty($_POST['content_description_1']) &&
				!empty($_POST['content_description_2']) &&
				!empty($_POST['content_lang'])){
					AdminAction::changeContent();	
				}
			else{
				$_SESSION['adminstats'] = "Content not changed";
			}
		}
		public static function changeContent(){
			AdminDAO::changeSiteContent($_POST['content_title'], $_POST['content_description_1'], $_POST['content_description_2'], $_POST['content_lang']);
		}
		public static function sendToken($emailto){
            if (empty($emailto)){
				return false;
            }            
            $to = strip_tags(htmlspecialchars($emailto));
			// generate random token
			$length = 32;
			$token = bin2hex(random_bytes($length));
			
			// generated token was written in db
			if(AdminDAO::newToken($emailto,$token)){
				// Create the email and send the message
				$email_subject = "marcandreramsay.ca Access Token";
				$email_body = "CV TOKEN : $token\n\n"."Link to website: https://www.marcandreramsay.ca/token?tk=$token";
				$headers = "From: noreply@marcandreramsay.ca\n";
				$headers .= "Reply-To: example@example.com";	
				
				mail($to,$email_subject,$email_body,$headers);		
				return true;
			} 
			return false;
		}

		public static function sendProject(){
			//IMAGE VERIFICATION
			// https://www.w3schools.com/php/php_file_upload.asp
			// max size in bytes
			$maxsize = 5000000;
			$target_dir = "img/portfolio/";
			$imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["project_image"]["name"]),PATHINFO_EXTENSION));
			$target_file = $target_dir . $_POST['project_name'].".".$imageFileType;
			$uploadOk = 1;

			// Check if file already exists
			if (file_exists($target_file)) {
				$_SESSION['adminstats'] .= "\n". "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["project_image"]["size"] > $maxsize) {
				$_SESSION['adminstats'] .= "\n". "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$_SESSION['adminstats'] .= "\n". "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			else{
				// Check if image file is a actual image or fake image
				try{
					$check = getimagesize($_FILES["project_image"]["tmp_name"]);
					if($check !== false) {
						$_SESSION['adminstats'] .= "\n". "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					}
				}
				catch(Exception $e){
					$_SESSION['adminstats'] .= "\n". "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$_SESSION['adminstats'] .= "\n". "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} 
			else {
				//uploads file to server
				if (move_uploaded_file($_FILES["project_image"]["tmp_name"], $target_file)) {
					// sends project to db
					AdminDAO::sendProjectData($_POST['project_name'], $_POST['project_description'], $_POST['project_name'].".".$imageFileType, $_POST['project_technologies'], $_POST['project_lang']);
					$_SESSION['adminstats'] .= "\n". "The file ". basename( $_FILES["project_image"]["name"]). " has been uploaded.";
				} 
				else {
					$_SESSION['adminstats'] .= "\n". "Sorry, there was an error uploading your file.";
				}
			}
		}
	}	