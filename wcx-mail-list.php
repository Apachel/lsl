
<!DOCTYPE HTML>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>wcx-mail.php</title>
 </head>
 <body>

<?php
$loc_adres = "https://lsl-apachel.c9users.io/wcx-mail.php";
////        header("Location: https://ico.wcex.co/?ref=Vbtn0mW&lang=en"); // Производит перенаправление браузера на другой ресурс 

function print_array($elements)
{
    if( count($elements) === 0) return;
    
// Выводим результаты в html   http://www.php.su/learnphp/cs/?cycles#foreach
    print "<table>";
        print "\t<tr>\n";
        foreach ($elements as $value) 
        {
            //echo "<b>$value</b><br>";
            print "\t\t<td>$value</td>\n";
        }
        print "\t</tr>\n";
    print "</table>\n";// unset($names);
}

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

//--- search name list  https://www.site-do.ru/php/string.php    http://www.php.su/substr     http://www.php.su/strpos()
//'list'

// $_GET $_POST $_REQUEST
//echo 'Привет ' . htmlspecialchars($_POST["list"]) . '!';
$received_text = htmlspecialchars($_REQUEST["list"]);
echo "list: $received_text";
/*
print_array($_REQUEST);
print_r($_REQUEST);
*/
$list_names = str_split($received_text);
//test:  print_r($list_names);

//--------
$datetime = htmlspecialchars($_REQUEST["datetime"]);
echo "<p>datetime: $datetime</p>";

//-------- http://www.php.su/functions/?cat=strings
//$recived_text='нас интересует где находится подстрока';
// $text='https://lsl-apachel.c9users.io/wcx-mail-list.php?datetime=2017-10-15&names=Entering+list+names&number=local%0D%0Anumber&stored=Stored+database+names%0D%0A2017-10-15&list=abc%0D%0Adef%0D%0Aghi&num=+1%0D%0A+2%0D%0A+3%0D%0A+4%0D%0A+5%0D%0A+6%0D%0A+7%0D%0A+8%0D%0A+9%0D%0A%0D%0A10%0D%0A11%0D%0A12%0D%0A13%0D%0A14%0D%0A15%0D%0A16%0D%0A17%0D%0A18%0D%0A%0D%0A19%0D%0A20%0D%0A21%0D%0A22%0D%0A23%0D%0A24%0D%0A25%0D%0A26%0D%0A27%0D%0A%0D%0A28%0D%0A29%0D%0A30%0D%0A31%0D%0A32%0D%0A33%0D%0A34%0D%0A35%0D%0A36%0D%0A+%0D%0A++++++++&db=abc%0D%0Adef%0D%0Aghi';
$text = $received_text;
//$lim="%0D%0A";
$lim="\r\n";

$start=0;//ищет с начала строки
$end=strlen($text);//если поиск нужно начать не с начала строки, используем третий параметр
/*
$cut1=substr($text,$start,$end - $start);
$cut2=substr($text,$end,50);
echo "<p>$sub start: $start</p>$cut1";
echo "<p>$sub end: $end</p><p>$cut2</p>";
*/

$count = 0;
while ($start < $end)
{
    $count = $count + 1;
    
    $next=strpos($text,$lim,$start);
    
    if($next === false || $next >= $end)  
    {
        $name=substr($text,$start,$end - $start);
        $start=$end;
    }
    else
    {
        $name=substr($text,$start,$next - $start);
        $start = $next + strlen($lim);
    }
    if( strlen($name) > 1 )    $names[] = $name;
//    echo "<p>$count: $name</p>";
}

$database_text = "";
if( count($names) > 0) 
{
    foreach ($names as $value) 
        $database_text = "$database_text$value\n";
}
//echo  "<p>$database_text</p>";

//print_array($names);





