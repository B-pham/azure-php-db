<?php
    namespace App;
    
    $email = $_POST["emailPOST"];
    $password = $_POST["passwordPOST"];

    try{
        $login = new Login();
        print($login -> LoginCheck($email, $password));
    }catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

?>