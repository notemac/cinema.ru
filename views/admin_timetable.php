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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">Расписание</a></div>
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
            <div class="comments-wrapper">
                <h2 class="film-title title-auth">
                    Расписание сеансов
                </h2>
                <button class="button button-auth" onclick='document.location="\\admin/timetable.php?action=add"'>Добавить</button>
                <table>
                <?php foreach($items as $date => $seances): ?> 
                <tr><td colspan="4"><h2><?=$date?></h2></td> </tr>
                    <?php foreach($seances as $seance): ?> 
                    <tr>
                        <td width="35%"><?=$seance['film_name']?></td>
                        <td width="35%"><?=$seance['time']?></td>
                        <td><a href="\admin/timetable.php?action=edit&id=<?=$seance['id']?>">Редактировать</a></td>
                        <td><a href="\admin/timetable.php?action=delete&id=<?=$seance['id']?>">Удалить</a></td>
                    </tr>
                    <?php endforeach ?>
                <?php endforeach ?> 
                </table>
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