//return;
//******************************
/*
on command-line,'"bsh-u"buntu"':
# start MySQL. Will create an empty database on first start
$ mysql-ctl start

# stop MySQL
$ mysql-ctl stop

# run the MySQL interactive shell
$ mysql-ctl cli

# Once connected to the mysql shell, run the following:
select @@hostname;

+---------------------+
| @@hostname          |
+---------------------+
| apachel-lsl-5252239 |
+---------------------+
1 row in set (0.00 sec)

# connected to the mysql database `wcx`:
use wcx;

CREATE TABLE `wcx_mail` (
     `id` INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
     
     `loc_id`   INT(4) UNSIGNED NOT NULL    DEFAULT '0',
     `name`     VARCHAR(32)     NOT NULL    DEFAULT '',
     `datetime` DATETIME        NOT NULL    DEFAULT '2000-01-01 00:00:00',
     
     
     `_mailna.co_ip`         VARCHAR(15) NULL DEFAULT '',
     `_mailna.co`            VARCHAR(50) NULL DEFAULT '',
     `_mailna.co_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `_mailna.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `_mailna.in`            VARCHAR(50) NULL DEFAULT '',
     `_mailna.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `_mailna.me_ip`         VARCHAR(15) NULL DEFAULT '',
     `_mailna.me`            VARCHAR(50) NULL DEFAULT '',
     `_mailna.me_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `_mohmal.im_ip`         VARCHAR(15) NULL DEFAULT '',
     `_mohmal.im`            VARCHAR(50) NULL DEFAULT '',
     `_mohmal.im_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `_mohmal.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `_mohmal.in`            VARCHAR(50) NULL DEFAULT '',
     `_mohmal.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     
     `a_mailna.co_ip`         VARCHAR(15) NULL DEFAULT '',
     `a_mailna.co`            VARCHAR(50) NULL DEFAULT '',
     `a_mailna.co_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `a_mailna.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `a_mailna.in`            VARCHAR(50) NULL DEFAULT '',
     `a_mailna.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `a_mailna.me_ip`         VARCHAR(15) NULL DEFAULT '',
     `a_mailna.me`            VARCHAR(50) NULL DEFAULT '',
     `a_mailna.me_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `a_mohmal.im_ip`         VARCHAR(15) NULL DEFAULT '',
     `a_mohmal.im`            VARCHAR(50) NULL DEFAULT '',
     `a_mohmal.im_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `a_mohmal.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `a_mohmal.in`            VARCHAR(50) NULL DEFAULT '',
     `a_mohmal.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     
     `i_mailna.co_ip`         VARCHAR(15) NULL DEFAULT '',
     `i_mailna.co`            VARCHAR(50) NULL DEFAULT '',
     `i_mailna.co_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `i_mailna.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `i_mailna.in`            VARCHAR(50) NULL DEFAULT '',
     `i_mailna.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `i_mailna.me_ip`         VARCHAR(15) NULL DEFAULT '',
     `i_mailna.me`            VARCHAR(50) NULL DEFAULT '',
     `i_mailna.me_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `i_mohmal.im_ip`         VARCHAR(15) NULL DEFAULT '',
     `i_mohmal.im`            VARCHAR(50) NULL DEFAULT '',
     `i_mohmal.im_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `i_mohmal.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `i_mohmal.in`            VARCHAR(50) NULL DEFAULT '',
     `i_mohmal.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',     
     
     
     
     `o_mailna.co_ip`         VARCHAR(15) NULL DEFAULT '',
     `o_mailna.co`            VARCHAR(50) NULL DEFAULT '',
     `o_mailna.co_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `o_mailna.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `o_mailna.in`            VARCHAR(50) NULL DEFAULT '',
     `o_mailna.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `o_mailna.me_ip`         VARCHAR(15) NULL DEFAULT '',
     `o_mailna.me`            VARCHAR(50) NULL DEFAULT '',
     `o_mailna.me_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `o_mohmal.im_ip`         VARCHAR(15) NULL DEFAULT '',
     `o_mohmal.im`            VARCHAR(50) NULL DEFAULT '',
     `o_mohmal.im_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',
     
     `o_mohmal.in_ip`         VARCHAR(15) NULL DEFAULT '',
     `o_mohmal.in`            VARCHAR(50) NULL DEFAULT '',
     `o_mohmal.in_datetime`   DATETIME    NULL DEFAULT '2000-01-01 00:00:00',     
     
     
     `ip`           VARCHAR(15)         NULL DEFAULT '',
     `port`         INT(5)    UNSIGNED  NULL DEFAULT '0',
     `protocol`     VARCHAR(50)         NULL DEFAULT 'http',
     `OnLine`       INT(1)              NULL DEFAULT '1',
     `server_name`  VARCHAR(50)         NULL DEFAULT 'server',
     `cgi`          VARCHAR(50)         NULL DEFAULT 'cgi.exe',
     `php`          VARCHAR(50)         NULL DEFAULT 'index.php',
     `mysql`        VARCHAR(50)         NULL DEFAULT 'apachel',
     `user`         VARCHAR(50)         NULL DEFAULT 'apachel',
     
     `description`  VARCHAR(128) NULL DEFAULT NULL,
     PRIMARY KEY (`id`),
     UNIQUE INDEX (`description`)
     )
     COLLATE='cp1251_general_ci'
     ENGINE=InnoDB
     ROW_FORMAT=COMPACT
     AUTO_INCREMENT=1
     ;

     `loc_id`   INT(4) UNSIGNED NOT NULL    DEFAULT '0',
     `name`     VARCHAR(32)     NOT NULL    DEFAULT '',
     `datetime` DATETIME        NOT NULL    DEFAULT '2000-01-01 00:00:00',
     
// ALTER TABLE `table` MODIFY (`pole1` char(20)); // https://sql-language.ru/alter-table.html



ALTER TABLE `wcx_mail` MODIFY (`server_name`    INT(9)    UNSIGNED  NULL DEFAULT '0');

ALTER TABLE `wcx_mail` (`max_row`    INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`point_row`  INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`max_col`    INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`point_col`  INT(9)    UNSIGNED  NULL DEFAULT '0');


INSERT INTO `wcx_mail` 
        (`id`, `description`, `loc_id`, `name`,         `datetime`,                  `port`, `protocol`, `OnLine`, `server_name`, `cgi`,     `php`,         `mysql`,    `user`) 
VALUES  (0,    'pointer',     1,      '_mohmal.in',   '2000-01-01 00:00:00',         '80',   'https',    0,        'cloud9',      'cgi.exe', 'index.php',   'wcx',      'apachel');
    
    SELECT * FROM wcx_mail;
*/

