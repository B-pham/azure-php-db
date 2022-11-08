<?php  

    print("Hello World!". "<br>");
    
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print("connected to the server!". "<br>");
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    $username = $_POST["usernamePost"];
    $password = $_POST["passwordPost"];
    $accessCode = $_POST["accessCodePost"];

    try {
        $sql = "INSERT INTO loginData (username, password, accessCode)
            Values('".$username."', '".$password."', '".$accessCode."')";
        if($conn->query($sql) === TRUE){
            echo "Account Created!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    catch(PDOException $e){
        print("Error adding user in database.");
        die(print_r($e));
    }
?>