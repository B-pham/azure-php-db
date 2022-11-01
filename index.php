<?php  

    $servername = "konnectvr-db.database.windows.net,1433";
    $server_username = "konnectVR";
    $server_password = "TZeu4kAmTK2BWPS";
    $dbName = "konnectVR-Data";

    $username = $_POST["usernamePost"];
    $password = $_POST["passwordPost"];
    $accessCode = $_POST["accessCodePost"];

    $conn = new mysqli($servername, $server_username, $server_password, $dbName);

    if(!$conn){
        die ("Connection Failed". mysqli_connect_error());
    }

    $sql = "INSERT INTO loginData (username, password, accessCode)
        Values('".$username."', '".$password."', '".$accessCode."')";
    $result = mysqli_query($conn, $sql);
    



    /*print("Hello World!". "<br>");
    
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

    $loginUser = $_POST["LoginUser"];
    $loginPass = $_POST["LoginPass"];

    /*iD = "3"
    $username = "Justin";
    $password = "1234abc";
    $accessCode = "1993";
    */

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
    }
    */

   /*sql = "INSERT INTO loginData (iD, username, password, accessCode)
        Values ('".$iD."', '".$username."', '".$password."', '".$accessCode."')";
    $result = mysqli_query($conn, $sql);

    if(!result) echo "Error";
    else echo "Works great!";
    */


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