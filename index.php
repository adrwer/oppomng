<?php 
    session_start();

    if(isset($_SESSION["username"]) && isset($_SESSION["loggedin"])) {
        
        header("Location: index.php");
        exit();
    }

     if(isset($_POST["create"])) {
        header("Location: register.php");
        exit();
    }

    if(isset($_POST["login"])) {
        $conn=mysqli_connect("localhost", "root", "kijowife", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        
        $sql = "SELECT firstname FROM users WHERE email='$user' AND password='$pass'";
        $data = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($data)>0) {
            $_SESSION["username"] = $user;
            $_SESSION["loggedin"] = 1;
            
            header("Location: welcome.php");
            exit();
        } else {
            echo "Please check your inputs!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Opportunity Management</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
<form class="center form-inline" method="post" action="index.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" type="email" name="username" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="pass" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default" name="login">Log In</button>
    <button type="submit" class="btn btn-default" name="create">Create User Account</button>
</form>    
    
    
</body>    
</html>