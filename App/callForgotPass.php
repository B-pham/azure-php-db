<?php
    namespace App;
    require '/home/site/wwwroot/app/ForgotPass.php';
    
    $email = $_POST["passwordResetEmailPost"];
    $verificationCode = $_POST["verificationCodePost"];
    
    try{
        $forgotPass = new ForgotPass();
        $forgotPassMessage = $forgotPass -> SendEmail($email, $verificationCode);
        print($forgotPassMessage);
        
    }catch(Exception $e){
        print("Error sending email.");
        die(print_r($e));
    }

?>