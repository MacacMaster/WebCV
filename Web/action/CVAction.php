<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	require_once("action/CommonAction.php");
	require_once("DAO/CVDAO.php");

	class CVAction extends CommonAction {
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
		}
		
		public function getJobsData(){
			$jobs = array();
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
			$jobs = CVDAO::getJobsData($_SESSION['lang']);
			if(!empty($jobs)){
				// lowers keys
				foreach($jobs as &$j){
					$j = array_change_key_case($j, CASE_LOWER);
				}
			}
			array_change_key_case($jobs, CASE_LOWER);
			// if db can't be accessed, failsafe render
			if(empty($jobs)){
				$jobs[0]['job_name'] = 				'Full Time Student';
				$jobs[0]['job_description'] = 		'This job mainly consists of studying';
				$jobs[0]['job_image'] = 			"img/portfolio/placeholder.jpg";
				$jobs[0]['job_employer'] = 			'CVM';
				$jobs[0]['job_year'] = 				'2017-2018';
				$jobs[0]['contact_name'] = 			'J-C' ;
				$jobs[0]['contact_email'] = 		'jc@cvm.qc.ca';
				$jobs[0]['contact_phone'] = 		'444-444-4419';
				$jobs[0]['contact_poste'] = 		'Killer Prof';
			}
			return $jobs;
		}	
	}