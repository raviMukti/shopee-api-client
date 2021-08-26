<?php

namespace Test\client;

use Haistar\ShopeePhpSdk\client\SignGenerator;
use PHPUnit\Framework\TestCase;

class SignGeneratorTest extends TestCase
{
    public function testGenerateSignatureAndReturnSuccess(){
        $baseString = "ABC";
        $secretKey = "123";

        $signedKey = hash_hmac('sha256', utf8_encode($baseString), $secretKey);

        $this->assertEquals(SignGenerator::generateSign("ABC", "123"), $signedKey);
    }
}
