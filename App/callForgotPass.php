<?php
    namespace App;
    require '/home/site/wwwroot/app/ForgotPass.php';
    
    $email = $_POST["passwordResetEmailPost"];
    $verificationCode = $_POST["verificationCodePost"];
    
    try{
        $forgotPass = new ForgotPass();
        $forgotPass -> SendEmail($email, $verificationCode);

    }catch(Exception $e){
        print("Error sending email.");
        die(print_r($e));
    }

?>