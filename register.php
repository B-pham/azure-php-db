<?php  
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print("Connected to the server!". "<br>");
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }


    //Insert Data into Database
    $email = $_POST["emailPost"];
    
    $password = $_POST["passwordPost"];
    $encrypted = password_hash($password, PASSWORD_BCRYPT);

    $accessCode = $_POST["accessCodePost"];

    try {
        $sql = "INSERT INTO loginData (email, password, accessCode)
            Values('".$email."', '".$encrypted."', '".$accessCode."')";
        $conn -> query($sql);
        echo "Success adding user to database!";
    }

    catch(PDOException $e){
        print("Error adding user to database.");
        print(".$e. \n" );
        Print(".$encrypted. \n");
        die();
    }
?>