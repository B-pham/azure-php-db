<?php  
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print("connected to the server!". "<br>");
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    $email = $_POST["emailPost"];
    $password = $_POST["passwordPost"];

    try {
        $sql = "SELECT * FROM loginData WHERE email = '". $email ."'";
        $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
        $loginResult = $temp->fetch(PDO::FETCH_ASSOC);//Sort rows into arrays
        //$loginResult-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        if($email == $loginResult['email']){//Check array against entered info
            print("Password Reset Link has been sent to Email!");
            print($loginResult['email']);
        }
    }

    catch(PDOException $e){
        print("Error finding Email in database.");
        die(print_r($e));
    }

?>