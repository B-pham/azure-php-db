<?php  
    print("Hello World!");
    
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    
    
    
    //$loginUser = $_POST["LoginUser"];
    //$loginPass = $_POST["LoginPass"];

    //$loginPass = $conn -> query('SELECT TOP(1)* FROM [dbo].[loginData]');
    //$loginPass -> setfetchmode(PDO::FETCH_ASSOC);


?>