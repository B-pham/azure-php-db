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

    $loginUser -> username = 'Bill';
    $loginPass -> Password = '123qwe';

    try {
        $loginResult = $conn -> query('SELECT password FROM loginData WHERE username = '. $loginUser .'');
        $loginResult-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($loginPass -> password = $loginResult){
            echo "Password is correct!";
        }
    
    }
    catch(PDOException $e){
        print("Error finding username in database.");
        die(print_r($e));
    }

?>