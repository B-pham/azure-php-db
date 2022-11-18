<?php
    //Connect to database
    try 
    {
        $conn = new PDO("sqlsrv:server = tcp:konnectvr-db.database.windows.net,1433; Database = konnectVR-Data", "konnectVR", "TZeu4kAmTK2BWPS");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //print("connected to the server!". "<br>");
    }

    catch (PDOException $e) 
    {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    $email = $_POST["emailPost"];
    $username = $_POST["userPost"];

    //email vars
    $subject = 'Test Password recovery email';
    $headers = 'From: Us <Us@dummygmail.com>\r\n>';
    $headers .= "Reply-To: replyto@dummygmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    try
    {
        $sql = "SELECT * FROM logintest WHERE email = '". $email ."'";
        $temp = $conn -> query($sql);//Grab inforamtion based on above query statement
        $result = $temp -> fetch(PDO::FETCH_ASSOC);//Sort rows into arrays

        if($email != $result['Email'] || $username != $result['Username'])
        {print("Incorrect username and/or email. Try again   ");}
        else
        {
            $to = $result['Email'];
            $message = 'Your password is: '.$result['Password'];
            mail($to, $subject, $message, $headers);
            print ("Email sent!!!");
        }
        //print ("Email sent!!!");
    }

    catch(PDOException $e)
    {
        print ("Error in processing request:");
        die(print_r($e));
    }

    //Corrosponding C# code
    /*public void ForgotPassword()
    {
        StartCoroutine(ForgotPassword(username.text, email.text));
    }
    IEnumerator ForgotPassword(string username, string email)
    {
        WWWForm form = new WWWForm();
        form.AddField("User", username);
        form.AddField("Email", email);

        using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/KonnectVR/ForgotPassword.php", form))
        {
            yield return www.SendWebRequest();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log(www.downloadHandler.text);
            }
        }
    }*/
?>