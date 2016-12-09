<?php



	require_once 'core/init.php';
	
	if (Session::exists('home')) 
	{
		
		echo Session::flash('home');
		
	}

	$user = new User();
	
	if ($user->isLoggedIn()) 
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
   <body onload="words()">
    <header>
  	<nav>
        <ul class="navbar-list">
        	<li class="navbar-item header">Type Tester</li>
			<li class="navbar-item navbar-right"><a href = "logout.php">Logout</a></li>
			<li class="navbar-item navbar-right"><a href = "profile.php?user=<?php echo escape($user->data()->username); ?>">My Account</a></li>			
        	<li class="navbar-item navbar-right"><a href="index.php">Home</a></li>				
    	</ul>
    </nav>
    </header>

    <main>

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
					<a href = 'index.php'>
						Home
					</a>
				</li>				
			</ul>
		</nav>
    </header>

    <main>

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