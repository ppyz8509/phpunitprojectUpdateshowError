<?php declare(strict_types=1);
include "HashData.php";
use PHPUnit\Framework\TestCase;

class HashTest extends TestCase {
    private $h1;
    private $salt;

    public function setUp():void {
        $this->h1 = new HashData();
    }

    public function testMd5(){
        $password = "test";
        $encrypt_password = $this->h1->hashByMd5("test");
        $this->assertTrue($this->h1->verifyByMd5($password,$encrypt_password));
        $this->assertFalse($this->h1->verifyByMd5("npru",$encrypt_password));
    }

    public function testMd5withSalt(){
        $password = "test";
        $this->salt = $this->h1->createSaltA1();
        $encrypt_password = $this->h1->hashByMd5Salt($password,$this->salt);
        $this->assertTrue($this->h1->verifyByMd5Salt($password,$encrypt_password,$this->salt));
    }

    public function testBcrypt(){
        $password = "test";
        $encrypt_password = $this->h1->hashByBcrypt($password);
        $this->assertTrue($this->h1->verifyByBcrypt($password,$encrypt_password));
    }

    public function testBcryptWithSalt(){
        $password = "test";
        $this->salt = $this->h1->createSaltA1();
        $encrypt_password = $this->h1->hashByBcryptSalt($password,$this->salt);
        $this->assertTrue($this->h1->verifyByBcryptSalt($password,$encrypt_password,$this->salt));
    }

    public function testBcryptWithReSalt(){
        $password = "test";
        $this->salt = $this->h1->createSaltA1();
        $encrypt_password = $this->h1->hashByBcryptReSalt($password,$this->salt);
        $this->assertTrue($this->h1->verifyByBcryptReSalt($password,$encrypt_password,$this->salt));
    }
}