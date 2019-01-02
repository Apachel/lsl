<!DOCTYPE HTML>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>ip-wcx.php</title>
 </head>
 <body>
     
     index.html
     
     <!--
<frameset rows="33%,33%,34%">
<frame src="frame1.html" name="fr1">
<frame src="frame2.html" name="fr2">
<frame src="frame3.html" name="fr3">
</frameset>
-->

<frame src="frame1.html" name="fr1">
frameset:
<frameset rows="33%">
<frame src="frame1.html" name="fr1">
</frameset>


<?php // 2017-11-05=19-39=ip-wcx.php
// SELECT * FROM wcx_ip;
// SELECT * FROM wcx_ip ORDER BY ip;

/* 2017-10-14=18-26
https://lsl-apachel.c9users.io/ip-get.php

https://lsl-apachel.c9users.io/mysql.php
https://community.c9.io/t/setting-up-mysql/1718
http://www.php.su/functions/?cat=mysql
*/
//************* 178.95.48.129 Connected successfully (Localhost via UNIX socket) ***********
// server: apachel-lsl-5252239
// user: apachel
// https://lsl-apachel.c9users.io/mysql.php

$ip_client = $_SERVER['HTTP_X_FORWARDED_FOR'];
// echo "$ip_client\n";

//=========
/*
// https://lsl-apachel.c9users.io/ip-wcx.php?name=Fashion&age=9

$name = $_GET['name'];
$age = $_GET['age'];

echo "Hello, $name ! You are $age years !";
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
    $query = "SELECT COUNT(ip) FROM $table WHERE ip = '$ip_client' LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    // get result
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
        foreach ($line as $col_value) 
            $count_ip = $col_value;

    // Освобождаем память от результата 
    mysql_free_result($result);
    
//    echo "count_ip: $count_ip \n";
//---------    
    
    if($count_ip == 0) // ip is not used
    { 
        $data = "GTM +02:00"; // "GTM +03:00";
        $query = "SET time_zone = '+03:00'";
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

//------ INSERT in table 'host' new line whith new  ip ---    
// INSERT host (id, description, datetime, ip, port, OnLine, user) VALUES (id, NOW(), NOW(), '10.10.0.1', 12016, 1, 'data');
        $query = "INSERT INTO $table (id, description, datetime, ip, port, OnLine, user) VALUES (id, NOW(), NOW(), '$ip_client',  0, 1, '$data')";//$query = "SELECT * FROM my_table";
        $result = mysql_query($query) or die("INSERT INTO failed : " . mysql_error());

        // Освобождаем память от результата 
        mysql_free_result($result);
        
//        echo "Data is writed in database: ";

/*
//================        
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
*/        
 
