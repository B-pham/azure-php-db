<?php
    namespace App;
    require '/home/site/wwwroot/app/Login.php';
    
    $email = $_POST["emailPOST"];
    $password = $_POST["passwordPOST"];

    
    try{
        $login = new Login();
        $loginMessage = $login -> LoginCheck($email, $password);
        print($loginMessage);
    }catch(Exception $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

?>