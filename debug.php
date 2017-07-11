<?php
$test = 'stuff bash interprets, space: # & ; ` | * ? ~ < > ^ ( ) [ ] { } $ \ \x0A \xFF. \' " %'.PHP_EOL.
        'stuff bash interprets, no space: #&;`|*?~<>^()[]{}$\\x0A\xFF.\'\"%'.PHP_EOL.
        'stuff bash interprets, with leading backslash: \# \& \; \` \| \* \? \~ \< \> \^ \( \) \[ \] \{ \} \$ \\\ \\\x0A \\\xFF. \\\' \" \%'.PHP_EOL.
        'printf codes: % \ (used to form %.0#-*+d, or \\ \a \b \f \n \r \t \v \" \? \062 \0062 \x032 \u0032 and \U00000032)';

echo "These are the strings we are testing with:".PHP_EOL.$test.PHP_EOL;
$cmd = $test;
//$cmd = str_replace(array('\\', '%'), array('\\\\', '%%'), $test);
$cmd = escapeshellarg($cmd);

echo PHP_EOL."This is the output using the escaping mechanism given:".PHP_EOL;
echo "printf $cmd | cat".PHP_EOL;

echo PHP_EOL."They should match exactly".PHP_EOL;
//session_destroy();
/* Nice Encrypt
//Key
$key = 'EaaJgaD0uFDEg7tpvMOqKfAQ46B qi8Va';

//To Encrypt:
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, 'Password', MCRYPT_MODE_ECB);

//To Decrypt:
$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $encrypted, MCRYPT_MODE_ECB);
echo $encrypted;
echo "<br>";
echo $decrypted; */

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