/* 2017.10-16=20-14
https://lsl-apachel.c9users.io/ip-write.php

178.95.50.82 Connected successfully. maximum=19; Data is writed in database: 19 2017-08-30 10:29:05 2017-08-30 10:29:05 178.95.50.82 12046 http 1 server cgi.exe index.php apachel test . My ip: 178.95.50.82

https://lsl-apachel.c9users.io/mysql.php
https://community.c9.io/t/setting-up-mysql/1718
http://www.php.su/functions/?cat=mysql
*/
function getFields()
{
    $a=array();
    $query="SHOW COLUMNS FROM `mytable`";
    $res=$this->db->query($query);
    
    while ($row=$res->fetchrow())
    {
        $a[]=$row['Field'];
    }
    return $a;
}

// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php

//-----

    $servername = getenv('IP'); //getenv('apachel-lsl-5252239');// getenv('IP'); 
    $username = getenv('C9_USER');// getenv('apachel');//getenv('C9_USER');
    $password = "";//"T*3";
    $database = "wcx";//"c9";
    $dbport = 3306;
    $table = 'wcx_mail';
  
//***********
    // Соединяемся, выбираем базу данных 
    $link = mysql_connect("$servername", "$username", "$password") //$link = mysql_connect("mysql_host", "mysql_user", "mysql_password")
        or die("Could not connect : " . mysql_error());
    //print "Connected successfully";
    
    mysql_select_db("$database") or die("Could not select database");//mysql_select_db("my_database") or die("Could not select database");
    
