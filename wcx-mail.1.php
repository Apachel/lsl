
<!DOCTYPE HTML>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>wcx-mail.php</title>
 </head>
 <body>

<?php
// https://lsl-apachel.c9users.io/ip.php

echo $_SERVER['HTTP_X_FORWARDED_FOR'];


//---
/* https://phpclub.ru/talk/threads/Передача-данных-методом-post-без-input-type-submit.43451/

Simple HTTP POST.
Простой пример, показывающий использования метода POST и cURL.
Прежде чем использовать данный код убедитесь, что на Вашем хостинге есть cURL.
©oded by BuH@LicH at sysman.ru 2007
thx to Miscђka
*/
$url = "https://www.mohmal.com/ru/create"; // URL на которы посылаем запрос
$name = "abc"; // = 'abc' логин 
$domain = "mohmal.in"; // = ''; пассворд

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

?>

    <form id="enterDomain" action="https://www.mohmal.com/ru/create" method="post">
        <div>
            <input id="create" class="btn btn-default" type="text" name="name" placeholder="email name-login" value=$name>
            
            <select name="domain"> 
                <option value="mohmal.in">@mohmal.in</option>
                <option value="-------------">-------------</option>
                
                <option value="mailna.co">@mailna.co</option> 
                <option value="mailna.in">@mailna.in</option> 
                <option value="mailna.me">@mailna.me</option> 
                <option value="mohmal.im">@mohmal.im</option> 
                <option value="mohmal.in">@mohmal.in</option>
            </select>
            
            <input id="create" class="btn btn-default" type="submit" value="Создайте">
        </div>
    </form>

 </body>
</html>