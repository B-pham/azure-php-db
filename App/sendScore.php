<?php
    namespace app;

    $email = $_POST["professorEmailPost"];
    $test = $_POST["testNamePost"];
    $user = $_POST["userNamePost"];
    $score = $_POST["testScorePost"];

    print("This is a test text.");
    try{
        $emailScore = new emailScore();
        $emailScore -> SendEmail($email, $test, $user, $score);
    }catch(PDOException $e){
        print("Error sending email.");
        die(print_r($e));
    }
?>