//=======      
//        $ip = '0';        $datetime = '0';        echo "maximum: $maximum \n<p> ip = $ip_client \n<p> dateTime = $datetime";
//        header("Location: https://ico.wcex.co/");

        header("Location: https://ico.wcex.co/?ref=Vbtn0mW&lang=en"); // Производит перенаправление браузера на другой ресурс 
    }
    else
    {
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

//--- PRINT -------------
//----- 1 // http://forum.php.su/topic.php?forum=71&topic=7337#
/*
$print_text = "<p>ip = $ip_client \n<p> dateTime = $datetime \n<p> replay: $replay \n<p> maximum: $maximum";

if(isset($_GET['size'])) $size=$_GET['size'];
else $size=4;
if($size==0) $size=8;
else if($size==1) $size=12;
else if($size==2) $size=18;
else if($size==3) $size=24;
?>
<p style="font-size: <?php echo $size;?>px">Выбрать размер шрифта из списка:</p>
<form name="form1" action="">
 <table><TR><TD>Размер:</TD>
            <TD><select name="size" >
            <option value="0">8</option>
            <option value="1">12</option>
            <option value="2">18</option>
            <option value="3">24</option></select></TD></TR>
  </table>
<input type="submit" value="сменить шрифт текста" >
</form>
<script>
document.form1.size.options[<?php echo (isset($_GET['size'])) ? $_GET['size'] : 3;?>].selected=true
</script>
<?php
*/

//----- 2 // http://forum.php.su/topic.php?forum=71&topic=7337#
/*
<head>
<script>
function reSize(){
var doc = document.form1.size
var tsize
if(doc.value==0) tsize=8
else if(doc.value==1) tsize=12
else if(doc.value==2) tsize=18
else if(doc.value==3) tsize=24
else tsize=4
document.getElementById('paragraph').style.fontSize = tsize+"px"
}
</script>
</head>
<p> <font id="paragraph" size="4"> Выбрать размер шрифта из списка:</font> </p>
<form name="form1" action="">
 <table><TR><TD>Размер:</TD>
            <TD><select name="size">
            <option value="0">8</option>
            <option value="1">12</option>
            <option value="2">18</option>
            <option value="3">24</option></select></TD></TR>
  </table>
<input type="button" onclick="reSize()" value="сменить шрифт текста" >
</form>

//<input name="<?php echo $create_name_name; ?>"   value="<?php echo $create_value_name; ?>"   type="hidden" />
*/

// http://www.cyberforum.ru/php-beginners/thread429460.html
function randhtmlcolor()
{
    $color = "";
    $sym = "0123456789ABCDEF";
    for($i = 0; $i < 6; $i++){
        $text .= $sym[rand(0,15)];
    }
    return "#$color";
}

function getRandColor()
{
    $color = '';
    for($i=0;$i<3;$i++) 
    {
        $r = rand(0, 255);
        $color .= ($r<16)?'0'.dechex($r):dechex($r);
    }
    return  "$color";
}
$c = getRandColor();
// echo "<body bgcolor='$c'>";


function getRandZoom()
{
    $color = '';
    for($i=0;$i<3;$i++) 
    {
        $r = rand(0, 255);
        $color .= ($r<16)?'0'.dechex($r):dechex($r);
    }
    return  "#$color";
}

function setZoomColor($color) 
{
    $ZoomColor = "#";

    // $sym = "0123456789ABCDEF";
/*    $light = 0;
    $dark = 2;
    
    for($i = 1; $i <= 6; $i++)
    {
        $text = substr($color,$i,1); 
        $i++;
        $text .= substr($color,$i,1);  //        $text .= $ZoomColor[$i];
        
        $base10 = hexdec($text);
        if($base10 > 256/$dark) $light = 1;
    }
*/
    $zoom = rand(63, 255) / 255;
    
    for($i = 1; $i <= 6; $i++)
    {   
        $text = substr($color,$i,1); 
        $i++;
        $text .= substr($color,$i,1);  //        $text .= $DarkColor[$i];
        
        $base10 = hexdec($text);
        
////        if($light = 1) 
                    $base10 *= $zoom;
         
        $text = dechex( $base10 );
        
        if( strlen($text) == 1)  $text = "0$text";
        
        $ZoomColor .= $text;
        
        // echo "$ZoomColor<Br>";
    }
    
    echo "<font color='white'> $color ==Zoom:$zoom==> $ZoomColor; </font>";
    return $ZoomColor;
}

function setDarkColor($color)
{
    $DarkColor = "#";

    // $sym = "0123456789ABCDEF";
    $light = 0;
    $dark = 2;
    
    for($i = 1; $i <= 6; $i++)
    {
        $text = substr($color,$i,1); 
        $i++;
        $text .= substr($color,$i,1);  //        $text .= $DarkColor[$i];
        
        $base10 = hexdec($text);
        if($base10 > 256/$dark) $light = 1;
    }
    
    for($i = 1; $i <= 6; $i++)
    {   
        $text = substr($color,$i,1); 
        $i++;
        $text .= substr($color,$i,1);  //        $text .= $DarkColor[$i];
        
        $base10 = hexdec($text);
        
        if($light = 1) $base10 /= $dark;
         
        $text = dechex( $base10 );
        
        if( strlen($text) == 1)  $text = "0$text";
        
        $DarkColor .= $text;
        
        // echo "$DarkColor<Br>";
    }
    
    echo "<font color=$color>$color</font> ==> <font color=$DarkColor>$DarkColor; </font>";
    return $DarkColor;
}  

function getRandColorDark()
{
    return setDarkColor( getRandColor() );
} 


//------------
// http://htmlbook.ru/html/font
// http://www.cyberforum.ru/php-beginners/thread416764.html
// http://forum.php.su/topic.php?forum=71&topic=7337#
// http://htmlbook.ru/html/value/color
/*
Имя цвета	Цвет	Описание	Шестнадцатеричное значение
aqua	 	Голубой	#00ffff
black	 	Черный	#000000
blue	 	Синий	#0000ff
fuchsia	 	Фуксия	#ff00ff
gray	 	Серый	#808080
green	 	Зеленый	#008000
lime	 	Светло-зеленый	#00ff00
maroon	 	Темно-красный	#800000
navy	 	Темно-синий	#000080
olive	 	Оливковый	#808000
purple	 	Фиолетовый	#800080
red	 	    Красный	#ff0000
silver	 	Светло-серый	#c0c0c0
teal	 	Сине-зеленый	#008080
white	 	Белый	#ffffff
yellow	 	Желтый	#ffff00

magenta
*/
$len = strlen($datetime);
$space = strpos($datetime,' ');
$date = substr($datetime,0,$space);
$time = substr($datetime,$space,$len-$space);

$fs_ = 12;
$fs = 100;// 72;
$fs_0 = 12;
// echo "0.<p>ip = $ip_client \n<p> dateTime = $datetime \n<p> replay: $replay \n<p> maximum: $maximum";

//$print_text = "<p>ip = $ip_client \n<p> dateTime = $datetime \n<p> replay: $replay \n<p> maximum: $maximum";

//$next=strpos($text,$lim,$start);
//$name=substr($text,$start,$next - $start);

$point=strpos($ip_client,'.');
$ip_0 = substr($ip_client,0,$point);

// Теория цвета в цифрах  https://habrahabr.ru/post/189766/   
//if( !($ip_0 == '91' || $ip_0 == '178')  )

//--------------
//    "UPDATE $table SET `ip` = '$updateip' WHERE id = '1' LIMIT 1";
$query = "SELECT `protocol` FROM $table WHERE `id` = '1' LIMIT 1";
$result = mysql_query($query) or die("Query failed : " . mysql_error());

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
    foreach ($line as $value) 
        $fixed_ip = $value;
mysql_free_result($result);// Освобождаем память от результата 


////  echo "<p><font size=$fs_  color='fuchsia'> fixed ip = </font><font size=$fs color='fuchsia'>$fixed_ip</font>"; // test


//------------
if($ip_0 == '46')
{
        if($fixed_ip == $ip_client)
        {
            $ip_color   = "navy";
            $date_color = "blue";
            $time_color = "navy";
            echo "<body bgcolor='#b0b0ff'>";
        }
        else 
        {
            if($date == date("Y-m-d"))
            {
                echo "<body bgcolor='#ffffb0'>"; //echo "<body bgcolor='yellow'>";
                //$ip_color = "fuchsia";
                //echo "<p>$date</p>";
                $ip_color   = "#008000";//getRandColor(); // randhtmlcolor(); // "#008000";
                $date_color = getRandColorDark();// "#004400";// dark-green    // "green";
                $time_color = "#008000";//getRandColor(); // "#008000";
            }
            else
            {
                $BackgroundColor = setZoomColor("#b0ffb0");
                echo    "<body bgcolor='$BackgroundColor'>"; // light-green
                ////echo "<p>$date</p>";
                
                $ip_color   = getRandColorDark(); // randhtmlcolor(); // "#008000";
                $date_color = getRandColorDark();//  $date_color = "#004400";// dark-green    // "green";
                $time_color = getRandColorDark(); // "#008000";
                
            }
            //echo "<Br><font color=$date_color>$date_color</font>";
        }
}
else 
{
        $ip_color   = "maroon";
        $date_color = "red";
        $time_color = "maroon";
        echo "<body bgcolor='#ffb0b0'>";/// #808080
}
//------------

//    print "<p><font size=$fs_ color='black'> ip.0 = </font><font size=$fs color='$color'>$ip_0</font>";


//print "<p><font size=$fs  color='$color'>$print_text</font>";
$print_text = 
"<p><font size=$fs_  color='black'> ip = </font><font size=$fs color='$ip_color'>$ip_client</font>
 <p><font size=$fs_  color='black'> Date = </font><font size=$fs  color='$date_color'>$date</font>
 <p><font size=$fs_  color='black'> Time = </font><font size=$fs  color='$time_color'>$time</font>

 <p><font size=$fs_  color='black'> replay: </font><font size=$fs  color='fuchsia'>$replay</font>
<font size='$fs_0' color='black'>
    <p> maximum: $maximum
</font>";


print $print_text;

/*    
//================OK=========
?>
<head>
<script>
function reSize(){
var doc = document.form1.size
var tsize

if(doc.value>=8 && doc.value<=500)    tsize=doc.value
else tsize=72

document.getElementById('paragraph').style.fontSize = tsize+"px"
}
</script>
</head>
<p> <font id="paragraph" size="72"> $print_text <?php echo $print_text; ?>  </font> </p>

<form name="form1" action="">
    <table><TR><TD>Размер:</TD>
            <TD><select name="size">
                <option value="72">72</option>
                <option value="--------">--------</option>
                <option value="8">8</option>
                <option value="12">12</option>
                <option value="18">18</option>
                <option value="24">24</option>
                <option value="36">36</option>
                <option value="50">50</option>
                <option value="72">72</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="220">220</option>
                <option value="330">330</option>
                <option value="500">500</option>
            </select></TD></TR>
    </table>
      <input type="button" onclick="reSize()" value="сменить размер шрифта текста" >
      <button id='reSize()' type='submit' name='reSize' value='reSize()'>сменить размер шрифта текста</button>
      <input id='reSize()' type='submit' name='reSize' value='reSize()'>сменить размер шрифта текста</input>
</form>

<?php
//==========OK=========/
*/

// <input type="button" onclick="reSize()" value="сменить размер шрифта текста" >

// <input name="button"  onclick="reSize()"  value="72"   type="hidden" />
//<input type="hidden" onclick="reSize()" value="сменить шрифт текста" >

        // echo "3.<p>ip = $ip_client \n<p> dateTime = $datetime \n<p> replay: $replay \n<p> maximum: $maximum";
        
//------------        
/*
// http://www.cyberforum.ru/php-beginners/thread416764.html
<html> <head>
 <title> №3-3 </title>
 </head> <body> 
 
<?php
 
    $color = "red";
 
    print "<p><font color='$color'>PHP работает!</font>";
 
// Приветствие на русском языке
   function Ru() { print "<p><font color=$color>Здравствуйте!</font>"; }
 
$language = "Ru"; // Выбрали русский язык
 
$language();           // Выполнение функции-переменной
 
?>
 </body> </html>
 
*/

/*
    $color = "red";
    print "<p><font size=72  color='$color'>PHP работает!</font>";
    //echo "<p><span style='$color'>Example</span></p>";
    
// Приветствие на русском языке
   function Ru() { print "<p><font color=$color>Здравствуйте!</font>"; }
 
$language = "Ru"; // Выбрали русский язык
 
$language();           // Выполнение функции-переменной
*/ 
 
 





    }
