<?php
// https://lsl-apachel.c9users.io/socket-connect-disconnect.php
/*
https://lsl-apachel.c9users.io/socket-connect-disconnect.php?name=Fashion Atlas&age=9&address=minergate&port=45590

http://178.95.61.186:12046/socket-connect-disconnect.php?name=Fashion%20Atlas&age=9&address=nicehash&port=33355

https://lsl-apachel.c9users.io/stream-connect-disconnect.php?name=Fashion%20Atlas&age=9&address=nicehash&port=33355
*/
//session_start();

header('Content-Type: text/plain;'); 
error_reporting(E_ALL ^ E_WARNING); 
//error_reporting(0); 
set_time_limit(300); 
ob_implicit_flush(); 
echo "=== Client ===\n\n"; 
//$address = 'cryptonight.eu.nicehash.com';
//$port = 33355;//3355;

//$address = 'stratum+tcp://fcn-xmr.pool.minergate.com';
//$port = 45590;

$login;
$address = '';
$port = 0;
$name=isset($_GET['name'])?$_GET['name']:'';// $name = $_GET['name'];
$age=isset($_GET['age'])?$_GET['age']:0;
try 
{
    $address = $_GET['address'];
	$port  = $_GET['port'];
    echo "param: address=$address, port=$port\n";
	
    if($_GET['address'] === 'nicehash')
	{
		//$address = 'cryptonight.eu.nicehash.com';
		$address = 'tcp://cryptonight.eu.nicehash.com';
		
		$port = 33355;
		$login = '3279ASGyUtgszfscXChYmcMefQfeQXwUA6.web';	
	}
    else if($_GET['address'] === 'minergate')
	{
		//$address = 'fcn-xmr.pool.minergate.com';
		//$address = 'stratum+tcp://fcn-xmr.pool.minergate.com';
		$address = 'tcp://xdn-xmr.pool.minergate.com';
		$port = 45590;
		$login = 'spectrum48@protonmail.com';
/*
=== Client ===

param: address=minergate, port=45590
address=tcp://fcn-xmr.pool.minergate.com, port=45590
Create socket ... OK
Hello, Fashion Atlas ! Your age: 9 years ! 
user=spectrum48@protonmail.com
send: {method:login,params:{login:spectrum48@protonmail.com,pass:x,agent:xmr-stak-cpu/1.3.0-1.5.0},id:1}
read: ... 
3.
 length:73, recv: {"jsonrpc":"2.0","error":{"code":-42,"message":"Timeout"},"result":null}

Close socket ... OK
php page END
*/		
	}
    
    echo "address=$address, port=$port\n";
//-----
    echo 'Create socket ... '; 
    //$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); 
    $socket = stream_socket_client("$address:$port", $errno, $errstr, 30);
	
/*	if ($socket < 0) 
    { 
    	throw new Exception('socket_create() failed: '.socket_strerror(socket_last_error())."\n"); 
    }
*/	if(!$socket) 
	{
		echo "$errstr ($errno)\n";
	} 	
    else { echo "OK\n"; }
 /*   
    echo 'Connect socket ... '; 
    $result = socket_connect($socket, $address, $port); 
    if ($result === false) 
    { throw new Exception('socket_connect() failed: '.socket_strerror(socket_last_error())."\n"); } 
    else { echo "OK\n"; }
*/
    echo "Hello, $name ! Your age: $age years ! \n";
//-----	
	echo "user=$login\n";
	$pass = 'x';
	$agent = 'xmr-stak-cpu/1.3.0-1.5.0';
	$id = 1;
	
	$login = "";
	$pass = "";
	
	$msg = "{\"method\":\"login\",\"params\":{\"login\":\"$login\",\"pass\":\"$pass\",\"agent\":\"$agent\"},\"id\":$id}";
	
	//$msg = "{method:login,params:{login:$login,pass:$pass,agent:$agent},id:$id}";
	
	echo "send: $msg\n";   
	//socket_write($socket, $msg, strlen($msg));
//**************************************************************************	
	//fwrite($socket, "GET / HTTP/1.0\r\nHost: $address:$port\r\nAccept: */*\r\n\r\n");
	fwrite($socket, "GET /$address:$port TCP/1.0\r\nHost: $address:$port\r\nAccept: */*\r\n\r\n$msg");
	
	fwrite($socket, $msg);//"GET / HTTP/1.0\r\nHost: cryptonight.eu.nicehash.com\r\nAccept: */*\r\n\r\n");
	//

	$out = "";
	echo "read: ... \n";
	for ($x=0; $x<5 && strlen($out) === 0; $x++)
	{
	    //echo "$x.";//echo "$x.\n";
		//$out = socket_read($socket, 1024);
		
		$out = fread($socket, 1024);
		//$out = fgets($socket, 1024);
	}
	echo "$x.";
	$ln = strlen($out);
	echo "\n length:$ln, recv: $out\n"; 
	
	$out = "";
	echo "read: ... \n";
	for ($x=0; $x<5 && strlen($out) === 0; $x++)
	{
	    //echo "$x.";//echo "$x.\n";
		//$out = socket_read($socket, 1024);
		
		$out = fread($socket, 1024);
		//$out = fgets($socket, 1024);
	}
	echo "$x.";
	$ln = strlen($out);
	echo "\n length:$ln, recv1: $out\n"; 
/*    
    echo 'Server said: '; 
    $out = socket_read($socket, 1024); 
    echo $out."\n"; 
    $msg = "Hello, Server!"; 
    echo "Say to server ($msg) ..."; 
    socket_write($socket, $msg, strlen($msg)); 
    echo "OK\n"; echo 'Server said: '; 
    $out = socket_read($socket, 1024); 
    echo $out."\n"; 
    $msg = 'shutdown'; 
    echo "Say to server ($msg) ... "; 
    socket_write($socket, $msg, strlen($msg)); 
    echo "OK\n";
*/
} 
catch (Exception $e) { echo "\nError: ".$e->getMessage(); }

if (isset($socket)) 
{   echo 'Close socket ... '; 
    //socket_close($socket); 
	fclose($socket);
    echo "OK\n"; 
}
echo 'php page END';
?>