<?php
// https://lsl-apachel.c9users.io/ip.1.php

function get_all_ip() {
  $ip_pattern="#(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)#";
  $ret="";
  foreach ($_SERVER as $k => $v) {
    if (substr($k,0,5)=="HTTP_" AND preg_match($ip_pattern,$v)) $ret.=$k.": ".$v."\n";
  }
  return $ret;
}
 
// REMOTE_ADDR, HTTP_X_FORWARDED_FOR, HTTP_HOST, X_REAL_IP, VIA
echo "'REMOTE_ADDR, HTTP_X_FORWARDED_FOR, HTTP_HOST, X_REAL_IP, VIA'"; 

echo " ";
echo $_SERVER['REMOTE_ADDR']; // this "c9.io" server

echo " "; 
echo $_SERVER['HTTP_X_FORWARDED_FOR'];

echo " ";
echo $_SERVER['HTTP_HOST'];

echo " "; 
echo $_SERVER['X_REAL_IP'];

echo " "; 
echo $_SERVER['VIA'];

echo "==========="; 
echo get_all_ip();


$math = 2 + 2;
echo " php: 2 + 2 = $math";

?>