//========== ip FIX ==========

$ip = $ip_client;
$updateip =   htmlspecialchars($_REQUEST["updateip"]);
//echo "<Br>htmlspecialchars: $updateip";

//if($updateip == "fix")
//if($updateip == "$ip_client") 
if($updateip != "")
{
    $query = "UPDATE $table SET `protocol` = '$updateip' WHERE `id` = '1' LIMIT 1";
    //$query = "UPDATE $table SET `ip`='', `protocol` = '$updateip' WHERE `id` = '1' LIMIT 1";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    
    $fixed_ip = $updateip;
    
    echo "<Br>ip $updateip FIXED"; // //$ip_client = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    $ipsend = '';
}
else  $ipsend = $ip; // $fixed_ip; 




//----- 
/*
$query = "SELECT `protocol` FROM $table WHERE id = 1 LIMIT 1";//$query = "SELECT * FROM my_table";
$result = mysql_query($query) or die("Query failed : " . mysql_error());

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) // get result
    foreach ($line as $col_value) 
        $fixed_ip = $col_value;

mysql_free_result($result);// Освобождаем память от результата
*/


/*
<form name='ipfix' action='' method='post'>
        <input  id='ipfix' type="submit" value="refresh">
        <button id='ipfix' type='submit' name='updateip' value='<?php echo "$ipsend"; ?>' class='btn btn-default'>ip-FIX</button>
////        <input  id='ipfix' type='text'   name='updateip' placeholder='ip to fixing' value='<?php echo "$ipsend"; ?>'>
</form>

<font size='72'>
 ***
</font>
*/
?>

