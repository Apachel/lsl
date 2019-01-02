
<!DOCTYPE HTML>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>wcx-mail.php</title>
 </head>
 <body>

<?php
$loc_adres = "https://lsl-apachel.c9users.io/wcx-mail.php";

function print_array($elements)
{
// Выводим результаты в html   http://www.php.su/learnphp/cs/?cycles#foreach
    print "<table>";
        print "\t<tr>\n";
        foreach ($elements as $value) 
        {
            echo "<b>$value</b><br>";
            //print "\t\t<td>$value</td>\n";
        }
        print "\t</tr>\n";
    print "</table>\n";// unset($names);
}

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

//--- search name list  https://www.site-do.ru/php/string.php    http://www.php.su/substr     http://www.php.su/strpos()
//'list'

// $_GET $_POST $_REQUEST
//echo 'Привет ' . htmlspecialchars($_POST["list"]) . '!';
$received_text=htmlspecialchars($_REQUEST["list"]);
echo "<p>list: $received_text</p>";

print_array($_REQUEST);

print_r($_REQUEST);

//$recived_text='нас интересует где находится подстрока';
$text='https://lsl-apachel.c9users.io/wcx-mail-list.php?datetime=2017-10-15&names=Entering+list+names&number=local%0D%0Anumber&stored=Stored+database+names%0D%0A2017-10-15&list=abc%0D%0Adef%0D%0Aghi&num=+1%0D%0A+2%0D%0A+3%0D%0A+4%0D%0A+5%0D%0A+6%0D%0A+7%0D%0A+8%0D%0A+9%0D%0A%0D%0A10%0D%0A11%0D%0A12%0D%0A13%0D%0A14%0D%0A15%0D%0A16%0D%0A17%0D%0A18%0D%0A%0D%0A19%0D%0A20%0D%0A21%0D%0A22%0D%0A23%0D%0A24%0D%0A25%0D%0A26%0D%0A27%0D%0A%0D%0A28%0D%0A29%0D%0A30%0D%0A31%0D%0A32%0D%0A33%0D%0A34%0D%0A35%0D%0A36%0D%0A+%0D%0A++++++++&db=abc%0D%0Adef%0D%0Aghi';
$sub='&list=';
$lim='%0D%0A';

$start=strpos($text,'?datetime=') + 10;
$end=strpos($text,'&names=');
$datetime = substr($text,$start,$end-$start);
echo "<p>datetime: $datetime</p>";

$start=strpos($text,$sub) + 6;//ищет с начала строки
$end=strpos($text,'&num=',$start);//если поиск нужно начать не с начала строки, используем третий параметр

$cut1=substr($text,$start,$end - $start);
$cut2=substr($text,$end,50);

//echo "<p>$sub start: $start</p>$cut1";
//echo "<p>$sub end: $end</p><p>$cut2</p>";

$database_text = "";

while ($start < $end)
{
    $next=strpos($text,$lim,$start);
    
    
    if($next === false || $next >= $end)  
    {
        $name=substr($text,$start,$end - $start);
        $start=$end;
    }
    else
    {
        $name=substr($text,$start,$next - $start);
        $start=$next + 6;
    }
    $names[] = $name;
    //echo "<p>$name</p>";
    
    $database_text = "$database_text\n$name";
}
// echo  "<p>$database_text</p>";

print_array($names);

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
$col = 20;
$rows = 42;
$datetime_default = "2017-10";
$datetime = "$datetime_default-15";

echo "
<form action='$loc_adres'>

    <p><b><input type='submit' value='Введите список имен для почты'></b></p>
    <input type='text' name='datetime' placeholder='$datetime_default-15' value='$datetime_default-'>
    <br> 
        <textarea name='names' cols='$col' rows='1' readonly>Entering list names</textarea> 
        <textarea name='number' cols='6'    rows='2' readonly>local\nnumber</textarea>
        <textarea name='stored' cols='$col' rows='1' readonly>Stored database names\n$datetime</textarea> 
        
    </br>
    <p>
        <textarea name='list' cols='$col' rows='$rows'></textarea>
        
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