<?php 
    
    session_start();
    
    $errors = array();

    // Connect to the database

    $db = mysqli_connect('localhost', 'root', 'password', 'amira');

    //when register button is clicked

    if (isset($_POST['register'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        
        
        
        // if the user exist with same email 
        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        if ($user) { // if user exists
            
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
        
        // if there are no errors then save user to the database
        
        if (count($errors) == 0) {
  	        $password = md5($password);
            
            $sql = "INSERT INTO users (name, email, password) 
                            VALUES ('$name', '$email', '$password')"; 
            
            mysqli_query($db, $sql);
            
           $_SESSION['name'] = "Your account has been successfully created please login now";
  	       header('location: login.php');
            
        }
        
    }

    // LOGIN USER
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
  	    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	    $results = mysqli_query($db, $query);
        
  	    if (mysqli_num_rows($results) == 1) {
  	        $_SESSION['email'] = $email;
  	        $_SESSION['success'] = "You are now logged in";
  	        header('location: index-kenburns.html');
  	    }else {
  		    array_push($errors, "Wrong email or password");
  	    }
    }
}


        //log out
        if (isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['email']);
            header('location: login.php');
        }




?>




