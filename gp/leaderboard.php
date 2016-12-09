<?php



	require_once 'core/init.php';
	
	if (Session::exists('home')) 
	{
		
		echo Session::flash('home');
		
	}

	$user = new User();
	
	if ($user->isLoggedIn()) 
	{
		
		$link = mysql_connect("127.0.0.1", "root", "");
		mysql_select_db("users", $link);
		
		$query = "SELECT * FROM `leaderboard` ORDER BY score DESC LIMIT 10";

		$res = mysql_query($query, $link);

		$results = array();
		while($line = mysql_fetch_array($res, MYSQL_ASSOC)){
			$results[] = $line;
		}
		
		$count = mysql_num_rows($res);
		
		
?>


	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTest.css" media="screen">

  </head>
   <body>
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
		<form>
			<div class = "container">			
				<table>
					<tr>
						<th>Rank</th>
						<th>Username</th>
						<th>WPM</th>
						<th>Date</th>
					</tr>
					<tr>
						<td>1</td>
						<td><?php if($count > 0){ echo $results[0]['username']; } ?></td>
						<td><?php if($count > 0){ echo $results[0]['score']; } ?></td>
						<td><?php if($count > 0){ echo $results[0]['dates']; } ?></td>					
					</tr>
					<tr>
						<td>2</td>
						<td><?php if($count > 1){ echo $results[1]['username']; } ?></td>
						<td><?php if($count > 1){ echo $results[1]['score']; } ?></td>
						<td><?php if($count > 1){ echo $results[1]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>3</td>
						<td><?php if($count > 2){ echo $results[2]['username']; } ?></td>
						<td><?php if($count > 2){ echo $results[2]['score']; } ?></td>
						<td><?php if($count > 2){ echo $results[2]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>3</td>
						<td><?php if($count > 3){ echo $results[3]['username']; } ?></td>
						<td><?php if($count > 3){ echo $results[3]['score']; } ?></td>
						<td><?php if($count > 3){ echo $results[3]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>4</td>
						<td><?php if($count > 4){ echo $results[4]['username']; } ?></td>
						<td><?php if($count > 4){ echo $results[4]['score']; } ?></td>
						<td><?php if($count > 4){ echo $results[4]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>5</td>
						<td><?php if($count > 5){ echo $results[5]['username']; } ?></td>
						<td><?php if($count > 5){ echo $results[5]['score']; } ?></td>
						<td><?php if($count > 5){ echo $results[5]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>6</td>
						<td><?php if($count > 6){ echo $results[6]['username']; } ?></td>
						<td><?php if($count > 6){ echo $results[6]['score']; } ?></td>
						<td><?php if($count > 6){ echo $results[6]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>8</td>
						<td><?php if($count > 7){ echo $results[7]['username']; } ?></td>
						<td><?php if($count > 7){ echo $results[7]['score']; } ?></td>
						<td><?php if($count > 7){ echo $results[7]['dates']; } ?></td>								
					</tr>
					<tr>
						<td>9</td>
						<td><?php if($count > 8){ echo $results[8]['username']; } ?></td>
						<td><?php if($count > 8){ echo $results[8]['score']; } ?></td>
						<td><?php if($count > 8){ echo $results[8]['dates']; } ?></td>								
					</tr>
					<tr>
						<td>10</td>
						<td><?php if($count > 9){ echo $results[9]['username']; } ?></td>
						<td><?php if($count > 9){ echo $results[9]['score']; } ?></td>
						<td><?php if($count > 9){ echo $results[9]['dates']; } ?></td>							
					</tr>
					</table> 
				<input type = "hidden" name = "token" value = "<?php echo Token::generate(); ?>"/>
			</div>
		</form>	
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
		
		$link = mysql_connect("127.0.0.1", "root", "");
		mysql_select_db("users", $link);
		
		$query = "SELECT * FROM `leaderboard` ORDER BY score DESC LIMIT 10";

		$res = mysql_query($query, $link);

		$results = array();
		while($line = mysql_fetch_array($res, MYSQL_ASSOC)){
			$results[] = $line;
		}
		
		$count = mysql_num_rows($res);

?>


	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Type Tester</title>

    <link rel="stylesheet" href="typeTest.css" media="screen">

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
		<form>
			<div class = "container">			
				<table>
					<tr>
						<th>Rank</th>
						<th>Username</th>
						<th>WPM</th>
						<th>date</th>
					</tr>
					<tr>
						<td>1</td>
						<td><?php if($count > 0){ echo $results[0]['username']; } ?></td>
						<td><?php if($count > 0){ echo $results[0]['score']; } ?></td>
						<td><?php if($count > 0){ echo $results[0]['dates']; } ?></td>					
					</tr>
					<tr>
						<td>2</td>
						<td><?php if($count > 1){ echo $results[1]['username']; } ?></td>
						<td><?php if($count > 1){ echo $results[1]['score']; } ?></td>
						<td><?php if($count > 1){ echo $results[1]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>3</td>
						<td><?php if($count > 2){ echo $results[2]['username']; } ?></td>
						<td><?php if($count > 2){ echo $results[2]['score']; } ?></td>
						<td><?php if($count > 2){ echo $results[2]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>3</td>
						<td><?php if($count > 3){ echo $results[3]['username']; } ?></td>
						<td><?php if($count > 3){ echo $results[3]['score']; } ?></td>
						<td><?php if($count > 3){ echo $results[3]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>4</td>
						<td><?php if($count > 4){ echo $results[4]['username']; } ?></td>
						<td><?php if($count > 4){ echo $results[4]['score']; } ?></td>
						<td><?php if($count > 4){ echo $results[4]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>5</td>
						<td><?php if($count > 5){ echo $results[5]['username']; } ?></td>
						<td><?php if($count > 5){ echo $results[5]['score']; } ?></td>
						<td><?php if($count > 5){ echo $results[5]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>6</td>
						<td><?php if($count > 6){ echo $results[6]['username']; } ?></td>
						<td><?php if($count > 6){ echo $results[6]['score']; } ?></td>
						<td><?php if($count > 6){ echo $results[6]['dates']; } ?></td>						
					</tr>
					<tr>
						<td>8</td>
						<td><?php if($count > 7){ echo $results[7]['username']; } ?></td>
						<td><?php if($count > 7){ echo $results[7]['score']; } ?></td>
						<td><?php if($count > 7){ echo $results[7]['dates']; } ?></td>								
					</tr>
					<tr>
						<td>9</td>
						<td><?php if($count > 8){ echo $results[8]['username']; } ?></td>
						<td><?php if($count > 8){ echo $results[8]['score']; } ?></td>
						<td><?php if($count > 8){ echo $results[8]['dates']; } ?></td>								
					</tr>
					<tr>
						<td>10</td>
						<td><?php if($count > 9){ echo $results[9]['username']; } ?></td>
						<td><?php if($count > 9){ echo $results[9]['score']; } ?></td>
						<td><?php if($count > 9){ echo $results[9]['dates']; } ?></td>							
					</tr>
					</table> 
				<input type = "hidden" name = "token" value = "<?php echo Token::generate(); ?>"/>
			</div>
		</form>	
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