<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/CommonAction.php");
	require_once("DAO/IndexDAO.php");

	class IndexAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		//reads
		protected function executeAction() {
			
		}

		public function getText(){
			$INDEX = array();
			// can change lang by get too
			isset($_GET['lang']) ? $_SESSION['lang'] = $_GET['lang'] : null; 
			if(!isset($_SESSION['lang'])){
				// sets initial session language
				if($_SERVER['HTTP_ACCEPT_LANGUAGE']){
					// gets browser lang
					$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
					switch ($lang){
						case "fr":
						//echo "PAGE FR";
						$_SESSION['lang']='fr';//include check session FR
						break;    
						default:
						//echo "PAGE EN - Setting Default";
						$_SESSION['lang']='en';//include EN in all other cases of different lang detection
						break;
					}
				}
				else{
					// if bugged or unsupported browser
					$_SESSION['lang']='en';
				}
			}
			// getindex content
			$INDEX = IndexDAO::getIndexData($_SESSION['lang']);
				
			// if db can't be accessed, failsafe render
			if(empty($INDEX)){
				$INDEX['content_title'] = 				'FullStack Dev - Network Addict - Full-on Unicorn';
				$INDEX['content_description_1'] = 		'An awesome guy that did this with the help of a template';
				$INDEX['content_description_2'] = 		'He never said he was a designer!';
				$INDEX['content_about'] = 				'About me';
				$INDEX['content_cv'] = 					'CV' ;
				$INDEX['content_readcv'] = 				'Read my CV!';
				$INDEX['content_myprojects'] = 			'My Projects';
				$INDEX['content_contactme'] = 			'Contact Me';
				$INDEX['content_form_name'] = 			'Your name';
				$INDEX['content_form_name_error'] = 	'Please enter your name.';
				$INDEX['content_form_email'] =			'Email Address';
				$INDEX['content_form_email_error'] =	'Please enter your email address.';
				$INDEX['content_form_message'] =		'Message';
				$INDEX['content_form_message_error'] =	'Please enter a message.';
				$INDEX['content_form_captcha'] =		'Captcha';
				$INDEX['content_form_captcha_error'] =	'Please enter the captcha.';
				$INDEX['content_close'] =				'Close';

			}
			return array_change_key_case($INDEX, CASE_LOWER);
		}
		public function getProjects(){
			$PROJECTS = array();
			$PROJECTS = IndexDAO::getProjectsData($_SESSION['lang']);
			if(!empty($PROJECTS)){
				// lowers keys
				foreach($PROJECTS as &$p){
					$p = array_change_key_case($p, CASE_LOWER);
				}
				$PROJECTS = array_change_key_case($PROJECTS, CASE_LOWER);
			}
			else{
				// if db can't be accessed, failsafe render
				$PROJECTS['bob']['id'] = '1';
				$PROJECTS['bob']['project_name'] = 			"Project Name";
				$PROJECTS['bob']['project_description'] = 	"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.";
				$PROJECTS['bob']['project_image'] = 		"img/portfolio/placeholder.jpg";
				$PROJECTS['bob']['project_technologies'] = 	'AJAX';
				$PROJECTS['ob']['id'] = '2';
				$PROJECTS['ob']['project_name'] = 			"Project Name";
				$PROJECTS['ob']['project_description'] = 	"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.";
				$PROJECTS['ob']['project_image'] = 			"img/profile.png";
				$PROJECTS['ob']['project_technologies'] = 	'JS';
			}
			return $PROJECTS;
		}
	}	