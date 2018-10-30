<?php 
    if(isset($_POST["register"])) {
        $conn = mysqli_connect("localhost", "root", "", "oppomng");
        if(!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        echo "connection successful <br>";
        
        
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);    
        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname','$lastname', '$user', '$pass')";
        
        $data = mysqli_query($conn,$sql);
        
        if($data === false) {
            echo mysqli_error();
        } else {
            echo "New record created succesfully";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Opportunity Management: Register</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
<form class="center form-inline" method="post" action="register.php">
    <div class="form-group ">
        <label for="firstname">First Name:</label>
        <input class="form-control" type="text" name="firstname" placeholder="First Name" required>
    </div>
    <div class="form-group ">
        <label for="lastname">Last Name:</label>
        <input class="form-control" type="text" name="lastname" placeholder="Last Name" required>
    </div>
    <div class="form-group ">
        <label for="username">Username:</label>
        <input class="form-control" type="email" name="username" placeholder="Email" required>
    </div>
    <div class="form-group ">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="pass" placeholder="Password" required>
    </div>
     
    <button type="submit" class="btn btn-default" name="register">Register</button>

</form>    

    <a href="index.php" class="center">Already have an account</a>
    
</body>    
</html>