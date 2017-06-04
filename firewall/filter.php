<?php
error_reporting(E_ALL & ~E_NOTICE);
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
    date_default_timezone_set('Asia/Jakarta');
    $sekarang = date("Y-m-d H:i:s");
    $tambah = date("Y-m-d H:i:s", strtotime('1 hours'));
    $awal  = strtotime($sekarang);
    $akhir = strtotime($tambah);
    $diff  = $akhir - $awal;

    $jam   = floor($diff / (60 * 60));
    $menit = $diff - $jam * (60 * 60);
    if ($jam < 0) {
        echo "Buka Block";
    }else {
        echo "Masih Terblock";
    }

}


?>