<?php

@$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";
$myObj->city = "New York";

$myJSON = json_encode($myObj);

//echo $myJSON;


//session_destroy();
 //Nice Encrypt
//Key
$key = 'EaaJgaD0uFDEg7tpvMOqKfAQ46Bqi8Va';

//To Encrypt:
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB);

//To Decrypt:
$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $encrypted, MCRYPT_MODE_ECB);
echo $encrypted;
echo "<br>";
echo $decrypted;

/* Unused Code
public function cekIP($IP)
{
    $query = "SELECT * FROM blacklist WHERE blacklist.IPblaclist = '$IP'";
    $stmt = $this->db->prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetch(PDO::FETCH_ASSOC);
    date_default_timezone_set('Asia/Jakarta');
    $sekarang = date("Y-m-d H:i:s");
    $tambah = date("Y-m-d H:i:s", strtotime('1 hours'));
    $awal  = strtotime($sekarang);
    $akhir = strtotime($data['waktuBlacklist']);
    $diff  = $akhir - $awal;

    $jam   = floor($diff / (60 * 60));
    $menit = $diff - $jam * (60 * 60);
    if ($jam < 0) {
    /*debug
      echo "Buka Block";
      echo "<br>".$sekarang;
      echo "<br>".$data['waktuBlacklist'];
    }else {
     header('Location: firewall/error.php');
    }

} */

 ?>
