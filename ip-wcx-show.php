<?php
/* 2017.08-22-12-40
https://lsl-apachel.c9users.io/ip-get.php

https://lsl-apachel.c9users.io/mysql.php
https://community.c9.io/t/setting-up-mysql/1718
http://www.php.su/functions/?cat=mysql
*/
//************* 178.95.48.129 Connected successfully (Localhost via UNIX socket) ***********
// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php

function type_table($table, $reverce)
{   // Распечатка таблицы
    
    if($reverce > 0)
        $reverce = 'DESC';
    else    
        $reverce = '';
    
    echo "= = = = = = = Table: $table = = = = =  = = = = = =\n";
    
    $query = "SELECT * FROM $table ORDER BY id $reverce";//$query = "SELECT * FROM my_table";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

    // Выводим результаты в html 
    print "<table>\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print "\t<tr>\n";
        foreach ($line as $col_value) {
            print "\t\t<td>$col_value</td>\n";
        }
        print "\t</tr>\n";
    }
    print "</table>\n";

    // Освобождаем память от результата 
    mysql_free_result($result);
}

$ip_client = $_SERVER['HTTP_X_FORWARDED_FOR'];
// echo "$ip_client\n";

//=========

/*
// https://lsl-apachel.c9users.io/ip-wcx.php?name=Fashion&age=9

$name = $_GET['name'];
$age = $_GET['age'];

echo "Hello, $name ! You are $age years !";
*/
/*
// //////////////2017-10-1414-06
use wcx;

CREATE TABLE `wcx_ip` (
     `id` INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
     `description` VARCHAR(128) NULL DEFAULT NULL,
     `datetime` DATETIME NULL DEFAULT '2000-01-01 00:00:00',
     `ip` VARCHAR(15) NULL DEFAULT '192.168.000.001',
     `port` INT(5) UNSIGNED NULL DEFAULT '0',
     `protocol` VARCHAR(50) NULL DEFAULT 'http',
     `OnLine` INT(1) NULL DEFAULT '1',
     `server_name` VARCHAR(50) NULL DEFAULT 'server',
     `cgi` VARCHAR(50) NULL DEFAULT 'cgi.exe',
     `php` VARCHAR(50) NULL DEFAULT 'index.php',
     `mysql` VARCHAR(50) NULL DEFAULT 'apachel',
     `user` VARCHAR(50) NULL DEFAULT 'apachel',
     PRIMARY KEY (`id`),
     UNIQUE INDEX (`description`)
     )
     COLLATE='cp1251_general_ci'
     ENGINE=InnoDB
     ROW_FORMAT=COMPACT
     AUTO_INCREMENT=2
     ;
    
    INSERT INTO `wcx_ip` (`id`, `description`, `datetime`, `ip`, `port`, `protocol`, `OnLine`, `server_name`, `cgi`, `php`, `mysql`, `user`) 
    VALUES (1, 'template', '2000-01-01 00:00:00', '192.168.0.1', 12046, 'http', 0, 'cloud9', 'cgi.exe', 'index.php', 'database', 'apachel');
    
    SELECT * FROM wcx_ip;
    
*/
//-----

    $servername = getenv('IP'); //getenv('apachel-lsl-5252239');// getenv('IP'); 
    $username = getenv('C9_USER');// getenv('apachel');//getenv('C9_USER');
    $password = "";//"T*3";
    $database = "wcx";//"c9";
    $dbport = 3306;
    $table = 'wcx_ip';
  
//***********
    // Соединяемся, выбираем базу данных 
    $link = mysql_connect("$servername", "$username", "$password") //$link = mysql_connect("mysql_host", "mysql_user", "mysql_password")
        or die("Could not connect : " . mysql_error());
    //print "Connected successfully";
    
    mysql_select_db("$database") or die("Could not select database");//mysql_select_db("my_database") or die("Could not select database");
//---------
    // Находим количество записей в таблице (Выполняем SQL-запрос)
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
    
//   echo "maximum: $maximum \n<p>";
//---------    
//test    $ip_client = '192.168.0.1';

//    $query = "SELECT ip FROM $table WHERE id = $maximum LIMIT 1";//$query = "SELECT * FROM my_table";
    $query = "SELECT ip FROM $table WHERE id = $maximum LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    // get result
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $max_ip = $col_value;

    // Освобождаем память от результата 
    mysql_free_result($result);
//---------    
        $query = "SELECT `datetime` FROM $table WHERE id = $maximum LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $datetime = $col_value;
    
        // Освобождаем память от результата 
        mysql_free_result($result);
//---------

        echo "ip: $ip_client <p> datetime: $datetime <p> Last maximum: $maximum \n<p>";

        type_table($table, 1);
        
//------
    // Закрываем соединение 
    mysql_close($link);
/*   
    ob_start();
    $buffer = ob_get_contents();
    ob_end_clean();
    echo $buffer;
*/
?>