//------
// http://www.cyberforum.ru/php-beginners/thread609263.html
// date_default_timezone_set('America/Eirunepe'); 
// echo date('H:i:s') . "\n"; 
    date_default_timezone_set('Europe/Kiev'); 
    echo date("Y-m-d H:i:s") . "\n"; 
    
    $query = "SET time_zone = '+03:00'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
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

    $date = $datetime;
    if( strlen($date) < strlen('2017-10-1') )  $date = date("Y-m-d");// $date = date("Y-m-d H:i:s"); 
/*    
    $query = "SELECT DATE('$date')";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    // get result
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $date = $col_value;
    // Освобождаем память от результата 
    mysql_free_result($result);
*/
//--------            
//    $query = "SELECT ip FROM $table WHERE id = $maximum LIMIT 1";//$query = "SELECT * FROM my_table";
    $query = "SELECT COUNT(`datetime`) FROM $table WHERE DATE(`datetime`) = '$date' LIMIT 1";

    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    // get result
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $count_datetime = $col_value;

    // Освобождаем память от результата 
    mysql_free_result($result);
    
//    echo "count_ip: $count_ip \n";
//---------    
echo "<p>count_datetime: $count_datetime</p>";
echo "<p>date: $date</p>";

/* 
`_mailna.co`,
`_mailna.in`,
`_mailna.me`,
`_mohmal.im`,
`_mohmal.in`,
`a_mailna.co`,
`a_mailna.in`,
`a_mailna.me`,
`a_mohmal.im`, 
`a_mohmal.in`,
`i_mailna.co`,
`i_mailna.in`,
`i_mailna.me`,
`i_mohmal.im`,
`i_mohmal.in`,
`o_mailna.co`,
`o_mailna.in`,
`o_mailna.me`,
`o_mohmal.im`,
`o_mohmal.in`

`$mail[0]`,
`$mail[1]`,
`$mail[2]`,
`$mail[3]`,
`$mail[4]`,
`$mail[5]`,
`$mail[6]`,
`$mail[7]`,
`$mail[8]`,
`$mail[9]`,
`$mail[10]`,
`$mail[11]`,
`$mail[12]`,
`$mail[13]`,
`$mail[14]`,
`$mail[15]`,
`$mail[16]`,
`$mail[17]`,
`$mail[18]`,
`$mail[19]`
*/                             

$mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
$mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
$mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
$mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
$mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";

