<?php 
session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/defines.php';
if (empty($_SESSION['admin'])) {
    session_destroy();
    die(ACCESS_DENIED);
}

$now = time();
if ($now > $_SESSION['expired']) {
    session_destroy();
    die(SESSION_EXPIRED);
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="\css/style.css" rel="stylesheet">
    <title>Admin panel</title>
</head>

<body>
    <header>
        <!-- НАВИГАЦИЯ -->
        <nav>
            <div class="container">
                <div class="navbar">
                    <div class="navbar-logo"></div>
                    <div class="navbar-wrapper">
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/films.php">Фильмы</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/timetable.php">Расписание</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/comments.php">Комментарии</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/index.php?exit=yes">Выйти</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- НАВИГАЦИЯ -->
    </header>
    <main>
        <div class="container">
            <div class="films-wrapper">
                <h2 class="film-title">
                    Редактирование сеанса
                </h2>
                <form class="form-comment" method="post" action="\admin/timetable.php?action=<?=@$_GET['action']?>&id=<?=@$_GET['id']?>">
                    <label for="film_id">Фильм</label>
                    <select class="auth-input" name="film_id" autofocus>
                    <?php foreach($films as $film_id => $film_name): ?>
                        <option value="<?=$film_id?>" <? if ($film_id == $seance['film_id']) echo 'selected'?>><?=$film_name?></option>
                    <?php endforeach ?>
                    </select>
                    <label for="date">Дата</label>
                    <input class="auth-input" type="date" name="date" value="<?=@$seance['date']?>" required>
                    <label for="time">Время</label>
                    <input class="auth-input" type="text" name="time" value="<?=@$seance['time']?>" maxlength="100" placeholder="hh:mm hh:mm ..."  required>
                    <button type="submit" class="button button-auth">Сохранить</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-item"> </div>
            </div>
        </div>
    </footer>
</body>

</html>