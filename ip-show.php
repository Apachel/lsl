<?php
/* 2017.08-22-12-40
https://lsl-apachel.c9users.io/ip-show.php

https://lsl-apachel.c9users.io/mysql.php
https://community.c9.io/t/setting-up-mysql/1718
http://www.php.su/functions/?cat=mysql
*/
//************* 178.95.48.129 Connected successfully (Localhost via UNIX socket) ***********
// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
echo "$ip\n";

    $servername = getenv('IP'); //getenv('apachel-lsl-5252239');// getenv('IP'); 
    $username = getenv('C9_USER');// getenv('apachel');//getenv('C9_USER');
    $password = "";//"T*3";
    $database = "web";//"c9";
    $dbport = 3306;
    $table = 'host';
/*
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
*/    
//***********
    // Соединяемся, выбираем базу данных 
    $link = mysql_connect("$servername", "$username", "$password") //$link = mysql_connect("mysql_host", "mysql_user", "mysql_password")
        or die("Could not connect : " . mysql_error());
    print "Connected successfully";
    
    mysql_select_db("$database") or die("Could not select database");//mysql_select_db("my_database") or die("Could not select database");
//---------
    // Выполняем SQL-запрос
    $maximum = 0;
    $query = "SELECT MAX(id) FROM $table LIMIT 1";//"SET @maximum = (SELECT MAX(id) FROM $table LIMIT 1)"; // SELECT MAX(id) FROM host LIMIT 1;
    mysql_query($query);
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
//    echo ". Result: $result \n";    echo ". OK \n";
    
// Выводим результаты в html 
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $maximum = $col_value;

    // Освобождаем память от результата 
    mysql_free_result($result);
 //---------    
    $query = "SELECT ip FROM $table WHERE id = $maximum LIMIT 1";//$query = "SELECT * FROM my_table";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

    // get result
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $ip = $col_value;
/*            
    // Выводим результаты в html 
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
    {
        print "\t<tr>\n";
        foreach ($line as $col_value) 
        {
            print "\t\t<td>$col_value</td>\n";
            
        }
        print "\t</tr>\n";
    }
    print "</table>\n";
*/
    // Освобождаем память от результата 
    mysql_free_result($result);

    // Закрываем соединение 
    mysql_close($link);
    
echo "\n $ip";    
/*
178.95.48.129 Connected successfully
1	template	2000-01-01 00:00:00	192.168.0.1	12046	http	0	cloud9	cgi.exe	index.php	database	apachel
*/
?>