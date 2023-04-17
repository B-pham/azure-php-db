<?php

class PHPTest extends \PHPUnit\Framework\TestCase  //Include fuctions from PHPUnit  
{
    public function testEvo()//Test enviroment to make sure there isn't something wrong at the fundemental level
    {$this->assertEquals(1,1);}

    public function testConnection()//Check to see if the test cases can reach the functions for testing
    {
        $Login = new App\Login;
        $result = $Login->LoginCheck();
        $this->assertNotNull($result);
    }

    public function testEmail()//Make sure emails can be sent for password reseting
    {
        $Email = new App\ForgotPass;
        $_POST["passwordResetEmailPost"] = 'TestEmailhere@gmail.com';
        $result = $Email->SendEmail().$test;
        $this->assertTrue($result);
    }
}
?>