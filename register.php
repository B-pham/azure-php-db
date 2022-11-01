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

    $ID = "5";
    $username = "Justinnnn";
    $password = "password1234";
    $accessCode = "1234";

    /*try {
        $sql = "SELECT password FROM loginData WHERE username = '". $loginUser ."'";
        $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
        $loginResult = $temp->fetch(PDO::FETCH_ASSOC);//Sort rows into arrays
        //$loginResult-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($loginPass == $loginResult['password']){//Check array against entered info
            print("Password is correct!". "<br>");
        }
    }

    catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }*/

    try {
        $sql = "INSERT INTO loginData (ID, username, password, accessCode)
            Values('".$ID."', '".$username."', '".$password."', '".$accessCode."')";
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