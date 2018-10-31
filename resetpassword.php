<?php

 if(isset($_GET["email"]) && isset($_GET["token"])) {
   $conn = mysqli_connect("localhost", "root", "", "oppomng");
   if(!$conn) {
       die("Connection failed:" . mysqli_connect_error());
   }
   echo "connection successful <br>";

   $email = mysqli_real_escape_string($conn,$_GET['email']);
   $token = mysqli_real_escape_string($conn,$_GET['token']);

   $sql = "SELECT id FROM users WHERE email='$email' AND token='$token'";
   $data = mysqli_query($conn,$sql);

   if(mysqli_num_rows($data)>0) {
      echo "Hi ";
   } else {
       echo "Please check your link!";
   }

 } else {
      // header("Location: index.php");
      // exit();
      echo "No data exists";
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
<?php echo
"<form class='center form-inline' method='post' action='resetdone.php?email=$email'>"
  ?>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="pass" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="password">Confirm Password:</label>
        <input class="form-control" type="password" name="confirmpass" placeholder="Confirm Password">
    </div>
    <button type="submit" class="btn btn-default" name="resetpass">Reset Password</button>
</form>

</body>
</html>
