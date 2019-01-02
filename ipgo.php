<?php
/*
https://lsl-apachel.c9users.io/ipgo.php
http://www.php.su/learnphp/cgi/?headers
*/
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
echo $ip;
header("Location: http://$ip:12046/ip.php"); // Производит перенаправление браузера на другой ресурс 

// Внимание! Убедитесь, что код, расположенный ниже не исполняется 
//exit;

?>