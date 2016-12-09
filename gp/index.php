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
		
		if(Input::get('score') != 0)
		{
			
			$_db->insert('leaderboard', array
			(
				
				'username' => $data->username,
				'score' => Input::get('score'),
				'dates' => date('Y-m-d H:i:s')
				
			));			
			
		}

		
		
?>



<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="style.css" media="screen">

  </head>
  <body>
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
				<span class = "first" word="0" id="first"></span>
				<span word="1" id="second"></span>
                <span word="2" id="third"></span>
                <span word="3" id="fourth"></span>
                <span word="4" id="fifth"></span>
                <span word="5" id="sixth"></span>
                <span word="6" id="seventh"></span>
                <span word="7" id="eighth"></span>
                <span word="8" id="ninth"></span>
                <span word="9" id="tenth"></span>
			</div>
			<span><button id="timer" alt="Click to hide"></button></span>
			<input type="text" id="input" spellcheck="off">
			<span><button id ="f5">F5</button></span>
			<form class = "hidden" action = "" method = "post">
				<input class = "hidden" type = "text" name = "score" id="word-submit" value = "">
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
  
  <script src="array.js"></script>
  <script src="script.js"></script>

	
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

    <link rel="stylesheet" href="style.css" media="screen">

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
			<div class="word-bank">
				<span class = "first" word="0" id="first"></span>
				<span word="1" id="second"></span>
                <span word="2" id="third"></span>
                <span word="3" id="fourth"></span>
                <span word="4" id="fifth"></span>
                <span word="5" id="sixth"></span>
                <span word="6" id="seventh"></span>
                <span word="7" id="eighth"></span>
                <span word="8" id="ninth"></span>
                <span word="9" id="tenth"></span>
			</div>
			<span><button id="timer" alt="Click to hide">60</button></span>
			<input type="text" id="input" spellcheck="off">
			<span><button id ="f5">F5</button></span>
			<form class = "hidden" action = "" method = "post">			
			</form>
		</div>
    </main>

    <footer>
    	<div class="footerText">
        	Created by 12 Inc.
    	</div>
    </footer>
    
  </body>
  
  <script src="array.js"></script>
  <script src="script.js"></script>
  
</html>


	
<?php



	}


	
	
?>



