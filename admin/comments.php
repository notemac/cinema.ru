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
require_once '../models/comments.php';
require_once '../models/films.php';

$link = db_connect();

$action = isset($_GET['action']) ?  $_GET['action'] : '';

if ($action == 'add') {
    if (!empty($_POST)) {
        comment_add($link, $_POST['visitor_name'], $_POST['text'], (int)$_POST['film_id']);
        header("Location: ./comments.php");
    }
    $films = films_all($link);
    $films = array_combine(array_column($films, 'id'), array_column($films, 'name'));
    include '../views/admin_comment.php';
}
elseif ($action == 'delete') {
    if (!isset($_GET["id"]))
        header("Location: ./comments.php");
    $id = (int)$_GET['id'];
    comment_delete($link, $id);
    header('Location: ./comments.php');
}
elseif ($action == 'edit') { 
 
    if (!isset($_GET["id"]))
        header("Location: ./comments.php");
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id >= 0) {
        comment_edit($link, $id, $_POST['visitor_name'], $_POST['text']);
        header('Location: ./comments.php');
    }
    $comment = comment_get($link, $id);
    include '../views/admin_comment.php';
}
else {
    $items = comments_all($link);
    include '../views/admin_comments.php';
}

?>