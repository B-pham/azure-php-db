<?php
    session_start();
    try {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr.database.windows.net,1433; Database = KVR_Database", "CloudSAf20f247f", "Konnectvr2023");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print("connected to the server!". "<br>");
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
    if(isset($_SESSION['Cpass']))
    {
        $encrypted = password_hash($_SESSION['Cpass'], PASSWORD_BCRYPT);
        $sql = "UPDATE `logintest` SET `Password`='". $encrypted ."' WHERE `Email` = '". $_SESSION['email'] ."'"; 
        $conn -> query($sql);
    }

?>
<html>
    <body>
        <h1>Password updated!!</h1>
        <p>
        <?php
            echo $_SESSION['Cpass']; 
            echo "<br><br> This is an obivous security flaw. Will not exist in final release.";
        ?>
        </p>
    </body>
</html>