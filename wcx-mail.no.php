<!DOCTYPE HTML>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>wcx-mail.php</title>
 </head>
 <body bgcolor='b0b0b0'>
     

<?php //2017-10-26=14-52=wcx-mail.php

//<body bgcolor='b0b0b0'>   // echo "<body bgcolor='b0b0b0'>";/// #808080  #ffb0b0

$loc_adres = "https://lsl-apachel.c9users.io/wcx-mail.php";

function print_array($elements)
{
    if( count($elements) === 0) return;
    
// Выводим результаты в html   http://www.php.su/learnphp/cs/?cycles#foreach
    print "<table>";
        print "\t<tr>\n";
        foreach ($elements as $value) 
        {
            echo "<b>$value</b><br>";
            print "\t\t<td>$value</td>\n";
        }
        print "\t</tr>\n";
    print "</table>\n";// unset($names);
}

function text2names($text) // $names = text2names($received_text);
{
    $lim="\r\n";//$lim="%0D%0A";
    
    $start=0;//ищет с начала строки
    $end=strlen($text);//если поиск нужно начать не с начала строки, используем третий параметр
    
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
    return $names;
}

function names2text($names) // $database_text = names2text($names);
{
    $database_text = "";
    if( count($names) > 0) 
    {
        foreach ($names as $value) 
            $database_text = "$database_text$value\n";
    }
    //echo  "<p>$database_text</p>";
    //print_array($names);
    return $database_text;
}

//----- print fields/columns of table ---------
function print_table($content) // Выводим результаты в html 
{
print "<table>";
//-------- print lines/rows of table -------
            //$content_len = count($content, COUNT_RECURSIVE);
            $len = count($content);
            echo "rows: $len";
            
            $z = 0;
            while ($z < $len) 
            {
                print "\t<tr>\n";
                //$y = 0;
                foreach ($content[$z] as $col_value) 
                {
                    // $content[$z][$y] = $col_value;
                    
                    //echo "\t\t<td>$col_value</td>\n";
                    print "\t\t<td>$col_value</td>\n";

                    //$y = $y + 1;
                }
                $z = $z + 1;
                print "\t</tr>\n";
            }
print "</table>\n";
}


    

//************ mysql ****************************
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
                            
$mail[] = "_mailna.co"; $mail[] = "_mailna.in"; $mail[] = "_mailna.me"; $mail[] = "_mohmal.im"; $mail[] = "_mohmal.in";
$mail[] = "a_mailna.co";$mail[] = "a_mailna.in";$mail[] = "a_mailna.me";$mail[] = "a_mohmal.im";$mail[] = "a_mohmal.in";
$mail[] = "i_mailna.co";$mail[] = "i_mailna.in";$mail[] = "i_mailna.me";$mail[] = "i_mohmal.im";$mail[] = "i_mohmal.in";
$mail[] = "o_mailna.co";$mail[] = "o_mailna.in";$mail[] = "o_mailna.me";$mail[] = "o_mohmal.im";$mail[] = "o_mohmal.in";

$domen[] = "mailna.co"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.me"; 
$domen[] = "mohmal.im"; 
$domen[] = "mohmal.in";
*/
/*
global $mail;
$mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
$mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
$mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
$mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
$mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";
global $domen;
$domen[] = "mohmal.in";
$domen[] = "mohmal.im"; 
$domen[] = "mailna.me"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.co"; 
*/
//echo $mail[0];
//------

// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php


//---------
function maximum($table) // $maximum = maximum();
{
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

    return $maximum;
}

function read_pointer_row_col($table, $date)
{
    $max_row= 0; 
    $row    = 1;
    $col    = 2;
    $max_col= 3;
    
    $pointers_text  = "`server_name`,`cgi`,`php`,`mysql`"; // max_col, pointer_row, pointer_col, max_col
    $pointers_value = "'36','1','1','20'";                 // max_col, pointer_row, pointer_col, max_col
        
    $id = loc_id2id($table, $date, 1);
    
    ////$query = "SELECT $pointers_text FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = 1 LIMIT 1";
    $query = "SELECT $pointers_text FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `id` = $id LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
        foreach ($line as $col_value) 
        {    
            $pointer_row_col[] = $col_value;
            // echo "<p>pointer: $col_value</p>";
        }
    
    mysql_free_result($result);// Освобождаем память от результата
    
    $pointer_row_col[$max_row] = maximum_loc_id($table, $date);
    
    return $pointer_row_col;
}       

function increment_pointer_row_col($table, $date)
{
    $max_row= 0; 
    $row    = 1;
    $col    = 2;
    $max_col= 3; 
    
    $pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    
    //echo "<p>pointer_row: $pointer_row_col[1]</p>";
    
    $pointer_row_col[$row] = $pointer_row_col[$row] + 1;
    
    if($pointer_row_col[$row] > $pointer_row_col[$max_row])
    {
        $pointer_row_col[$row] = 1;
        $pointer_row_col[$col] = $pointer_row_col[$col] + 1;
        
        if($pointer_row_col[$col] > $pointer_row_col[$max_col])
        {
            $pointer_row_col[$col] = 1;
        }
    }
    
    // max_row, row, col, max_col
    //$query = "UPDATE $table SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'    WHERE DATE(`datetime`) = DATE('$date') AND `id` = 1 LIMIT 1";
    
    //$pointers_text  = "`cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'"; 
    $query = "UPDATE $table SET    `cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'    WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = 1 LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

    //echo "<p>pointer_row: $pointer_row_col[1]</p>";
    
    return $pointer_row_col;
}      

