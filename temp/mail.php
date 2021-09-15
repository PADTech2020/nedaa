<?php

// Process flags
$pass = true; 
$error = null;


if($pass){
    $to ='info@informagene.com ';// $_POST["email"];//;
    $firstname = $_POST["fname"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $firstname." < ".$_POST["email"]."> \r\n"; // Sender's E-mail
$headers .="BCC: abdulhamid@mews.me \r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>Message: '.$text.'</td></tr>
        
    </table>';

    if (mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }
    
}

?>
