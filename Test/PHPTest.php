<?php

class PHPTest extends \PHPUnit\Framework\TestCase    
{
    public function testEvo()
    {$this->assertEquals(1,1);}

    public function testConnection()
    {
        $Login = new App\Login;
        $result = $Login->LoginCheck();
        $this->assertNotNull($result);
    }

    public function testEmail()
    {
        $Email = new App\ForgotPass;
        $_POST["passwordResetEmailPost"] = 'TestEmailhere@gmail.com';
        $result = $Email->SendEmail().$test;
        $this->assertTrue($result);
    }
}
?>