//-----------UPDATE wcx_mail SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'   WHERE `id` = 1 LIMIT 1;
//---------------UPDATE wcx_mail SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'   WHERE `id` = 1 LIMIT 1;
////UPDATE wcx_mail SET    `mysql`='20'   WHERE DATE(`datetime`) = DATE('2017-10-17') AND `id` != 1 AND `loc_id` = 1 LIMIT 1;



function decrement_pointer_row_col($table, $date)
{
    $max_row= 0; 
    $row    = 1;
    $col    = 2;
    $max_col= 3; 
    
    $pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    
    $pointer_row_col[$row] = $pointer_row_col[$row] - 1;
    
    if($pointer_row_col[$row] < 1)
    {
        $pointer_row_col[$row] =  $pointer_row_col[$max_row];
        $pointer_row_col[$col] = $pointer_row_col[$col] - 1;
        
        if($pointer_row_col[$col] < 1)
        {
            $pointer_row_col[$col] = $pointer_row_col[$max_col];
        }
    }
    
    // max_row, row, col, max_col
    //$query = "UPDATE $table SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'    WHERE DATE(`datetime`) = DATE('$date') AND `id` = 1 LIMIT 1";
    
    //$pointers_text  = "`cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'"; 
    $query = "UPDATE $table SET    `cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'    WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = 1 LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

    return $pointer_row_col;
} 

function maximum_loc_id($table, $date) //$mail_adres[0] = strtolower($mail_adres[0]); //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
{//--------------- Находим количество записей по дате
    $maximum = 0;
    if( count_date($table, $date) > 0) // count_date($table, $datetime);// count_date($table, $date);
    {
        $query = "SELECT COUNT(`id`) FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 ORDER BY `id` LIMIT 10000";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
                $maximum_loc = $col_value;
            
        mysql_free_result($result);// Освобождаем память от результата
    }
    return $maximum_loc;
}

function loc_id2id($table, $date, $loc_id) //$mail_adres[0] = strtolower($mail_adres[0]); //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
{
    $id = 0;
    if( count_date($table, $date) > 0) // count_date($table, $datetime);// count_date($table, $date);
    {
        
        $query = "SELECT `id` FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 ORDER BY `id` LIMIT $loc_id";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
                $id = $col_value;
            
        mysql_free_result($result);// Освобождаем память от результата
    }
    return $id;
}

function renumber_loc_id($table, $date, $pointer_row_col) //$mail_adres[0] = strtolower($mail_adres[0]); //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
{   
    $maximum_loc = 0;
    
    if( count_date($table, $date) > 0) // count_date($table, $datetime);// count_date($table, $date);
    {
        $max_row= 0; 
        $row    = 1;
        $col    = 2;
        $max_col= 3; 
        
////        $pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
      
//-------------------
        $maximum_loc = maximum_loc_id($table, $date);
        
        if($maximum_loc > 0)
        {
            $loc_id = 0;
            
            while ($loc_id < $maximum_loc)
            {
                $loc_id = $loc_id + 1;
                $id = loc_id2id($table, $date, $loc_id);
                 
                $query = "UPDATE $table SET `loc_id` = $loc_id WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `id` = $id ORDER BY `id` LIMIT 1";
                $result = mysql_query($query) or die("Query failed : " . mysql_error());
            }
        }
//-------------
        // max_row, row, col, max_col
        //$query = "UPDATE $table SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'    WHERE DATE(`datetime`) = DATE('$date') AND `id` = 1 LIMIT 1";
        
        //$pointers_text  = "`cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'"; 
        $query = "UPDATE $table SET    `server_name`='$pointer_row_col[$max_row]', `cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]', `mysql`='$pointer_row_col[$max_col]'    
                  WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = 1 LIMIT 1";
        
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    }
    
    return $maximum_loc;
} 

function now_mail($table, $date) //$mail_adres[0] = strtolower($mail_adres[0]); //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
{
/*    
//-----------UPDATE wcx_mail SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'   WHERE `id` = 1 LIMIT 1;
//---------------UPDATE wcx_mail SET    `server_name`='max_row',`cgi`='.row.',`php`='.col.',`mysql`='max_col'   WHERE `id` = 1 LIMIT 1;
////UPDATE wcx_mail SET    `mysql`='20'   WHERE DATE(`datetime`) = DATE('2017-10-17') AND `id` != 1 AND `loc_id` = 1 LIMIT 1;


    global $mail;
    $mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";
    $mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";
    $mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";
    $mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";
    $mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";
    
*/    
    global $mail;
    $mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
    $mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
    $mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
    $mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
    $mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";
$len_col = 4;//3

    //static $domen = array();
    global $domen;
    $domen[] = "mohmal.in";
    $domen[] = "mohmal.im"; 
    $domen[] = "mailna.me"; 
    $domen[] = "mailna.in"; 
    $domen[] = "mailna.co";
    //$pointer_row_col = increment_pointer_row_col($table, $date);
    //$pointer_row_col = decrement_pointer_row_col($table, $date);
    //$pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    //$pointer_row_col[$row] = $pointer_row_col[$row]
    $max_row= 0; 
    $row    = 1;
    $col    = 2;
    $max_col= 3; 
    
    $pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    
    $num_row = $pointer_row_col[$row];
    
    $name_field = $mail[ $pointer_row_col[$col] - 1 ];
    $mail_adres[2] = $name_field;
//----

    if( count_date($table, $date) > 0) // count_date($table, $datetime);// count_date($table, $date);
    {
        $id = loc_id2id($table, $date, $num_row); // loc_id2id($table, $date, $loc_id);
        
        $query = "SELECT `$name_field` FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = $id ORDER BY `id` LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
            {    
                $name = $col_value;
                //echo "<p>now name: $col_value</p>";
            }
        mysql_free_result($result);// Освобождаем память от результата

//------    
        //$mail_adres[0] = strtolower($name);
        $mail_adres[0] = $name;
    }
    else $mail_adres[0] = "";
    
    // http://www.php.su/functions/?cat=math
    // http://www.php.su/functions/?ceil
    $n = ceil($pointer_row_col[$col] / $len_col) - 1;
    $mail_adres[1] = $domen[$n];


/*
echo "ceil(3 / 5) = ", ceil(3 / 5), "<br>"; 
echo "ceil(8 / 5) = ", ceil(8 / 5), "<br>"; 
echo "ceil(15 / 5) = ", ceil(15 / 5), "<br>"; 
*/
//    $query = "UPDATE $table SET    `cgi`='$pointer_row_col[$row]', `php`='$pointer_row_col[$col]'    WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = 1 LIMIT 1";
//    $result = mysql_query($query) or die("Query failed : " . mysql_error());

    //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
    return $mail_adres;
} 


