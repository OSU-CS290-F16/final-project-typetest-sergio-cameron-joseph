<?php



	require_once 'core/init.php';
	
	if (!$username = Input::get('user')) 
	{
		
		Redirect::to('index.php');
		
	} 
	else 
	{
		
		$user = new User($username);
		
		if (!$user->exists()) 
		{
			
			Redirect::to(404);
			
		} 
		else
		{
			
			$data = $user->data();
			
		}
		
		
		
?>


	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTest.css" media="screen">
	<script scr="script.js"></script>

  </head>
  <body>
    <header>
  	<nav>
        <ul class="navbar-list">
        	<li class="navbar-item header">Type Tester</li>
			<li class="navbar-item navbar-right"><a href = "logout.php">Logout</a></li>			
        	<li class="navbar-item navbar-right"><a href="leaderboard.html">Leaderboard</a></li>	
        	<li class="navbar-item navbar-right"><a href="index.php">Home</a></li>			
    	</ul>
    </nav>
    </header>

    <main>
		<form action = "" method = "post">
			<div class="container">
				<h3 class="center"><?php echo escape($data->username); ?></h3>
				<p>Full Name: <?php echo escape($data->name); ?></p>
				<p class="change-pass"><a href = "changepassword.php">Change password</a></p>
				<p class="change-info"><a href = "update.php">Change account info</a><p>
			</div>
		<form>
    </main>

    <footer>
    	<div class="footerText">
        	Created by 12 Inc.
    	</div>
    </footer>
    
  </body>
</html>

	
	
<?php



	}
	
	
	
?>