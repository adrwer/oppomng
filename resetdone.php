<?php
if(isset($_POST["resetpass"])) {
    $conn = mysqli_connect("localhost", "root", "", "oppomng");
    if(!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    echo "connection successful <br>";

    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $pass = $_POST['pass'];
    $confirmpass =$_POST['confirmpass'];

    if($pass == $confirmpass){
      $sql = "UPDATE users SET token = ' ',password = '$pass' WHERE email='$email'";
      mysqli_query($conn,$sql);
      echo "Password set";
    } else {
      echo "Passwords do not match";
    }
}
?>