function next_mail($table, $date) //$mail_adres[0] = strtolower($mail_adres[0]); //echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
{
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //$pointer_row_col = increment_pointer_row_col($table, $date);
    //$pointer_row_col = decrement_pointer_row_col($table, $date);
    //$pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    //$pointer_row_col[$row] = $pointer_row_col[$row]
    $max_row= 0; 
    $row    = 1;
    $col    = 2;
    $max_col= 3; 
    
    
    $pointer_row_col = increment_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    //$pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    $num_row = $pointer_row_col[$row];
    
    $mail_adres = now_mail($table, $date);
    
    $mail_adres[0] = strtolower($mail_adres[0]); 
    
//    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>"; 
    
    $name_field = $mail_adres[2];
    
    $_datetime = "_datetime";
    $name_field_datetime = "$name_field$_datetime";
    
    $_ip = "_ip";
    $name_field_ip = "$name_field$_ip";
    
    if( count_date($table, $date) > 0 )
    {
        $query = "UPDATE $table SET `$name_field_datetime`=NOW(), `$name_field_ip`='$ip' WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = '$num_row' LIMIT 1";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
/*    
//----- print -------
    echo "$name_field<Br>$num_row";
    
    $query = "SELECT * FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = '$num_row' LIMIT 1";//$query = "SELECT * FROM my_table";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
        foreach ($line as $col_value) 
        {    
            $name = $col_value;
            echo "<p>row now: $col_value</p>";
        }
    mysql_free_result($result);// Освобождаем память от результата
//----- print -------/
*/
    }
    
    return $mail_adres;
} 

    
function read_database_content($table, $date, $limit_rows)
{

global $mail;
$mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
$mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
$mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
$mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
$mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";

//static $domen = array();
global $domen;
$domen[] = "mohmal.in";
$domen[] = "mohmal.im"; 
$domen[] = "mailna.me"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.co"; 

    /*
//        getFields();
    $query = "SELECT COLUMN_NAME
                FROM information_schema.COLUMNS
                WHERE TABLE_SCHEMA = DATABASE()
                  AND TABLE_NAME = '$table'
                ORDER BY ORDINAL_POSITION";
    
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
    // Освобождаем память от результата 
    mysql_free_result($result);
*/ 
//    echo $mail[0];
    
        //if( count($names) > 0)
        
    //$pointer_row_col = increment_pointer_row_col($table, $date);
    //$pointer_row_col = decrement_pointer_row_col($table, $date);
    
    //echo "pointer_row: $pointer_row_col[1]";

    //now_mail($table, $date);
//    echo "1234567890";
////    next_mail($table, $date); // //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
//    echo "1234567890";
    
    $pointers_text  = "`server_name`,`cgi`,`php`,`mysql`,";// max_col, pointer_row, pointer_col, max_col
    
    if($date != "")
        $query = "SELECT `id`, `loc_id`, `name`,  `datetime`, `ip`, `description`,$pointers_text
                                        `$mail[0]`,`$mail[1]`, `$mail[2]`, `$mail[3]`, `$mail[4]`,
                                        `$mail[5]`, `$mail[6]`, `$mail[7]`, `$mail[8]`, `$mail[9]`,
                                        `$mail[10]`, `$mail[11]`,`$mail[12]`, `$mail[13]`,`$mail[14]`,
                                        `$mail[15]`, `$mail[16]`, `$mail[17]`,`$mail[18]`, `$mail[19]`
        FROM `$table` WHERE DATE(`datetime`) = DATE('$date')  ORDER BY `id` LIMIT $limit_rows"; 
    else
        $query = "SELECT `id`, `loc_id`, `name`,  `datetime`, `ip`, `description`,$pointers_text
                                        `$mail[0]`,`$mail[1]`, `$mail[2]`, `$mail[3]`, `$mail[4]`,
                                        `$mail[5]`, `$mail[6]`, `$mail[7]`, `$mail[8]`, `$mail[9]`,
                                        `$mail[10]`, `$mail[11]`,`$mail[12]`, `$mail[13]`,`$mail[14]`,
                                        `$mail[15]`, `$mail[16]`, `$mail[17]`,`$mail[18]`, `$mail[19]`
        FROM `$table` WHERE `id` > 0  ORDER BY `datetime`, `id` LIMIT $limit_rows";
        
    
//echo "<p>$query</p>";

        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        $z = 0;
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        {
            $y = 0;
            foreach ($line as $col_value) 
            {
                if($y == 10)   $names[] = $col_value;
                
                $content[$z][$y] = $col_value;
                $y = $y + 1;
            }
            $z = $z + 1;
        }
        mysql_free_result($result); // Освобождаем память от результата 

        // print_table($content);  // Выводим результаты в html 
        //print_r($content);
        
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
    return $content;
}

