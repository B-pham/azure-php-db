<?php
    namespace App;
    use PDO;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    class ForgotPass                                                                                                                                            
    {
        /*public function DatabaseConnect()
        {
            //Connect to database
            try {
                $conn = new PDO("sqlsrv:server = tcp:konnectvr.database.windows.net,1433; Database = KVR_Database", "CloudSAf20f247f", "Konnectvr2023");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }
        }*/

        public function SendEmail($email)
        {
            try {
                $conn = new PDO("sqlsrv:server = tcp:konnectvr.database.windows.net,1433; Database = KVR_Database", "CloudSAf20f247f", "Konnectvr2023");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }

            try
            {
                //$temp = $_POST["passwordResetEmailPost"];
                //$verificationCode = $_POST["verificationCodePost"];
                $to = $email; //substr($temp, 0, -3);//Have found that there are three extra characters when sending emails at end of string via POST. This removes those characters
                //(Extra characters were consistenly 'a??' for some reason)
                //$subject = "Password Recovery for KVR";
                $subject = "Password reset email from KonnectVR";
                if($to != null)
                {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';//Server emails are sent from
                    $mail->SMTPAuth = true;
                    $mail->Username = 'konnectvr@gmail.com';//Email address that sends the email
                        $mail->Password = 'widjbyeskgtypysv';//App password for the gmail account. Normal Password is TestKVR!
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPOptions = array('ssl' => array(//Needed to connect to server, however this in of itself is a security flaw
                                                                'verify_peer'=>false,
                                                                'verify_peer_name'=>false,
                                                                'allow_self_signed'=>true
                                                            )
                                              );
                    $mail->Port = 587;
                    $mail->setFrom('konnectvr@gmail.com');
                    $mail->addAddress($to);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    //$to = $result['Email'];
                    $message = "This is your password reset email. <br/> Follow the link: https://kvrconnect.azurewebsites.net/app/resetPassword.php";
                    $mail->Body = $message;
                    $mail->send();
                    print ("Password reset link sent to: $to");
                    $test = true;
                }
            }

            catch(PDOException $e)
            {
                print ("Error in processing request:");
                die(print_r($e));
            }
        }
    }
?>