<?php

/**
 * Class Config
 */
class Config
{
  public $username;
  public $password;
  public $maxbrute;
  public $allowEkstensi;

  public function __construct()
  {
    self::bacaConfig();
  }

  public function setConfig($username,$password,$maxbrute,$allowEkstensi)
  {
    $this->username = $username;
    $this->password = $password;
    $this->maxbrute = $maxbrute;
    $this->allowEkstensi = $allowEkstensi;
  }

  public function setKey()
  {
    return 'EaaJgaD0uFDEg7tpvMOqKfAQ46Bqi8Va';
  }


  public function simpanConfig()
  {
    $stored = json_encode($this);
    $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->setKey(), $stored, MCRYPT_MODE_ECB);
    $file = "conf.json";
    file_put_contents($file, $encrypted);
  }

  public function bacaConfig()
  {
    $data = file_get_contents(__DIR__."/conf.json");
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->setKey(), $data, MCRYPT_MODE_ECB);
    $d = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $decrypted), true );
    $this->setConfig($d['username'],$d['password'],$d['maxbrute'],$d['allowEkstensi']);
  }
}

$config = new Config;

$config ->bacaConfig();

//DEBUG
//$config->setConfig("coba2","123","500","txt");
//$config->simpanConfig();
//echo $config->username.PHP_EOL;
//echo $config->password.PHP_EOL;
//echo $config->allowEkstensi.PHP_EOL;
//echo $config->maxbrute.PHP_EOL;

 ?>
