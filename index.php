<?php
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
    
    // SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "konnectVR", "pwd" => "TZeu4kAmTK2BWPS", "Database" => "konnectVR-Data", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:konnectvr-db.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    $loginUser = $_POST["LoginUser"];
    $loginPass = $_POST["LoginPass"];

    $sql = "SELECT Password FROM loginData Where Username = '". $loginUser . "'";

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
    {echo "Sucessful connection, but failed login";}
    echo "Hello World!";

?>