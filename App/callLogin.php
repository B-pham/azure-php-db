<?php
    namespace App;
    
    $email = $_POST["emailPOST"];
    $password = $_POST["passwordPOST"];

    $login = new Login();
    try{
        print($login -> LoginCheck($email, $password));
    }catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

?>