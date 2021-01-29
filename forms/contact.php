<?php

    $result="";
	if(isset($_POST['submit'])){
        require '../assets/vendor/php-email-form/PHPMailerAutoload.php';
        
        $mail = new PHPMailer;

        $mail->HOST='smtp.ssingularity.in'; //Enter your host
        $mail->SMTPSecure='tls';
        $mail->PORT=587;//Enter the port of your webmail
        $mail->SMTPAuth=true;
        $mail->Username='sunny@ssingularity.in'; //Your email from which the mail will be send
        $mail->Password=''; //The Pasword of your mail

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('your mail');//Enter your receiving email
        $mail->addReplyTo($_POST['email'],$_POST['name']);

        $mail->isHTML(true);
        $mail->Subject='Form Submission: ' .$_POST['subject'];
        $mail->Body='<h1 align=center>Name :' .$_POST['name'].'<br> Email :'.$_POST['email'].'<br> Message :' .$_POST['message']. 
        '</h1>';

        if(!$mail->send()){
            $result ="Something went wrong. Please try again later.";
        }
        else{
            $result="Thanks for writing us".$_POST['name'];
        }

    }
    
?>
