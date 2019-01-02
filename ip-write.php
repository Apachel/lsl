<?php
/* 2017.08-22-12-40
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
//************* 178.95.48.129 Connected successfully (Localhost via UNIX socket) ***********
// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php
    $servername = getenv('IP'); //getenv('apachel-lsl-5252239');// getenv('IP'); 
    $username = getenv('C9_USER');// getenv('apachel');//getenv('C9_USER');
    $password = "";//"T*3";
    $database = "web";//"c9";
    $dbport = 3306;
    $table = 'host';
    $data = 'test';
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
echo "Now my ip: $ip\n";  

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
            $maximum = $col_value + 1;

    // Освобождаем память от результата 
    mysql_free_result($result);
 
echo ". maximum line in table=$maximum; \n<p> ";    

//------ get last ip --------
$query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $last_ip = $col_value;
    
        // Освобождаем память от результата 
        mysql_free_result($result);
        
    echo "Last ip in MySQL database '$database', table '$table': $last_ip\n<p> ";   
    
    if($last_ip == $ip)
        $result = 'true';
    else
    {
//------ INSERT in table 'host' new line whith new  ip ---    
    //              INSERT host (id, description, datetime, ip, port, OnLine, user) VALUES (id, NOW(), NOW(), '10.10.0.1', 12016, 1, 'data');
        $query = "INSERT INTO $table (id, description, datetime, ip, port, OnLine, user) VALUES (id, NOW(), NOW(), '$ip',  12046, 1, '$data')";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    }    
    
    if($result == 'true') 
    {
        echo "Data is writed in database: ";
//----- print fields/columns of table ---------
//        getFields();
        $query = "SELECT COLUMN_NAME
                    FROM information_schema.COLUMNS
                    WHERE TABLE_SCHEMA = DATABASE()
                      AND TABLE_NAME = 'my_table'
                    ORDER BY ORDINAL_POSITION";
        
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

        // Выводим результаты в html 
        print "<table>";
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
        
//-------- print lines/rows of table -------
        $query = "SELECT * FROM $table WHERE id = $maximum LIMIT 1"; //$query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";
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
        $query = "SELECT ip FROM $table WHERE id = ($maximum+1) LIMIT 1";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
        // get result
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
            foreach ($line as $col_value) 
                $table_ip = $col_value;
    
        // Освобождаем память от результата 
        mysql_free_result($result);
    }
    else echo "ERROR at writing in database.";
//==========
    // Закрываем соединение 
    mysql_close($link);
    
//echo ".\n My ip: $table_ip"; // SELECT * FROM host;
echo ".\n My ip: $ip"; // SELECT * FROM host;
/*
178.95.48.129 Connected successfully
1	template	2000-01-01 00:00:00	192.168.0.1	12046	http	0	cloud9	cgi.exe	index.php	database	apachel
*/
?>