<form name='ipfix' action='' method='post'>
    
        <input  id='ipfix' type="submit"                 style="width:100x;height:75px" value="refresh">
        <button id='ipfix' type='submit' name='button'   style="width:200x;height:75px" class='btn btn-default'><font size='72'>ip-FIX</font></button>
        <input  id='ipfix' type='text'   name='updateip' placeholder='ip to fixing' value='<?php echo "$ipsend"; ?>'>
        
        style="width:100x;height:75px"
    
</form>

<?php   
echo "<p><font size=$fs_  color='fuchsia'> fixed ip = </font><font size=$fs color='fuchsia'>$fixed_ip</font>";
/*
if(isset($_GET['size'])) $size=$_GET['size'];
else $size=4;
if($size==0) $size=8;
else if($size==1) $size=12;
else if($size==2) $size=18;
else if($size==3) $size=24;
?>
<p style="font-size: <?php echo $size;?>px">Выбрать размер шрифта из списка:</p>
<form name="form1" action="">
 <table><TR><TD>Размер:</TD>
            <TD><select name="size" >
            <option value="0">8</option>
            <option value="1">12</option>
            <option value="2">18</option>
            <option value="3">24</option></select></TD></TR>
  </table>
<input type="submit" value="сменить шрифт текста" >
</form>

<script>
document.form1.size.options[<?php echo (isset($_GET['size'])) ? $_GET['size'] : 3;?>].selected=true
</script>
<?php
*/


     
//=============================
// efokpo@mailna.in

