<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>wcx-mail-example.php</title>
</head>
<body>

<p>http://php.net/manual/ru/tutorial.forms.php</p>
<p>http://php.net/manual/ru/language.variables.external.php</p>    
<p>https://ru.stackoverflow.com/questions/76334/Простая-форма-ввода-данных</p>
<p>http://www.php.su/articles/?cat=examples&page=069</p>

<p>http://php-include.ru/stati/forma-vvoda-php</p>

<?php
$name = isset($_POST['name']) ? $_POST['name'] : 'Unknown';
$age = isset($_POST['age']) and $_POST['age'] > 0 ? (int) $_POST['age'] : 'Unknown';
echo 'Привет,' . $name . ',  Вам ' . $age . ' лет ';
?>

<form action="https://lsl-apachel.c9users.io/wcx-mail.example.php" method="post">
    Введите имя: <input type=text name="name"><br>
    Введите возраст: <input type=text name="age"><br>
    <input type=submit value="GO!">
</form>

</body>
</html>