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


require_once '../db.php';
require_once '../models/films.php';

$link = db_connect();

$action = isset($_GET['action']) ?  $_GET['action'] : '';

if ($action == 'add') {
    if (!empty($_POST)) {
        film_add($link, $_POST['name'], $_POST['country'], $_POST['genre'], $_POST['actor'], $_POST['description'], $_POST['poster']);
        header("Location: ./films.php");
    }
    include '../views/admin_film.php';
}
elseif ($action == 'delete') {
    if (!isset($_GET["id"]))
        header("Location: ./films.php");
    $id = (int)$_GET['id'];
    film_delete($link, $id);
    header('Location: ./films.php');
}
elseif ($action == 'edit') { 
 
    if (!isset($_GET["id"]))
        header("Location: ./films.php");
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id >= 0) {
        film_edit($link, $id, $_POST['name'], $_POST['country'], $_POST['genre'], $_POST['actor'], $_POST['description'], $_POST['poster']);
        header('Location: ./films.php');
    }
    $film = film_get($link, $id);
    include '../views/admin_film.php';
}
else {
    $films = films_all($link);
    include '../views/admin_films.php';
}

?>