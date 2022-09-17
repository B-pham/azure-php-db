<?php  
    print("Hello World!");
    
    //SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "konnectVR", "pwd" => "TZeu4kAmTK2BWPS", "Database" => "konnectVR-Data", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:konnectvr-db.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    
    
    
    //$loginUser = $_POST["LoginUser"];
    //$loginPass = $_POST["LoginPass"];

    //$loginPass = $conn -> query('SELECT TOP(1)* FROM [dbo].[loginData]');
    //$loginPass -> setfetchmode(PDO::FETCH_ASSOC);


?>