function read_database_content_full($table, $date, $limit_rows)
{

global $mail;
$mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
$mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
$mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
$mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
$mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";

//static $domen = array();
global $domen;
$domen[] = "mohmal.in";
$domen[] = "mohmal.im"; 
$domen[] = "mailna.me"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.co"; 

    /*
//        getFields();
    $query = "SELECT COLUMN_NAME
                FROM information_schema.COLUMNS
                WHERE TABLE_SCHEMA = DATABASE()
                  AND TABLE_NAME = '$table'
                ORDER BY ORDINAL_POSITION";
    
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
    // Освобождаем память от результата 
    mysql_free_result($result);
*/ 
//    echo $mail[0];
    
    
    $pointers_text  = "`server_name`,`cgi`,`php`,`mysql`,";// max_col, pointer_row, pointer_col, max_col
    
     if($date != "")
         $query = "SELECT * FROM `$table` WHERE DATE(`datetime`) = DATE('$date')  ORDER BY `id` LIMIT $limit_rows"; //$query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";  '$date' LIMIT 36";    
    else
        $query = "SELECT * FROM `$table` WHERE `id` > 0  ORDER BY `datetime`, `id` LIMIT $limit_rows";
    
    
//echo "<p>$query</p>";

        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        $z = 0;
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        {
            $y = 0;
            foreach ($line as $col_value) 
            {
                if($y == 10)   $names[] = $col_value;
                
                $content[$z][$y] = $col_value;
                $y = $y + 1;
            }
            $z = $z + 1;
        }
        mysql_free_result($result); // Освобождаем память от результата 

        // print_table($content);  // Выводим результаты в html 
        //print_r($content);
        
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
    return $content;
}

function read_database_name_list($table, $date, $limit_rows)
{ 
//if( count($names) > 0)

    if( count_date($table, $date) > 0) //if( count($names) > 0)
    {
        if($date != "")
                $query = "SELECT `name` FROM `$table` WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1  ORDER BY `id` LIMIT $limit_rows";
        else    $query = "SELECT `name` FROM `$table` WHERE `id` != 1  ORDER BY `datetime`, `id` LIMIT $limit_rows";
        
//echo "<p>$query</p>";

        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        $z = 0;
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        {
            $y = 0;
            foreach ($line as $col_value) 
            {
                $names[] = $col_value;
                //$content[$z][$y] = $col_value;
                $y = $y + 1;
            }
            $z = $z + 1;
        }
        mysql_free_result($result); // Освобождаем память от результата 
    }
    
    return $names; 
}

