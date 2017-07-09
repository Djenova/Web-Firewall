<?php

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
