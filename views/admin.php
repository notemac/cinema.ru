<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="\css/style.css" rel="stylesheet">
    <title>Admin panel</title>
</head>

<body>
    <header> </header>
    <main>
        <div class="container">
            <div class="auth">
                <h2 class="title title-auth"> Вход в панель администратора </h2>
                <form method="post" action="../admin/index.php">
                    <input class="auth-input" type="text" name="login" value="<?=@$_POST['login']?>" placeholder="Логин" autofocus required>
                    <input class="auth-input" type="password" name="password" value="<?=@$_POST['password']?>" placeholder="Пароль" required>
                    <button type="submit" class="button button-auth">Войти</button>
                </form>
            </div>
        </div>
    </main>
    <footer> </footer>
</body>

</html>


