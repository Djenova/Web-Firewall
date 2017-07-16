<?php
require_once 'conf.php';
/**
 * Class for Admin
 */
class Admin extends Config
{
  public function __construct()
  {
    parent::__construct();

  }
  public function CountLog($type)
  {
    $date = date('Y-m-d');
    if ($type == "attacker") {
      $lines = preg_split('/\r\n|\n|\r/', trim(file_get_contents(''.__DIR__.'/logs/attacker/Serangan_Tanggal-'.$date.'.txt')));
      return count($lines);
    } elseif ($type == "blacklist") {
      $lines = preg_split('/\r\n|\n|\r/', trim(file_get_contents(''.__DIR__.'/logs/blacklist/Blokir_Tanggal-'.$date.'.txt')));
      return count($lines);
    } elseif ($type == "blacklistall") {
      $dir = __DIR__."/logs/blacklist/";
        $files = array_slice(scandir($dir), 2);
        for ($i=0; $i < count($files) ; $i++) {
          $lines[$i] =preg_split('/\r\n|\n|\r/', trim(file_get_contents(__DIR__.'/logs/blacklist/'.$files[$i])));
        };
        return array_sum(array_map("count", $lines));
    } elseif ($type = "attackerall") {
      $dir = __DIR__."/logs/attacker/";
      $files = array_slice(scandir($dir), 2);
      for ($i=0; $i < count($files) ; $i++) {
        $lines[$i] =preg_split('/\r\n|\n|\r/', trim(file_get_contents(__DIR__.'/logs/attacker/'.$files[$i])));
      };
      return array_sum(array_map("count", $lines));
    }
  }

  public function LoadDailyTable($type)
  {
    $date = date('Y-m-d');
    if ($type == "a") {
      $lines = preg_split('/\r\n|\n|\r/', trim(file_get_contents(''.__DIR__.'/logs/attacker/Serangan_Tanggal-'.$date.'.txt')));
    }
    //echo "<pre>";
    $lines = array_reverse($lines, true);
    $i = 0;
    foreach ($lines as $line) {
      $i++;
      $part = explode("|",$line);
        echo "<tr>
                <td>".$i."</td>
                <td>".$part[1]."</td>
                <td>".$part[0]."</td>
                <td>".$part[3]."</td>
                <td>".$part[4]."</td>
              </tr>";
              if ($i==10) {
                break;
              }
    }
  }

  public function LoadLog($type)
  {
    if ($type == "a") {
      $dir = __DIR__."/logs/attacker/";
      $files = array_slice(scandir($dir), 2);
      $i=0;
      foreach ($files as $file ) {
        $i++;
        echo "<tr>
                  <td>".$i."</td>
                  <td>".$file."</td>
                  <td>Hapus | Unduh</td>
              </tr>";
      }
    } elseif ($type =="b") {
        $dir = __DIR__."/logs/blacklist/";
        $files = array_slice(scandir($dir), 2);
        $i=0;
        foreach ($files as $file ) {
          $i++;
          echo "<tr>
                    <td>".$i."</td>
                    <td>".$file."</td>
                    <td>Hapus | Unduh</td>
                </tr>";
        }
    }
  }

  public function LoadIP()
  {
    $dir = __DIR__."/logs/blacklist/";
      $files = array_slice(scandir($dir), 2);
      for ($i=0; $i < count($files) ; $i++) {
        $lines[$i] =preg_split('/\r\n|\n|\r/', trim(file_get_contents(__DIR__.'/logs/blacklist/'.$files[$i])));
      };
      return $lines;
  }
  function MakeUnique(&$array)
  {
  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

  foreach ($result as $key => $value)
  {
    if ( is_array($value) )
    {
      $result[$key] = $this->MakeUnique($value);
    }
  }
  return $result;
  }

  public function MakeOne($array)
  {
    return call_user_func_array('array_merge',$array);
  }

  public function JSONMapIP($array)
  {
    foreach ($array as $ip) {
      $url = 'https://ipapi.co/'.$ip.'/json/';
      $content = file_get_contents($url);
      $json = json_decode($content, true);
      echo $content." ,";
      ob_flush();
      flush();
      //print_r($json);
    }
  }

  public function LoadSetting($type)
  {
    echo $this->$type.PHP_EOL;
  }
  public function SaveSetting($username,$password,$maxbrute,$allowEkstensi)
  {
    $this->setConfig($username,$password,$maxbrute,$allowEkstensi);
    $this->simpanConfig();
  }

  public function Login($username, $password)
  {
    if (($username==$this->username)&&($password==$this->password)) {
      $_SESSION['user']=$username;
      //echo $_SESSION['user'];
      header('Location: home.php');
    } else {
      echo " <div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </div>";
    }
  }

}

$admin = new Admin();
$array = $admin->LoadIP();
$make = $admin->MakeUnique($array);
$one = $admin->MakeOne($make);
//$admin->LoadSetting("allowEkstensi");
//echo $config->username.PHP_EOL;
//$admin->JSONMapIP($one);
//print_r();



 ?>
