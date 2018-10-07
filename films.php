<?php
//СТРАНИЧКА С ИНФОРМАЦИЕЙ О ФИЛЬМЕ
require_once './db.php';
require_once './models/films.php';
require_once './models/comments.php';

$link = db_connect();

if (!empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_POST) {
        comment_add($link, '', $_POST['comment'], $id);
    }
    $comments = getCommentsForFilm($link, $id);
    $film = film_get($link, $id);
    include './views/films.php';
}

?>