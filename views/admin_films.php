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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">Фильмы</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/timetable.php">Расписание</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\admin/comments.php">Комментарии</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- НАВИГАЦИЯ -->
    </header>
    <main>
        <div class="container">
            <div class="films-wrapper">
                <h2 class="film-title title-auth">
                    Список фильмов
                </h2>
                <button class="button button-auth" onclick='document.location="\\admin/films.php?action=add"'>Добавить</button>
                <table>
                <?php foreach($films as $film): ?> 
                    <tr>
                        <td width="70%"><?=$film['name']?></td>
                        <td><a href="\admin/films.php?action=edit&id=<?=$film['id']?>">Редактировать</a></td>
                        <td><a href="\admin/films.php?action=delete&id=<?=$film['id']?>">Удалить</a></td>
                    </tr>
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