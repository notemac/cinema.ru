<?php
define('ACCESS_DENIED', 
'<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="\css/style.css" rel="stylesheet">
    <title>Admin panel</title>
</head>
<body>
<hr><div style="color: red; font-size: 40px">Доступ запрещен!!!</div><hr>
</body>
</html>');
define('LOGIN_FAILED', '<hr><div style="color: red; font-size: 40px">Неверное имя пользователя или пароль!!!</div><hr>');
define('SESSION_EXPIRED', 
'<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="\css/style.css" rel="stylesheet">
    <style>a:hover { color: white;}</style>
    <title>Admin panel</title>
</head>
<body>
<hr><div style="color: red; font-size: 40px">Время сессии истекло! <a href="\admin/index.php">Войти снова</a></div><hr>
</body>
</html>');
?>
