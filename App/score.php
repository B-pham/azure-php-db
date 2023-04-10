<?php

    namespace App;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    class emailScore
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

        public function SendEmail($temp, $test, $user, $score)
        {
            //$this->DatabaseConnect();
            try
            {
                //$temp = $_POST["professorEmailPost"];
                //$test = $_POST["testNamePost"];
                //$user = $_POST["userNamePost"];
                //$score = $_POST["testScorePost"];
                //$verificationCode = $_POST["verificationCodePost"];
                $to = $temp; //substr($temp, 0, -3);//Have found that there are three extra characters when sending emails at end of string via POST. This removes those characters
                $subject = ".$test. score from .$user.";
                if($to != null)
                {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';//Server emails are sent from
                    $mail->SMTPAuth = true;
                    $mail->Username = 'kvrtesting02@gmail.com';//Email address that sends the email
                        $mail->Password = 'wazngfpibmkeroch';//App password for the gmail account. Normal Password is TestKVR02!
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPOptions = array('ssl' => array(//Needed to connect to server, however this in of itself is a security flaw
                                                                'verify_peer'=>false,
                                                                'verify_peer_name'=>false,
                                                                'allow_self_signed'=>true
                                                            )
                                              );
                    $mail->Port = 587;
                    $mail->setFrom('kvrtesting02@gmail.com');
                    $mail->addAddress($to);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    //$to = $result['Email'];
                    $message = " .$user. got .$score. on .$test. <br/> <br/>
                                This is an automated message, please do not reply.";
                    $mail->Body = $message;
                    $mail->send();
                    print ("Email sent to: $to");
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

    //$emailScore = new emailScore();
    //$emailScore->SendEmail();
    //print("This is a test text.");
?>