<?php  
    print("Hello World!");
    
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print("connected to the server!");
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        print("Hello, This is Test")
        die(print_r($e));
    }

    $loginUser = $_POST["LoginUser"];
    $loginPass = $_POST["LoginPass"];

    try {
        $sql = "SELECT password FROM loginData WHERE username = '". $loginUser ."'";
        $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
        $loginResult = $temp->fetch(PDO::FETCH_ASSOC);//Sort rows into arrays
        //$loginResult-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($loginPass == $loginResult['password']){//Check array against entered info
            print("Password is correct!");
        }
    
    }
    catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

    /*$sql = "SELECT Password FROM login Where Username = '". $loginUser . "'";

    $result = $conn->query($sql);

    if($result -> num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if($row["Password"] == $loginPass)
            {echo "Sucessful Login and Connection!!";}
        }
    }
    else
    {echo "Sucessful connection, but failed login.";}*/

?>