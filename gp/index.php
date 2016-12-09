<?php



	require_once 'core/init.php';
	
	if (Session::exists('home')) 
	{
		
		echo Session::flash('home');
		
	}

	$user = new User();
	
	if ($user->isLoggedIn()) 
	{
		
		$_db = Database::getInstance();
		$data = $user->data();
						
		$_db->insert('leaderboard', array
		(
						
			'username' => $data->username,
			'score' => Input::get('score')
							
		));						
			
		
?>


	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTest.css" media="screen">
	<script src="script.js"></script>

  </head>
   <body onload="words()">
    <header>
  	<nav>
        <ul class="navbar-list">
        	<li class="navbar-item header">Type Tester</li>
			<li class="navbar-item navbar-right"><a href = "logout.php">Logout</a></li>
			<li class="navbar-item navbar-right"><a href = "profile.php?user=<?php echo escape($user->data()->username); ?>">My Account</a></li>			
        	<li class="navbar-item navbar-right"><a href="leaderboard.php">Leaderboard</a></li>			
    	</ul>
    </nav>
    </header>

    <main>
		<div class="tester">
			<div class="word-bank">
			</div>	
			<span id="timer">Time: 60</span>		
			<span name = "wordcount" id="word-count">Word Count: 0</span>				
			<input onclick="start();" type="text" id="input" spellcheck="off">	
			<form action = "" method = "post">
				<input type = "text" name = "score" id="word-submit" value = "">
				<input type = "submit" value = "Submit Score">				
			</form>
		</div>
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
	else 
	{
		
		

?>


	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTest.css" media="screen">
	<script src="script.js"></script>

  </head>
   <body>
    <header>
		<nav>
			<ul class="navbar-list">
				<li class = "navbar-item header">
					Type Tester
				</li>
				<li class = "navbar-item navbar-right">
					<a href = 'login.php'>
						Login
					</a>
				</li>
				<li class = "navbar-item navbar-right">
					<a href = 'register.php'>
						Register
					</a>
				</li>
				<li class = "navbar-item navbar-right">
					<a href= 'leaderboard.php'>
						Leaderboard
					</a>
				</li>			
			</ul>
		</nav>
    </header>

    <main>
		<div class="tester">
			<div class="word-bank"></div>
			<input type="text" placeholder="Login to take test" id="input" spellcheck="off">
		</div>
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



