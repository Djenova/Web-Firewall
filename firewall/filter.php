<?php
require_once 'conf.php';
session_start();
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
define('SITE_ROOT', __DIR__);
/**
* Filter Class
*/
class filter
{

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

    public function daftarHitam()
    {
      if (file_exists(''.__DIR__.'/logs/blacklist/Blokir_Tanggal-'.$this->Tanggal($jam = FALSE).'.txt')) {
        $lines = preg_split('/\r\n|\n|\r/', trim(file_get_contents(''.__DIR__.'/logs/blacklist/Blokir_Tanggal-'.$this->Tanggal($jam = FALSE).'.txt')));
        $total = array_count_values($lines);
      }
      if ($total[$this->ambilIP()] == 5) {
        header('Location: firewall/error.php');
      }

    }

    public function GETcek()
    {
        foreach ($_GET as $name => $isi) {
            $get = $isi;
            $_GET[$name] = $isi;
            /*debug */
            //print_r($get);
            return $get;
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

    public function FILEScek()
    {
        foreach ($_FILES as $fil => $b[][]) {
          $up_name = $_FILES[$fil]['name'];

          //echo $up_name."<br>".$uploaded;
          return $up_name;
        }


    }

    public function filterFile($up_name)
    {
      if ($up_name != NULL) {
        $uploaded = substr($up_name,strrpos($up_name, '.')+1);
        $x = array("jpg", "Jpeg", "gif", "png");
        if (in_array($uploaded,$x) != true) {
          $this->TulisLog("Arbitrary File Upload",$this->ambilIP());
          header('Location: firewall/error.php');
        }
      }

    }

    public function XSScek($dataPost, $dataGet)
    {
          $dataFilterPost = htmlspecialchars($dataPost, ENT_QUOTES, 'UTF-8');
          $dataFilterGet = htmlspecialchars($dataGet, ENT_QUOTES, 'UTF-8');
      if (($dataPost != $dataFilterPost)||($dataGet != $dataFilterGet)) {
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
      $simpan = $jenis."|".$IP."|".$this->Tanggal($jam = TRUE)."|".$_SERVER['REQUEST_URI'];
      $file = __DIR__."/logs/attacker/Serangan_Tanggal-".$this->Tanggal($jam = FALSE).".txt" ;
      $fileBlock = __DIR__."/logs/blacklist/Blokir_Tanggal-".$this->Tanggal($jam = FALSE).".txt" ;
      file_put_contents($file, $simpan . PHP_EOL, FILE_APPEND);
      file_put_contents($fileBlock, $IP . PHP_EOL, FILE_APPEND);

    }
    public function antiBruteForce($maks)
    {
      if (isset($_SESSION['count'])) {
        $_SESSION['count'] +=1;
        $now = time();
        if ((isset($_SESSION['expire']) && ($_SESSION['expire'] <= $now ))) {
          session_destroy();
          $_SESSION['count']=0;
        }
        if ($_SESSION['count']>=$maks) {
          if (!$_SESSION['expire']) {
            $_SESSION['expire']  = $_SESSION['start']+(10);
            $this->TulisLog("BruteForce",$this->ambilIP());
          }
          header('Location: firewall/error.php');
        }
      } else {
        $_SESSION['count']=1;
          $_SESSION['start']=time();
      }
    }

    public function filterPerintah($dataPost,$dataGet)
    {
      $dataFilterGet = escapeshellcmd($dataGet);
      $dataFilterPost = escapeshellcmd($dataPost);
      if (($dataPost != $dataFilterPost)||($dataGet != $dataFilterGet)) {
        $this->TulisLog("Command Injection",$this->ambilIP());
        header('Location: firewall/error.php');
      }
    //echo $dataGet."<br>".$dataFilterGet;
    }
}
$filter = new filter();
$IP =  $filter -> ambilIP();
$filter -> cekCoki();
$filter->daftarHitam();
$dataFiles = $filter->FILEScek();
$dataGet = $filter -> GETcek();
$dataPost = $filter ->POSTcek();
$filter-> XSScek($dataPost, $dataGet);
$filter ->antiBruteForce($config->maxbrute);
$filter->filterPerintah($dataPost, $dataGet);
$filter->filterFile($dataFiles);
//session_destroy();


?>
