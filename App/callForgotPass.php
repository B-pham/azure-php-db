<?php
    namespace App;
    require '/home/site/wwwroot/app/ForgotPass.php';
    
    $email = $_POST["passwordResetEmailPost"];
    
    try{
        $forgotPass = new ForgotPass();
        $forgotPass -> SendEmail($email);

    }catch(Exception $e){
        print("Error sending email.");
        die(print_r($e));
    }

?>