$domen[] = "mohmal.in";
$domen[] = "mohmal.im"; 
$domen[] = "mailna.me"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.co"; 

    if($count_datetime == 0)
    { 
        if( count($names) > 0)
        {
            $a = 'a';
            $i = 'i';
            $o = 'o';
            $loc_id = 0;
            
            foreach ($names as $value) 
            {
                $loc_id = $loc_id + 1;
                //$count_datetime = $value;
        //------ INSERT in table 'host' new line whith new  ip ---    
        // INSERT host (id, description, datetime, ip, port, OnLine, user) VALUES (id, NOW(), NOW(), '10.10.0.1', 12016, 1, 'data');
        
        
//                echo "<p>'$value'</p>";
        
        // `description`) VALUE (NOW()
        
                $query = "INSERT INTO $table 
                (`id`, `loc_id`, `name`,  `datetime`, `ip`, `description`,  
                             `$mail[0]`,
                             `$mail[1]`,
                             `$mail[2]`,
                             `$mail[3]`,
                             `$mail[4]`,
                             `$mail[5]`,
                             `$mail[6]`,
                             `$mail[7]`,
                             `$mail[8]`,
                             `$mail[9]`,
                             `$mail[10]`,
                             `$mail[11]`,
                             `$mail[12]`,
                             `$mail[13]`,
                             `$mail[14]`,
                             `$mail[15]`,
                             `$mail[16]`,
                             `$mail[17]`,
                             `$mail[18]`,
                             `$mail[19]`) 
         VALUES ( id,  '$loc_id', '$value', NOW(),    '$ip',    '$value',  
                                '$value','$value$a','$value$i','$value$o',
                                '$value','$value$a','$value$i','$value$o',
                                '$value','$value$a','$value$i','$value$o',
                                '$value','$value$a','$value$i','$value$o',
                                '$value','$value$a','$value$i','$value$o'
                                 )";

                $result = mysql_query($query) or die("INSERT INTO failed : " . mysql_error()); //$query = "SELECT * FROM my_table";
        
                // Освобождаем память от результата 
                mysql_free_result($result);
                
            }
        }
//        echo "Data is writed in database: ";

     

//================        
//----- print fields/columns of table ---------
print "<table>";
/*
//        getFields();
        $query = "SELECT COLUMN_NAME
                    FROM information_schema.COLUMNS
                    WHERE TABLE_SCHEMA = DATABASE()
                      AND TABLE_NAME = '$table'
                    ORDER BY ORDINAL_POSITION";
        
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        // Выводим результаты в html 
//        print "<table>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        {
            print "\t<tr>\n";
            foreach ($line as $col_value) 
            {
                print "\t\t<td>$col_value</td>\n";
            }
            print "\t</tr>\n";
        }
        // Освобождаем память от результата 
        mysql_free_result($result);
*/        
//-------- print lines/rows of table -------
        $query = "SELECT `id`, `loc_id`, `name`,  `datetime`, `ip`, `description`,  
                             `$mail[0]`,
                             `$mail[1]`,
                             `$mail[2]`,
                             `$mail[3]`,
                             `$mail[4]`,
                             `$mail[5]`,
                             `$mail[6]`,
                             `$mail[7]`,
                             `$mail[8]`,
                             `$mail[9]`,
                             `$mail[10]`,
                             `$mail[11]`,
                             `$mail[12]`,
                             `$mail[13]`,
                             `$mail[14]`,
                             `$mail[15]`,
                             `$mail[16]`,
                             `$mail[17]`,
                             `$mail[18]`,
                             `$mail[19]`
        FROM $table WHERE DATE(`datetime`) = '$date' LIMIT 36"; //$query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";
        
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

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
    
        // Освобождаем память от результата 
        mysql_free_result($result);
        
//-------------
/*
        $query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $table_ip = $col_value;
    
        // Освобождаем память от результата 
        mysql_free_result($result);
*/        
 
//=======      
//        $ip = '0';        $datetime = '0';        echo "maximum: $maximum \n<p> ip = $ip_client \n<p> dateTime = $datetime";
//        header("Location: https://ico.wcex.co/");

////        header("Location: https://ico.wcex.co/?ref=Vbtn0mW&lang=en"); // Производит перенаправление браузера на другой ресурс 
    }
    else
    {
/*        
        // update name_table set field = 'value' where id = '12';
        
        $query = "UPDATE $table SET port = port + 1 WHERE ip = '$ip_client' LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
//-
        $query = "SELECT `port` FROM $table WHERE ip = '$ip_client' LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $replay = $col_value;
        mysql_free_result($result);// Освобождаем память от результата 
//---        
        $query = "SELECT `datetime` FROM $table WHERE ip = '$ip_client' LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $datetime = $col_value;
        mysql_free_result($result);// Освобождаем память от результата 
//---        
        echo "ip = $ip_client \n<p> dateTime = $datetime \n<p> replay: $replay \n<p> maximum: $maximum";
*/        
    }
    
//------
    // Закрываем соединение 
    mysql_close($link);
    
    
    
    
    
    
    
    
    
//*****************************    
//----------------
$name = "abc";
$domain = "mohmal.in";

$url = "https://www.mohmal.com/ru/create"; // URL на которы посылаем запрос

$text = "
    <form id='enterDomain' action='$url' method='post'>
        <div>
            <input id='create' class='btn btn-default' type='submit' value='Создайте'>
            
            <input id='create' class='btn btn-default' type='text' name='name' placeholder='email name-login' value=$name>
            
            <select name='domain'> 
                <option value='$domain'>@$domain</option>
                <option value='-------------'>-------------</option>
                
                <option value='mailna.co'>@mailna.co</option> 
                <option value='mailna.in'>@mailna.in</option> 
                <option value='mailna.me'>@mailna.me</option> 
                <option value='mohmal.im'>@mohmal.im</option> 
                <option value='mohmal.in'>@mohmal.in</option>
            </select>
        </div>
    </form>
    <p>$name@$domain</p>";  
    