?>
<head>
<script>
function reSize(){
var doc = document.form1.size
var tsize

if(doc.value>=8 && doc.value<=500)    tsize=doc.value
else tsize=72

document.getElementById('paragraph').style.fontSize = tsize+"px"
}
</script>
</head>
<p> <font id="paragraph" size="12"> Выбрать размер шрифта из списка:</font> </p>
<form name="form1" action="">
 <table><TR><TD>Размер:</TD>
            <TD><select name="size">
                <option value="72">72</option>
                <option value="--------">--------</option>
                <option value="8">8</option>
                <option value="12">12</option>
                <option value="18">18</option>
                <option value="24">24</option>
                <option value="36">36</option>
                <option value="50">50</option>
                <option value="72">72</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="220">220</option>
                <option value="330">330</option>
                <option value="500">500</option>
            </select></TD></TR>
  </table>
<input type="button" onclick="reSize()" value="сменить шрифт текста" >
</form>

<!--
<frameset rows="33%,33%,34%">
<frame src="frame1.html" name="fr1">
<frame src="frame2.html" name="fr2">
<frame src="frame3.html" name="fr3">
</frameset>
-->
<frameset rows="33%">
<frame src="frame1.html" name="fr1">
</frameset>

<?php

// <input type="button" onclick="reSize()" value="сменить размер шрифта текста" >
// <button id='reSize()' type='submit' name='reSize' value='reSize()'>сменить размер шрифта текста</button>

//=============================
    // Закрываем соединение 
    mysql_close($link);
/*   
    ob_start();
    $buffer = ob_get_contents();
    ob_end_clean();
    echo $buffer;
*/
?>


 </body>
</html>