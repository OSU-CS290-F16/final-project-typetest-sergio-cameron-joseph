<?php



	require_once 'core/init.php';

	if (Input::exists()) 
	{
		
		if (Token::check(Input::get('token'))) 
		{
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array
			(
			
				'username' => array
				(
				
					'fieldName' => 'Username',
					'required' => true,
					'min' => 2,
					'max' => 20,
					'unique' => 'users'
					
				),
				'password' => array
				(
				
					'fieldName'	=> 'Password',
					'required' => true,
					'min' => 6
					
				),
				'passwordAgain' => array
				(
				
					'fieldName'	=> 'Password Repeat',
					'required' => true,
					'min' => 6,
					'matches' => 'password'
					
				),
				'name'	=> array
				(
				
					'fieldName'	=> 'Your Name',
					'required' => true,
					'min' => 2,
					'max' => 50
					
				)
				
			));

			if ($validation->passed()) 
			{
				
				$user = new User();
				$salt = Hash::salt(32);
				
				try 
				{
					
					$user->create(array
					(
					
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password'),$salt),
						'salt' => $salt,
						'name' => Input::get('name'),
						'joined' => date('Y-m-d H:i:s'),
						'userGroup'	=> 1
						
					));
					
					Session::flash('home','You have been registered and can now log in');
					Redirect::to('index.php');
					
				} 
				catch (Exception $e) 
				{
					
					die($e->getMessage());
					
				}
				
			} 
			else 
			{
				
				foreach ($validation->errors() as $error) 
				{
					
					echo $error, '<br>';
					
				}
				
			}
			
		}
		
	}
	
	
	
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
    <title>Type Tester</title>

    <link rel = "stylesheet" href = "typeTestLogin.css" media = "screen">
	<script scr = "script.js"></script>

  </head>
  <body>
    <header>
  	<nav>
        <ul class = "navbar-list">
        	<li class = "navbar-item header">Type Tester</li>
        	<li class = "navbar-item navbar-right"><a href = "leaderboard.html">Leaderboard</a></li>			
        	<li class = "navbar-item navbar-right"><a href = "index.php">Home</a></li>
    	</ul>
    </nav>
    </header>

    <main>
		<form action = "" method = "post">
			<div class = "container">			
				<div class = "field">
					<label for = "username">Username: </label>
					<input type = "text" name = "username" placeholder="Enter Username" id = "username" value = "<?php echo escape(Input::get('username')); ?>" autocomplete = "off"/>
				</div>
				<div class = "field">
					<label for = "password">Password: </label>
					<input type = "password" name = "password" placeholder="Enter Password" id = "password"/>
				</div>
				<div class = "field">
					<label for = "password_again">Enter your password again: </label>
					<input type = "password" name = "passwordAgain" placeholder="Confirm Password" id = "passwordAgain"/>
				</div>
				<div class = "field">
					<label for = "name">Name: </label>
					<input type = "text" name = "name" placeholder="Enter Full Name" id = "name" value = "<?php echo escape(Input::get('name')); ?>"/>
				</div>
				<input type = "hidden" name = "token" value = "<?php echo Token::generate(); ?>"/>
				<input type = "submit" value = "Register"/>
			</div>
		</form>
    </main>

    <footer>
    	<div class = "footerText">
        	Created by 12 Inc.
    	</div>
    </footer>
    
  </body>
</html>