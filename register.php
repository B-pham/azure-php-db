<?php  
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print("Connected to the server!". "<br>");
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
        $conn->query($sql);
        echo "Account Created!" . "<br>";
        echo $sql . "<br>"
    }

    catch(PDOException $e){
        print("Error adding user in database.");
        die(print_r($e));
    }
?>