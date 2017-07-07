<?php
//require_once 'dbconfig.php';
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
define('SITE_ROOT', __DIR__);
/**
* Filter Class
*/
class filter
{

    function __construct()
    {

    }
    public function ambilIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'null';
    return $ipaddress;
    }


    public function cekCoki()
    {
        setcookie('filter', 'oke', time()+3600);
            if (!isset($_COOKIE['filter']) && $_COOKIE['filter']=='oke') {
            header('Location: firewall/error.php');
            }
    }

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
          echo "<br>".$data['waktuBlacklist'];*/
        }else {
         header('Location: firewall/error.php');
        }

    }

    public function GETcek()
    {
        foreach ($_GET as $name => $isi) {
            $get = $isi;
            $_GET[$name] = $isi;
            /*debug */
            print_r($get);
        }
    }

    public function POSTcek()
    {
        foreach ($_POST as $pos => $isi) {
            $post = $isi;
            $_POST[$pos] = $isi;
            /*echo "$isi";*/
            //print_r($post);
            return $post;
        }
    }

    public function XSScek($data)
    {
          $dataFilter = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
      if ($data != $dataFilter) {
        $this->TulisLog("XSS/SQLi",$this->ambilIP());
        header('Location: firewall/error.php');
     }
    }

    public function Tanggal($jam = FALSE)
    {
        if ($jam == FALSE) {
          $date = date('Y-m-d');
          return $date;
        } else {
          $date = date('Y-m-d H:i:s');
          return $date;
        }

    }

    public function TulisLog($jenis, $IP)
    {
      $simpan = $jenis."|".$IP."|".$this->Tanggal($jam = TRUE);
      $file = __DIR__."/logs/attacker/Serangan_Tanggal-".$this->Tanggal($jam = FALSE).".txt" ;
      $fileBlock = __DIR__."/logs/blacklist/Blokir_Tanggal-".$this->Tanggal($jam = FALSE).".txt" ;
      file_put_contents($file, $simpan . PHP_EOL, FILE_APPEND);
      file_put_contents($fileBlock, $IP . PHP_EOL, FILE_APPEND);

    }
}
$filter = new filter();
$IP =  $filter -> ambilIP();
$filter -> cekCoki();
//$filter -> cekIP($IP);
//$filter -> GETcek();
$dataPost = $filter ->POSTcek();
$filter-> XSScek($dataPost);


?>