// echo $text;

echo "<p>$ip</p>";

// http://htmlbook.ru/samhtml5/formy/mnogostrochnyi-tekst

/*
$database_text = 'abc
def
ghi';
*/
$col = 24;
$rows = 42;
$datetime_default = "2017-10";
$datetime = "$datetime_default-15";

echo "
<form action='$loc_adres'>

    <p><b><input type='submit' value='Введите список имен для почты'></b></p>
    <input type='text' name='datetime' placeholder='$datetime_default-15' value='$datetime_default-'>
    <br> 
        <textarea name='names'  cols='$col' rows='2' readonly>Entering list names</textarea> 
        <textarea name='number' cols='6'    rows='2' readonly>local\nnumber</textarea>
        <textarea name='stored' cols='$col' rows='2' readonly>Stored database names\n$datetime</textarea> 
        
    </br>
    <p>
        <textarea name='list' cols='$col' rows='$rows'>$database_text</textarea>
        
        <textarea name='num' cols='6' rows='$rows' readonly> 1\n 2\n 3\n 4\n 5\n 6\n 7\n 8\n 9
\n10\n11\n12\n13\n14\n15\n16\n17\n18
\n19\n20\n21\n22\n23\n24\n25\n26\n27
\n28\n29\n30\n31\n32\n33\n34\n35\n36\n 
        </textarea>
        
        <textarea name='db' cols='$col' rows='$rows' readonly>$database_text</textarea>
    </p>
</form>
"; // <iframe name='area'  width='$col' height='$rows'>$database_text</iframe>
/*
Атрибут	    Описание
cols	    Ширина поля в символах.
rows    	Высота поля в строках текста.   

disabled	Блокирует доступ и изменение элемента.
maxlength	Максимальное число символов текста, которое можно ввести.
name	    Имя поля, предназначено для того, чтобы обработчик формы мог его идентифицировать.
readonly	Устанавливает, что поле не может изменяться пользователем.
wrap	    Параметры переноса строк.
*/

/*
  <p><iframe name='area' width='500' height='200'></iframe></p>
  <form action='handler.php' target='area'>
   <p><input placeholder='Введите текст' name='text'>
   <p><input type='submit' value='Отправить'></p>
  </form>
*/  


//-------------
/* https://phpclub.ru/talk/threads/Передача-данных-методом-post-без-input-type-submit.43451/

Simple HTTP POST.
Простой пример, показывающий использования метода POST и cURL.
Прежде чем использовать данный код убедитесь, что на Вашем хостинге есть cURL.
©oded by BuH@LicH at sysman.ru 2007
thx to Miscђka
*/
/*
$url = "https://lsl-apachel.c9users.io/wcx-mail.php"; // "https://www.mohmal.com/ru/create"; // URL на которы посылаем запрос
//$name = "abc"; // = 'abc' логин 
//$domain = "mohmal.in"; // = ''; пассворд

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL,$url); // Устанавливаем URL на который посылать запрос  
curl_setopt($ch, CURLOPT_HEADER, 1); //  Результат будет содержать заголовки
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // Результат будет возвращём в переменную, а не выведен.
curl_setopt($ch, CURLOPT_TIMEOUT, 3); // Таймаут после 4 секунд 
curl_setopt($ch, CURLOPT_POST, 1); // Устанавливаем метод POST

// curl_setopt($ch, CURLOPT_POSTFIELDS, "referer=&t=&f=&st=&UserName=$login&PassWord=$password&CookieDate=1"); // посылаемые значения
curl_setopt($ch, CURLOPT_POSTFIELDS, "referer=&t=&f=&st=&name=$name&domain=$domain&CookieDate=1"); // посылаемые значения

$result = curl_exec($ch);  
curl_close($ch);

if (strpos($result,'302 F')!== FALSE) echo "<b>Good!</b>";
else echo "<b>Bad</b>";
*/

?>    

 </body>
</html>