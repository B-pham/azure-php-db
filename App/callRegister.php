<?php
    namespace App;
    require '/home/site/wwwroot/app/register.php';
    
    $email = $_POST["emailPost"];
    $password = $_POST["passwordPost"];
    $accessCode = $_POST["accessCodePost"];

    try{
        $register = new Register();
        $register -> RegisterUser($email, $password, $accessCode);

    }catch(Exception $e){
        print("Error sending email.");
        die(print_r($e));
    }

?>