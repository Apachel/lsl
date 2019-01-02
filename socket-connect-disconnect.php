<?php
// https://lsl-apachel.c9users.io/socket-connect-disconnect.php
/*
https://lsl-apachel.c9users.io/socket-connect-disconnect.php?name=Fashion Atlas&age=9&address=minergate&port=45590
*/
session_start();

header('Content-Type: text/plain;'); 
error_reporting(E_ALL ^ E_WARNING); 
//error_reporting(0); 
set_time_limit(300); 
ob_implicit_flush(); 
echo "=== Client ===\n\n"; 
$address = 'cryptonight.eu.nicehash.com';
$port = 3355;//10001;

//$address = 'stratum+tcp://fcn-xmr.pool.minergate.com';
//$port = 45590;

$login;

$name=isset($_GET['name'])?$_GET['name']:'';// $name = $_GET['name'];
$age=isset($_GET['age'])?$_GET['age']:0;
try 
{
    $address = $_GET['address'];
    echo "$address: ";
    
    if($_GET['address'] === 'nicehash')
     {
        $address = 'cryptonight.eu.nicehash.com';
        $login = '3279ASGyUtgszfscXChYmcMefQfeQXwUA6.web';
     }
    else if($_GET['address'] === 'minergate')
     {
        $address = 'xdn-xmr.pool.minergate.com';//'stratum+tcp://'fcn-xmr.pool.minergate.com';
        $login = 'spectrum48@protonmail.com';
     }
    $port  = $_GET['port'];
    
    echo "address=$address:$port\n";
//-----
    echo 'Create socket ... '; 
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); 
    if ($socket < 0) 
    { 
    	throw new Exception('socket_create() failed: '.socket_strerror(socket_last_error())."\n"); 
    }
    else { echo "OK\n"; }
    
    echo 'Connect socket ... '; 
    $result = socket_connect($socket, $address, $port); 
    if ($result === false) 
    { throw new Exception('socket_connect() failed: '.socket_strerror(socket_last_error())."\n"); } 
    else { echo "OK\n"; }

    echo "Hello, $name ! Your age: $age years ! \n";
//-----	
	
	$pass = 'x';
	$agent = 'xmr-stak-cpu/1.3.0-1.5.0';
	$id = 1;
	
	$msg = "{\"method\":\"login\",\"params\":{\"login\":\"$login\",\"pass\":\"$pass\",\"agent\":\"$agent\"},\"id\":$id}";
		
	echo "send: $msg\n";   
	socket_write($socket, $msg, strlen($msg));	
	
//	$out = "";
/*
	for ($x=0; $x<1 && strlen($out) === 0; $x++)
	{
	    echo "$x\n";
	    $out = socket_read($socket, 1024);
	}
*/	
	//$out = socket_read($socket, 1024);
	$out = socket_read($socket, 1024);
	echo "recv: $out\n"; 
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
    socket_close($socket); 
    echo "OK\n"; 
}
echo 'php page END';
?>