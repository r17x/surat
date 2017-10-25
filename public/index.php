<?php
	session_start();
	require_once(__DIR__.'/../vendor/autoload.php');

	if(isset($_POST)){
		if( isset($_POST['logout']) ) {
			session_destroy();
			header('Refresh: 0');
		}
	}

	
	function main(){
		if(!isset($_SESSION['auth']))
			return 'login';
		return 'main';
	}

	$page = main();

	require($page.'.php');
