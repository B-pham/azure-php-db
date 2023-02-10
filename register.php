<?php  
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr.database.windows.net,1433; Database = KVR_Database", "CloudSAf20f247f", " Konnectvr2023");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }


    //Insert Data into Database
    $email = $_POST["emailPost"];
    $password = $_POST["passwordPost"];
    $accessCode = $_POST["accessCodePost"];

    try {
        $sql = "INSERT INTO loginData (email, password, accessCode)
            Values('".$email."', '".$password."', '".$accessCode."')";
        $conn -> query($sql);
        echo "Success adding user to database!";
    }

    catch(PDOException $e){
        print("Error adding user to database.");
        die();
    }
?>