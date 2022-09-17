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

    $loginPass = $conn -> query('SELECT TOP(1)* FROM [dbo].[loginData]');
    $loginPass -> setfetchmode(PDO::FETCH_ASSOC);
    //echo "Hello World!";

?>