<?php 
    include("server.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Login Page</title>

	

	<style>

	</style>

</head>

<body>

	<div class="header">
        <h2>Log in</h2>
    </div>
	
	<form action="login.php" method="post">
   
        <?php include('errors.php'); ?>
        
        <div >   
             <p align="center"><font size=4px color='#00aced'><?php echo $_SESSION['username']; ?></font></p>
        </div>
    
        <div class="input-group">
            <input type="text" name="username" placeholder="user name" required data-validation-required-message>
        </div>
            
        
        <div class="input-group">
            <input type="password" name="password" placeholder="password" required data-validation-required-message>
        </div>
  
        
        <div class="input-group">
            <button type="submit" name="login" class="btn">Log in</button> 
        </div>
        
        <p class="member">
            Not a member yet? <a href="register.php">Sign up</a>
        </p>
    
	    
	</form>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
	</script>

</body>

</html>
