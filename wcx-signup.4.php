
<html>

<head>

    /* Google reCaptcha JS */

    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>

<form action="" method="post">

    Username

    <input type="text" name="username" class="input" />

    Password

    <input type="password" name="password" class="input" />

    <div class="g-recaptcha" data-sitekey="Google Site Key"></div>

    <input type="submit"  value="Log In" />

    <span class='msg'><?php echo $msg; ?></span>

</form>

</body>

</html>
