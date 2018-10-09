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
                    Редактирование фильма
                </h2>
                <form class="form-film" method="post" action="\admin/films.php?action=<?=@$_GET['action']?>&id=<?=@$_GET['id']?>">
                    <label for="name">Название</label>
                    <input class="auth-input" type="text" name="name" value="<?=@$film['name']?>" maxlength="100" autofocus required>
                    <label for="country">Страна</label>
                    <input class="auth-input" type="text" name="country" value="<?=@$film['country']?>" maxlength="50" required>
                    <label for="genre">Жанр</label>
                    <input class="auth-input" type="text" name="genre" value="<?=@$film['genre']?>" maxlength="150" placeholder="жанр1/жанр2/жанр3/..." required>
                    <label for="genre">В ролях</label>
                    <input class="auth-input" type="text" name="actor" value="<?=@$film['actor']?>" maxlength="400" required>
                    <label for="description">Описание</label>
                    <textarea class="auth-input" type="text" name="description" value="" rows="10" maxlength="1000" required><?=@$film['description']?></textarea>
                    <label for="poster">Постер</label>
                    <input class="auth-input" type="file" name="poster" value="">
                    <span style="color: #5e5bfa;">Текущий постер: <em><?=@$film['poster']?></em><br></span>
                    <img src="\img/films/<?=@$film['poster']?>" alt="Не удалось загрузить постер" width="300px" style="margin-top: 5px;">
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