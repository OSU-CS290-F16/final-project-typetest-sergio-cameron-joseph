<?php



	session_start();
	
	$GLOBALS['configuration'] = array
	(
	
		'mysql' => array
		(
		
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'db' => 'users',
			
		),
		
		'remember' => array
		(
		
			'cookieName' => 'hash',
			'cookieExpiry' => 604800,	//Cookie Expiry 1 Week
			
		),
		
		'session' => array
		(
		
			'sessionName' => 'user',
			'tokenName' => 'token'
			
		)
		
	);
	
	require_once 'classes/Config.php';
	require_once 'classes/Cookie.php';
	require_once 'classes/Database.php';
	require_once 'classes/Hash.php';
	require_once 'classes/Input.php';
	require_once 'classes/Redirect.php';
	require_once 'classes/Session.php';
	require_once 'classes/Token.php';
	require_once 'classes/User.php';
	require_once 'classes/Validate.php';

	require_once 'functions/Sanitize.php';

	if (Cookie::exists(Config::get('remember/cookieName')) && !Session::exists(Config::get('session/sessionName'))) 
	{
		
		$hash = Cookie::get(Config::get('remember/cookieName'));
		$hashCheck = Database::getInstance()->get('usersSessions', array('hash', '=', $hash));
		
		if ($hashCheck->count()) 
		{
			
			$user = new User($hashCheck->first()->userID);
			$user->login();
			
		}
		
	}
	
	
	
?>