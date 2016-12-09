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
				
					'fieldName'	=> 'Username',
					'required' => true
					
				),
				
				'password' => array
				(
				
					'fieldName'	=> 'Password',
					'required' => true
					
				)
				
			));

			if ($validation->passed()) 
			{
				
				$user = new User();
				$remember = (Input::get('remember') === 'on') ? true : false;
				$login = $user->login(Input::get('username'),Input::get('password'), $remember);

				if ($login) 
				{
					
					Redirect::to('index.php');
					
				} 
				else 
				{
					
					echo "Sorry login failed, username or password is incorrect.";
					
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
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTestLogin.css" media="screen">
	<script scr="script.js"></script>

  </head>
  <body>
    <header>
  	<nav>
        <ul class="navbar-list">
        	<li class="navbar-item header">Type Tester</li>
        	<li class="navbar-item navbar-right"><a href="leaderboard.html">Leaderboard</a></li>			
        	<li class="navbar-item navbar-right"><a href="index.php">Home</a></li>
    	</ul>
    </nav>
    </header>

    <main>
		<form action = "" method = "post">
			<div class="container">
				<div class = "field">
					<label for = "username">Username: </label>
					<input type = "text" placeholder="Enter Username" name = "username" id = "username" value = "<?php echo escape(Input::get('username')); ?>" autocomplete = "off"/>
				</div>
				<div class = "field">
					<label for = "password">Password: </label>
					<input type = "password" placeholder="Enter Password" name = "password" id = "password"/>
				</div>
				<input type = "submit" value = "Login"/>		
				<div class = "field">
					<label for = "remember">
						<input type = "checkbox" name = "remember" id = "remember"/> Remember Me
					</label>
				</div>
			</div>
			<input type = "hidden" name = "token" value = "<?php echo Token::generate(); ?>"/>
		</form>
    </main>

    <footer>
    	<div class="footerText">
        	Created by 12 Inc.
    	</div>
    </footer>
    
  </body>
</html>