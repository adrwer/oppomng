<?php
    require 'phpmailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPDebug = 2;
    
    $mail->SMTPAuth = true;
    $mail->Username = 'info@jangwaniadventures.co.ke';
    $mail->Password = 'HEHEHE';
    
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('info@jangwaniadventures.co.ke');
    
    $mail->Subject = $_POST['subject'] ;
    $mail->Body = $_POST['message'] ;
    
    if(!$mail->send()) {
        echo 'Message could not be sent.'; 
        echo '<br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else {
            echo 'Message sent successfully';
        }
    
?>

