<?php
/* 2017.08-22-12-40
https://lsl-apachel.c9users.io/mysql.php
https://community.c9.io/t/setting-up-mysql/1718
http://www.php.su/functions/?cat=mysql


//------
List of all MySQL commands:
Note that all text commands must be first on line and end with ';'
?         (\?) Synonym for `help'.
clear     (\c) Clear the current input statement.
connect   (\r) Reconnect to the server. Optional arguments are db and host.
delimiter (\d) Set statement delimiter.
edit      (\e) Edit command with $EDITOR.
ego       (\G) Send command to mysql server, display result vertically.
exit      (\q) Exit mysql. Same as quit.
go        (\g) Send command to mysql server.
help      (\h) Display this help.
nopager   (\n) Disable pager, print to stdout.
notee     (\t) Don't write into outfile.
pager     (\P) Set PAGER [to_pager]. Print the query results via PAGER.
print     (\p) Print current command.
prompt    (\R) Change your mysql prompt.
quit      (\q) Quit mysql.
rehash    (\#) Rebuild completion hash.
source    (\.) Execute an SQL script file. Takes a file name as an argument.
status    (\s) Get status information from the server.
system    (\!) Execute a system shell command.
tee       (\T) Set outfile [to_outfile]. Append everything into given outfile.
use       (\u) Use another database. Takes database name as argument.
charset   (\C) Switch to another charset. Might be needed for processing binlog with multi-byte charsets.
warnings  (\W) Show warnings after every statement.
nowarning (\w) Don't show warnings after every statement.

For server side help, type 'help contents'
//-----------

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

CREATE USER 'username'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'username'@'%' WITH GRANT OPTION;

CREATE USER 'apachel'@'apachel-lsl-5252239' IDENTIFIED BY 'T*3';
GRANT ALL PRIVILEGES ON *.* TO 'apachel'@'apachel-lsl-5252239' WITH GRANT OPTION;

mysql> CREATE USER 'apachel'@'%' IDENTIFIED BY 'T*3';
ERROR 1396 (HY000): Operation CREATE USER failed for 'apachel'@'%'
mysql> CREATE USER 'apachel'@'apachel-lsl-5252239' IDENTIFIED BY 'Tktrnhjysrf13';
Query OK, 0 rows affected (0.00 sec)

mysql> GRANT ALL PRIVILEGES ON *.* TO 'apachel'@'apachel-lsl-5252239' WITH GRANT OPTION;
Query OK, 0 rows affected (0.00 sec)

mysql> 
//------
You can then connect to the database with following parameters:

    Hostname - $IP (The same local IP as the application you run on Cloud9)
    Port - 3306 (The default MySQL port number)
    User - $C9_USER (Your Cloud9 user name)
    Password - "" (No password since you can only access the DB from within the workspace)
    Database - c9 (The database username)

To verify your hostname, you can connect to the mysql cli and show the host by running the following commands:

mysql-ctl cli

Once connected to the mysql shell, run the following:

select @@hostname;

Importing data into your database

To import existing data into your database run following commands:

mysql-ctl cli

You are now in the MySQL environment and can start the import:

mysql> use c9
mysql> source PATH_TO_SQL_FILE.sql

To verify that everything got imported run:

mysql> show tables;
//*********
//    -> mysql-ctl cli
mysql> use c9;
Database changed
mysql> show tables;
Empty set (0.00 sec)

// http://www.spravkaweb.ru/mysql/sql/createdb
// CREATE DATABASE `database_name` CHARACTER SET utf8 COLLATE utf8_general_ci;
mysql> CREATE DATABASE `host` CHARACTER SET cp1251 COLLATE cp1251_general_ci;
Query OK, 1 row affected (0.00 sec)

mysql> SHOW CREATE DATABASE `host`;
+----------+-----------------------------------------------------------------+
| Database | Create Database                                                 |
+----------+-----------------------------------------------------------------+
| host     | CREATE DATABASE `host` //!40100 DEFAULT CHARACTER SET cp1251  |
+----------+-----------------------------------------------------------------+
1 row in set (0.00 sec)

mysql> CREATE TABLE `host` (
    -> `id` INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
    -> `description` VARCHAR(128) NULL DEFAULT NULL,
    -> `datetime` DATETIME NULL DEFAULT '2000-01-01 00:00:00',
    -> `ip` VARCHAR(15) NULL DEFAULT '192.168.000.001',
    -> `port` INT(5) UNSIGNED NULL DEFAULT '0',
    -> `protocol` VARCHAR(50) NULL DEFAULT 'http',
    -> `OnLine` INT(1) NULL DEFAULT '1',
    -> `server_name` VARCHAR(50) NULL DEFAULT 'server',
    -> `cgi` VARCHAR(50) NULL DEFAULT 'cgi.exe',
    -> `php` VARCHAR(50) NULL DEFAULT 'index.php',
    -> `mysql` VARCHAR(50) NULL DEFAULT 'apachel',
    -> `user` VARCHAR(50) NULL DEFAULT 'apachel',
    -> PRIMARY KEY (`id`),
    -> UNIQUE INDEX (`description`)
    -> )
    -> COLLATE='cp1251_general_ci'
    -> ENGINE=InnoDB
    -> ROW_FORMAT=COMPACT
    -> AUTO_INCREMENT=2
    -> ;
Query OK, 0 rows affected (0.03 sec)

mysql> INSERT INTO `host` (`id`, `description`, `datetime`, `ip`, `port`, `protocol`, `OnLine`, `server_name`, `cgi`, `php`, `mysql`, `user`) VALUES
    -> (1, 'template', '2000-01-01 00:00:00', '192.168.0.1', 12046, 'http', 0, 'cloud9', 'cgi.exe', 'index.php', 'database', 'apachel');
Query OK, 1 row affected (0.00 sec)




//***************************************
mysql> CREATE DATABASE `web` CHARACTER SET cp1251 COLLATE cp1251_general_ci;
Query OK, 1 row affected (0.00 sec)

mysql> use web;
Database changed


ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '-




// !40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ' at line 1
Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected, 1 warning (0.00 sec)

Query OK, 1 row affected (0.01 sec)

Query OK, 0 rows affected, 1 warning (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

Query OK, 0 rows affected (0.00 sec)

+---------------+
| Tables_in_web |
+---------------+
| host          |
+---------------+
1 row in set (0.17 sec)

mysql> SELECT * FROM host;
+----+-------------+---------------------+-------------+-------+----------+--------+-------------+---------+-----------+----------+---------+
| id | description | datetime            | ip          | port  | protocol | OnLine | server_name | cgi     | php       | mysql    | user    |
+----+-------------+---------------------+-------------+-------+----------+--------+-------------+---------+-----------+----------+---------+
|  1 | template    | 2000-01-01 00:00:00 | 192.168.0.1 | 12046 | http     |      0 | cloud9      | cgi.exe | index.php | database | apachel |
+----+-------------+---------------------+-------------+-------+----------+--------+-------------+---------+-----------+----------+---------+
1 row in set (0.00 sec)

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


//************* 178.95.48.129 Connected successfully (Localhost via UNIX socket) ***********
// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
echo "$ip\n";
//echo "\n";
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP'); //getenv('apachel-lsl-5252239');// getenv('IP'); 
    $username = getenv('C9_USER');// getenv('apachel');//getenv('C9_USER');
    $password = "";//"T*3";
    $database = "web";//"c9";
    $dbport = 3306;
    $table = 'host';
/*
$servername='sql204.epizy.com'; 
$username='epiz_23236858'; 
$password='hA2Q5pQhE*';  // hA2Q5pQhE*
$database='epiz_23236858_web'; 
$dbport = 3306;
$table = 'host';
*/

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

    // Выполняем SQL-запрос 
    $query = "SELECT * FROM $table";//$query = "SELECT * FROM my_table";
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

    // Закрываем соединение 
    mysql_close($link);
/*
178.95.48.129 Connected successfully
1	template	2000-01-01 00:00:00	192.168.0.1	12046	http	0	cloud9	cgi.exe	index.php	database	apachel
*/
?>