function write_database_name_list($table, $date, $names)
{
global $mail;
$mail[] = "_mohmal.in";$mail[] = "a_mohmal.in";$mail[] = "i_mohmal.in";$mail[] = "o_mohmal.in";
$mail[] = "_mohmal.im";$mail[] = "a_mohmal.im";$mail[] = "i_mohmal.im";$mail[] = "o_mohmal.im";
$mail[] = "_mailna.me";$mail[] = "a_mailna.me";$mail[] = "i_mailna.me";$mail[] = "o_mailna.me";
$mail[] = "_mailna.in";$mail[] = "a_mailna.in";$mail[] = "i_mailna.in";$mail[] = "o_mailna.in";
$mail[] = "_mailna.co";$mail[] = "a_mailna.co";$mail[] = "i_mailna.co";$mail[] = "o_mailna.co";

//static $domen = array();
global $domen;
$domen[] = "mohmal.in";
$domen[] = "mohmal.im"; 
$domen[] = "mailna.me"; 
$domen[] = "mailna.in"; 
$domen[] = "mailna.co"; 

    $a = 'a';
    $i = 'i';
    $o = 'o';
//    $loc_id = 0;// loc_id
    
    //$date_now = date("Y-m-d"); // echo date("Y-m-d H:i:s") . "\n"; 
    //$datetime = $datetime + " " + date("H:i:s");
//-------------
        $loc_id = count_date($table, $date);
/*        
        $query = "SELECT count(`datetime`) FROM `$table` WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1  ORDER BY `id`";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
                $loc_id = $col_value;
        
        mysql_free_result($result);// Освобождаем память от результата 
*/

//----------- 
/*
ALTER TABLE `wcx_mail` MODIFY (`server_name`    INT(9)    UNSIGNED  NULL DEFAULT '0');

ALTER TABLE `wcx_mail` (`max_row`    INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`point_row`  INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`max_col`    INT(9)    UNSIGNED  NULL DEFAULT '0');
ALTER TABLE `wcx_mail`(`point_col`  INT(9)    UNSIGNED  NULL DEFAULT '0');

     `server_name`  VARCHAR(50)         NULL DEFAULT 'server', 
     `cgi`          VARCHAR(50)         NULL DEFAULT 'cgi.exe',
     `php`          VARCHAR(50)         NULL DEFAULT 'index.php',
     `mysql`        VARCHAR(50)         NULL DEFAULT 'apachel',
*/

//-------
    foreach ($names as $value) 
    {
        $loc_id = $loc_id + 1; 
        
        $query = "SELECT count(`name`) FROM `$table` WHERE `name` LIKE '$value' AND `id` != 1  ORDER BY `id` LIMIT 1";
        //$query = "SELECT count(`name`) FROM `$table` WHERE `name` LIKE '$value' ORDER BY `id` LIMIT 1";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
                $count = $col_value;
        
        mysql_free_result($result);// Освобождаем память от результата 
//-----------
        if($count > 0)
        {
            //// print "<font  color='red'><Br>Dont inserted'$d' Dublicate '$value'</font>";
            echo "<font  color='red'><Br>Dont inserted'$d' Dublicate '$value'</font>";
        }
        else
        {
            echo "<Br>'$value' ";
            
            if($loc_id == 1) 
            {
                $pointers_text  = "`server_name`,`cgi`,`php`,`mysql`,"; // max_col, pointer_row, pointer_col, max_col
                $pointers_value = "'36','1','1','20',";                 // max_col, pointer_row, pointer_col, max_col
                //$pointers_value = "'max_col','row','col','max_col',";
            }
            else 
            {
                //$pointers_text  = "";
                //$pointers_value = "";
                $pointers_text  = "`server_name`,`cgi`,`php`,`mysql`,"; // max_col, pointer_row, pointer_col, max_col
                $pointers_value = "'','','','',";                 // max_col, pointer_row, pointer_col, max_col
            }
            
            $query = "INSERT IGNORE INTO $table 
            (`id`, `loc_id`, `name`,  `datetime`, `ip`, `description`,$pointers_text 
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
     VALUES ( id,  '$loc_id', '$value', '$date',    '$ip',    '$value',$pointers_value
                            '$value','$value$a','$value$i','$value$o',
                            '$value','$value$a','$value$i','$value$o',
                            '$value','$value$a','$value$i','$value$o',
                            '$value','$value$a','$value$i','$value$o',
                            '$value','$value$a','$value$i','$value$o'
                             )";

            $result = mysql_query($query) or die("INSERT INTO failed : " . mysql_error());
            //mysql_free_result($result);// Освобождаем память от результата 
        }
    
    //$pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    renumber_loc_id($table, $date,  read_pointer_row_col($table, $date));
    }
}

function delete_database_name_list($table, $date, $text_names, $limit_rows) //function read_database_name_list($table, $date, $limit_rows)
{
    //$names = text2names($text_names);
    if($text_names == '') // count($names) == 0)
    {
        $names = read_database_name_list($table, $date, $limit_rows);
      
        $query = "DELETE FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 ORDER BY `id` LIMIT $limit_rows"; // DATE(`datetime`) LIKE DATE('$date') AND `id` NOT LIKE 1 LIMIT 256";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    }
    else
    {
        $names = text2names($text_names);
        echo "<p>Not released</p>";
    }
//-----    
    $maximum = maximum($table);
    $m = $maximum + 1;
    $query = "ALTER TABLE $table AUTO_INCREMENT = $m";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    return $names; 
}

function delete_database_name($table, $date)//, $text_names, $limit_rows) //function read_database_name_list($table, $date, $limit_rows)
{
    if( count_date($table, $date) > 0) //if( count($names) > 0)
    {
        $max_row= 0; 
        $row    = 1;
        $col    = 2;
        $max_col= 3; 
        
        $pointer_row_col = read_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
        
        $num_row = $pointer_row_col[$row];
        
        $query = "SELECT `id`,`name` FROM $table WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1 AND `loc_id` = $num_row ORDER BY `id` LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
            {
                $values[] = $col_value;
                echo "<p>values: $col_value</p>";
            }
        //echo "<p>now name: $col_value</p>";
        $id   = $values[0];
        $name = $values[1];
        $values[2] = $num_row;

        mysql_free_result($result);// Освобождаем память от результата

//------------------        
        echo "<Br>1027<Br>`id` = $id<Br>num_row=$num_row<Br>";
        
        $query = "DELETE FROM $table WHERE `id` = $id AND `id` != 1 ORDER BY `id` LIMIT 1"; // DATE(`datetime`) LIKE DATE('$date') AND `id` NOT LIKE 1 LIMIT 256";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    //-----
        $maximum = maximum($table);
        $m = $maximum + 1;
        $query = "ALTER TABLE $table AUTO_INCREMENT = $m";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        renumber_loc_id($table, $date, $pointer_row_col);
    }
    return $values; 
}

function count_date($table, $date) //if( count($names) > 0)
{        
    if($date != "" && $table  != "")
    {
        $query = "SELECT COUNT(`name`) FROM `$table` WHERE DATE(`datetime`) = DATE('$date') AND `id` != 1  ORDER BY `id` LIMIT 1230000"; //echo "<p>$query</p>";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $count_date = $col_value;
                
        mysql_free_result($result); // Освобождаем память от результата 
    }
    else $count_date = -1;
    
//// echo "<p>count_date($table, $date): $count_date</p>";  

    return $count_date; 
}

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






//========== mySQL ==================
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

//============================
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

//--- search name list  https://www.site-do.ru/php/string.php    http://www.php.su/substr     http://www.php.su/strpos()
// $_GET $_POST $_REQUEST
// print_array($_REQUEST);
// print_r($_REQUEST);
//echo 'Привет ' . htmlspecialchars($_POST["list"]) . '!';

$create_mail  = htmlspecialchars($_REQUEST["create"]);

$datetime = htmlspecialchars($_REQUEST["datetime"]);// echo "<p>datetime: $datetime</p>";

$received_text = htmlspecialchars($_REQUEST["list"]); // echo "list: $received_text";
$list_names = str_split($received_text); //test:  print_r($list_names);

$mail_step  =   htmlspecialchars($_REQUEST["mailstep"]);

$show =   htmlspecialchars($_REQUEST["show"]);
$remove = htmlspecialchars($_REQUEST["remove"]);
$radio =  htmlspecialchars($_REQUEST["radio"]);
$hiddenvalue = htmlspecialchars($_REQUEST["hiddenvalue"]);
// echo "<p>show: '$show', remove: '$remove', radio: '$radio', hiddenvalue: '$hiddenvalue'</p>";
$remove_text = "show: '$show', remove: '$remove', radio: '$radio', hiddenvalue: '$hiddenvalue'";
$removename_text = "show: '$show', remove: '$remove', radio: '$radio', hiddenvalue: '$hiddenvalue'";

$writelist = htmlspecialchars($_REQUEST["writelist"]);

//// echo "create: $create_mail<Br>datetime: $datetime<Br>list: $received_text<Br>mailstep: $mail_step<Br>show: $show<Br>remove: $remove<Br>radio: $radio<Br>hiddenvalue: $hiddenvalue<Br>writelist: $writelist<Br>";

//-------- http://www.php.su/functions/?cat=strings
//$recived_text='нас интересует где находится подстрока';
// $text='https://lsl-apachel.c9users.io/wcx-mail-list.php?datetime=2017-10-15&names=Entering+list+names&number=local%0D%0Anumber&stored=Stored+database+names%0D%0A2017-10-15&list=abc%0D%0Adef%0D%0Aghi&num=+1%0D%0A+2%0D%0A+3%0D%0A+4%0D%0A+5%0D%0A+6%0D%0A+7%0D%0A+8%0D%0A+9%0D%0A%0D%0A10%0D%0A11%0D%0A12%0D%0A13%0D%0A14%0D%0A15%0D%0A16%0D%0A17%0D%0A18%0D%0A%0D%0A19%0D%0A20%0D%0A21%0D%0A22%0D%0A23%0D%0A24%0D%0A25%0D%0A26%0D%0A27%0D%0A%0D%0A28%0D%0A29%0D%0A30%0D%0A31%0D%0A32%0D%0A33%0D%0A34%0D%0A35%0D%0A36%0D%0A+%0D%0A++++++++&db=abc%0D%0Adef%0D%0Aghi';

//================================
//--------------  count_date($table, $datetime);// count_date($table, $date); -------------
// http://www.cyberforum.ru/php-beginners/thread609263.html
// date_default_timezone_set('America/Eirunepe'); 
// echo date('H:i:s') . "\n"; 
    date_default_timezone_set('Europe/Kiev'); 
    // echo date("Y-m-d H:i:s") . "\n"; 
    $date_now = date("Y-m-d"); // echo date("Y-m-d H:i:s") . "\n"; 
    
    $query = "SET time_zone = '+03:00'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

//// echo "received datetime: $datetime<Br>"; 
    $date = $datetime;

   
    
    if( strlen($date) < strlen('2017-10-10') )
    {
        $query = "SELECT DATE(`datetime`) FROM $table WHERE id = 1 LIMIT 1";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
        
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
            foreach ($line as $col_value) 
                $date = $col_value;
        
        mysql_free_result($result);// Освобождаем память от результата
        
////        echo "$date<Br>";
        
        if($date == '2000-01-01' || $date == '0000-00-00')   $date = date("Y-m-d"); // date("Y-m-d H:i:s"); 
    }
    
    $count_date = count_date($table, $date); // count_date($table, $datetime);// count_date($table, $date);
    if($count_date == -1)
    {
        $date = date("Y-m-d H:i:s"); // date("Y-m-d");// 
    }


    $query = "UPDATE $table SET `datetime` = '$date' WHERE id = 1 LIMIT 1";//$query = "SELECT * FROM my_table";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    $count_datetime = count_date($table, $date);// count_date($table, $datetime);// count_date($table, $date);

////    echo "$date<Br>";
//-------
    $maximum = maximum($table);
//---------    
//test    $ip_client = '192.168.0.1';
//    $query = "SELECT ip FROM $table WHERE id = $maximum LIMIT 1";//$query = "SELECT * FROM my_table";
//    echo "count_ip: $count_ip \n"; 


//+++++++++++++++++++++++
$names = text2names($received_text); // echo $names;

if($writelist == 'insert')
{
    if( count($names) > 0)
    {
        //$date = $datetime; // = date("Y-m-d"); // date("Y-m-d H:i:s");
        $names = write_database_name_list($table, $date, $names); // read_database_name_list($date, $limit_rows)
        
        $text = names2text($names);
        echo "<Br>Name list insertted in database: $text";
    }
    else echo "Empty list name to insert in database";
    
    $show = 'show';//$date;
}
else if($writelist == 'update')
{
    if( count($names) > 0)
    {
        //$date = date("Y-m-d"); // date("Y-m-d H:i:s");
        // $names = write_database_name_list($table, $date, $names); // read_database_name_list($date, $limit_rows)
        
        $text = names2text($names);
        echo "Mail writed in database: $text";
    }
    else echo "ERROR mail-name to write in database";
    
    $show = 'show';//$date;
}
else if($remove == 'erase')
{
/*
echo "<form id='showNames' action='$loc_adres' method='post'>
            <button id='show' type='submit' name='show' value='show' class='btn btn-default'>Листинг имен</button>
            <input  id='showdatetime' type='text'   size='10' name='datetime'   value='$date'>
            
            <button id='cleanremove'        type='submit' name='remove'         value='erase' class='btn btn-default'>Удалить имена по дате</button>
            <input  id='cleanreset'         type='radio'  name='radio'          value='reset'>reset
            <input  id='cleandelete'        type='radio'  name='radio'          value='delete'>delete 
            <input  id='cleanhiddenvalue'   type='text'   name='hiddenvalue'    value='$date' hidden>
            
            <button id='cleanname'          type='submit' name='remove'         value='erasename' class='btn btn-default'>Текущее имя удалить</button>
            - - - - - [$remove_text]<Br>
     </form>";
*/     
    if($radio == 'reset')
    {
        //$date = date("Y-m-d"); // date("Y-m-d H:i:s");
        // $names = write_database_name_list($table, $date, $names); // read_database_name_list($date, $limit_rows)
        
        $text = names2text($names);
        echo "Name reseted in database at Date $date: $text";
    }
    else if($radio == 'delete')
    {
        //$text = names2text($names);
        $text = '';
        $names = delete_database_name_list($table, $date, $text, "36");
        
        $text = names2text($names);
        echo "Name list DELETED from database at Date $date: $text";
    }
    else echo "Ignore deleting";
    
    $show = 'show';//$date;
}
else if($remove == 'erasename')
{
    if($radio == 'reset')
    {
        //$date = date("Y-m-d"); // date("Y-m-d H:i:s");
        // $names = write_database_name_list($table, $date, $names); // read_database_name_list($date, $limit_rows)
        
        $text = names2text($names);
        echo "Name reseted in database at Date $date: $text";
    }
    else if($radio == 'delete')
    {
        //$text = names2text($names);
        $values = delete_database_name($table, $date);
        
        $id = $values[0];
        $name = $values[1];
        $local_id = $values[2];
        
        //echo "'$name', id=$id, local_id=$local_id  DELETED from database at Date $date";
        //echo "<font color='red'> '$name', id=$id, local_id=$local_id  DELETED from database at Date $date</font>";
        echo "'<font color='red'>$name</font>', id=$id, local_id=$local_id  <font color='red'>DELETED</font> from database at Date <font color='red'>$date</font>";
        //// "<p><font size=$fs_  color='black'> ip = </font><font size=$fs color='$ip_color'>$ip_client</font>
        
    }
    else echo "Ignore deleting";
    
    $show = 'show';//$date;
}
else if($mail_step == 'next')
{
    $mail_adres = next_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
    $show = 'show';
}
else if($mail_step == 'last')
{
    $pointer_row_col = decrement_pointer_row_col($table, $date);// max_col, pointer_row, pointer_col, max_col
    $mail_adres = now_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
    $show = 'show';
}
else if($mail_step == 'now')
{
    
    $mail_adres = now_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
    $show = 'show';
}
else if($create_mail == 'create') // $create_mail  = htmlspecialchars($_REQUEST["create"]);
{//  header("Location: https://ico.wcex.co/?ref=Vbtn0mW&lang=en"); // Производит перенаправление браузера на другой ресурс 
    $mail_adres = next_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
    
    $url = "https://www.mohmal.com/ru/create"; // URL на которы посылаем запрос
    
    $create_name_name = 'name';
    $create_value_name = htmlspecialchars($_REQUEST["name"]);
    
    $create_name_domain = 'domain';
    $create_value_domain = htmlspecialchars($_REQUEST["domain"]);
/*    
    $text_Location = "Location: $url?$create_name_name=$create_value_name&$create_name_domain=$create_value_domain";
    echo $text_Location;
    
    echo "<Br>";
    
    $text_header = 'header("' . $text_Location . '")'; // Производит перенаправление браузера на другой ресурс 
    echo $text_header;
    
    header("Location: $url?$create_name_name=$create_value_name&$create_name_domain=$create_value_domain");
*/    

/* org
echo
"<form id='enterDomain' action='$url' method='post'>
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
        === $name@$domain<Br>
</form>";
*/
?>
<form id="enterDomain" action="<?php echo $url; ?>" name="enterDomain" method="post">
        <input name="<?php echo $create_name_name; ?>"   value="<?php echo $create_value_name; ?>"   type="hidden" />
        <input name="<?php echo $create_name_domain; ?>" value="<?php echo $create_value_domain; ?>" type="hidden" />
</form>
<script>
  document.forms["enterDomain"].submit();
</script>
<?php
/* // https://ru.stackoverflow.com/questions/post-данные-с-перенаправлением

<?php
// тут делаете чё хотите с пост данными
?>
<form action="http://vk.com/" name="myform" method="post">
  <?php foreach ($_POST as $key => $val) { ?>
     <input name="<?php echo $key; ?>" value="<?php echo $val; ?>" type="hidden" />
  <?php } ?>
</form>
<script>
  document.forms["myform"].submit();
</script>
*/


}
else
{
//    $mail_adres = next_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";
//    $show = 'show';
}//header("Location: https://ico.wcex.co/?ref=Vbtn0mW&lang=en"); // Производит перенаправление браузера на другой ресурс 




//----------
if($show == 'show') // strlen($show) > 0)
{
    if($radio == 'reset')
    {
        $names = read_database_name_list($table, "", "1000000"); // read_database_name_list($date, $limit_rows)
        $content = read_database_content($table, "", "1000000");
    }
    else if($count_datetime > 0)// if($count_datetime == 0 || $count_datetime > 0)
    { 
        $names = read_database_name_list($table, $date, "400"); // read_database_name_list($date, $limit_rows)
        $content = read_database_content($table, $date, "400");
    }
    else 
    {
    }
} //---/ $show    

 
    
    
    
    
    
    
    
 
//----------------
$mail_adres = now_mail($table, $date); //    echo "mail_adres: $mail_adres[0]@$mail_adres[1] <Br>";

$name   = strtolower( $mail_adres[0] );   // "abc";
$domain = strtolower( $mail_adres[1] );   // "mohmal.in";

//$name   = "abc";
//$domain = "mohmal.in";

mysql_close($link); // Закрываем соединение MySQL   

//*****************************  
$url = $loc_adres;
/*
else if($create_mail == 'create') // $create_mail  = htmlspecialchars($_REQUEST["create"]);
{
    $url = "https://www.mohmal.com/ru/create"; // URL на которы посылаем запрос
    
    $create_name_name = 'name';
    $create_value_name = htmlspecialchars($_REQUEST["name"]);
    
    $create_name_domain = 'domain';
    $create_value_domain = htmlspecialchars($_REQUEST["domain"]);
    
    header("Location: $url?$create_name_name=$create_value_name&$create_name_domain=$create_value_domain"); // Производит перенаправление браузера на другой ресурс 
}
*/
$text = 
"<form id='enterDomain' action='$url' method='post'>
        <button id='create' class='btn btn-default' type='submit' name='create' value='create'>Создайте</button>
        
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
        === $name@$domain<Br>
</form>";
/* org
$text = 
"<form id='enterDomain' action='$url' method='post'>
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
        === $name@$domain<Br>
</form>";
*/
//<form id='enterDomain' action='$url' method='post'><div> ... </div></form>    
echo $text;


$time_now = date("Y-m-d H:i:s") . "\n"; 
echo "<p>$time_now $url $ip</p>";
//-------------- mailstep


echo "<form id='showNames' action='$loc_adres' method='post'>
            <button id='last' type='submit' name='mailstep' value='last' class='btn btn-default'>Last</button>
            
            <button id='now' type='submit' name='mailstep' value='now' class='btn btn-default'>Now</button> 
            
            <button id='next' type='submit' name='mailstep' value='next' class='btn btn-default'>Next</button>
     </form>";




//-----------------------
//if( strlen($date) < strlen('2017-10-1') )  $date = date("Y-m-d");// $date = date("Y-m-d H:i:s"); 

//$date_now = date("Y-m-d");// $date = date("Y-m-d H:i:s"); 

//  <input  id='show' type='submit' class='btn btn-default' value='Листинг имен'>
echo "<form id='showNames' action='$loc_adres' method='post'>
            <button id='show' type='submit' name='show' value='show' class='btn btn-default'>Листинг имен</button>
            <input  id='showdatetime' type='text'   size='10' name='datetime'   value='$date'>
            
            <button id='cleanremove'        type='submit' name='remove'         value='erase' class='btn btn-default'>Удалить имена по дате</button>
            <input  id='cleanreset'         type='radio'  name='radio'          value='reset'>reset
            <input  id='cleandelete'        type='radio'  name='radio'          value='delete'>delete 
            <input  id='cleanhiddenvalue'   type='text'   name='hiddenvalue'    value='$date' hidden>
            
            <button id='cleanname'          type='submit' name='remove'         value='erasename' class='btn btn-default'>Текущее имя удалить</button>
            - - - - - [$remove_text]<Br>
     </form>";

/*
$show =   htmlspecialchars($_REQUEST["show"]);
$remove = htmlspecialchars($_REQUEST["remove"]);
$radio =  htmlspecialchars($_REQUEST["radio"]);
$hiddenvalue = htmlspecialchars($_REQUEST["hiddenvalue"]);
*/
//------------- <p> </p>


// http://htmlbook.ru/samhtml5/formy/mnogostrochnyi-tekst
/*
$database_text = 'abc
def
ghi';
*/
$db_url = "https://lsl-apachel.c9users.io/wcx-mail-list.php";

$col = 28;
$rows = 36;
$datetime_default = $date; // "2017-10";
//$datetime = "$datetime_default-15";
$database_text = names2text($names);

// $loc_adres
// echo "<form action='$db_url'>
// <p><b><input type='submit' name='writelist' value='Введите список имен для почты'>- - -[$writelist]</b></p>
echo "<form action='$loc_adres'>
    <p><button  id='write' type='submit' name='writelist' value='insert' class='btn btn-default'>Введите список имен для почты</button>- - -[$writelist]<p>
    <input      id='write' type='text'   name='datetime' placeholder='$datetime_default' value='$datetime_default'>
    
    count_datetime: $count_datetime, date: $date
    <br> 
        <textarea name='names'  cols='$col' rows='1' readonly>Entering list names</textarea> 
        <textarea name='number' cols='6'    rows='1' readonly>local\nnumber</textarea>
        <textarea name='stored' cols='$col' rows='1' readonly>Stored database names\n$datetime</textarea> 
    
    count_datetime: $count_datetime, date: $date    
    </br>

        <textarea name='list' cols='$col' rows='$rows'></textarea>
        
        <textarea name='num' cols='6' rows='$rows' readonly> 1\n 2\n 3\n 4\n 5\n 6\n 7\n 8\n 9
10\n11\n12\n13\n14\n15\n16\n17\n18
19\n20\n21\n22\n23\n24\n25\n26\n27
28\n29\n30\n31\n32\n33\n34\n35\n36\n 
        </textarea>
        
        <textarea name='db' cols='$col' rows='$rows' readonly>$database_text</textarea>
    
        
</form>"; // <iframe name='area'  width='$col' height='$rows'>$database_text</iframe>
//<textarea name='list' cols='$col' rows='$rows'>$database_text</textarea>

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
    //echo "<p>count_datetime: $count_datetime, date: $date</p>";
    echo "count_datetime: $count_datetime, date: $date, maximum: $maximum, ";
    print_table($content);  // Выводим результаты в html 
?>    

 </body>
</html>