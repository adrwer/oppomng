<?php

 if(isset($_POST["forgotpass"])) {
    $conn = mysqli_connect("localhost", "root", "", "oppomng");
    if(!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    echo "connection successful <br>";

    $email = mysqli_real_escape_string($conn,$_POST['username']);


    $sql = "SELECT id FROM users WHERE email='$email'";
    $data = mysqli_query($conn,$sql);

    if(mysqli_num_rows($data)>0) {
        $str =  "0123456789qwertyuiopasdfghjklzxcvbnm";
        $str = str_shuffle($str);
        $str = substr($str, 0, 10);
        $url = "http://localhost/oppomng/resetpassword.php?token=$str&email=$email";



        $sql = "UPDATE users SET token = '$str' WHERE email='$email'";
        mysqli_query($conn,$sql);
      //  mail($email, "RESET PASSWORD", "Click on the link to recover your password: $url", "From: test@localhost.com\r\n");
        echo "Please check your email for the link";
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
<form class="center form-inline" method="post" action="forgotpassword.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input class="form-control" type="email" name="username" placeholder="Email">
    </div>
    <button type="submit" class="btn btn-default" name="forgotpass">Send Link</button>
</form>

</body>
</html>
