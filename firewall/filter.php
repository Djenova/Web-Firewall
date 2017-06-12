<?php
require_once 'dbconfig.php';
error_reporting(E_ALL & ~E_NOTICE);

/**
* Filter Class
*/
class filter
{
    
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    function ambilIP() {
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


    function cekCoki()
    {
        setcookie('filter', 'oke', time()+3600);
            if (!isset($_COOKIE['filter']) && $_COOKIE['filter']=='oke') {
            header('Location: firewall/error.php');
            }
    }

    function cekIP($IP)
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

    function GETcek()
    {
        foreach ($_GET as $name => $isi) {
            $get.=$isi.',';
            $_GET[$name] = $isi;
            /*debug */
            print_r($_GET);
        }
    }

    function POSTcek()
    {
        foreach ($_POST as $pos => $isi) {
            $post.=$isi.',';
            $_POST[$pos] = $isi;
            /*echo "$isi";*/
            print_r($_POST);
        }
    }
}
$IP =  $filter -> ambilIP();
$filter -> cekCoki();
$filter -> cekIP($IP);
$filter -> GETcek();
$filter ->POSTcek();


?>