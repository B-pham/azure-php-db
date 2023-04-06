<?php
    namespace App;
    

    $email = $_POST["emailPOST"];
    $password = $_POST["passwordPOST"];

    print("This is test text.");
    try{
        $login = new Login();
        $login -> LoginCheck($email, $password);
    }catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

?>