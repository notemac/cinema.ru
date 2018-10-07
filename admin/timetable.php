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
require_once '../models/timetable.php';
require_once '../models/films.php';

$link = db_connect();

$action = isset($_GET['action']) ?  $_GET['action'] : '';

if ($action == 'add') {
    if (!empty($_POST)) {
        seance_add($link, (int)$_POST['film_id'], $_POST['date'], $_POST['time']);
        header("Location: ./timetable.php");
    }
    $films = films_all($link);
    $films = array_combine(array_column($films, 'id'), array_column($films, 'name'));
    include '../views/admin_seance.php';
}
elseif ($action == 'delete') {
    if (!isset($_GET["id"]))
        header("Location: ./timetable.php");
    $id = (int)$_GET['id'];
    seance_delete($link, $id);
    header('Location: ./timetable.php');
}
elseif ($action == 'edit') { 
 
    if (!isset($_GET["id"]))
        header("Location: ./timetable.php");
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id >= 0) {
        $film_id = (int)$_POST['film_id'];
        seance_edit($link, $id, $film_id, $_POST['date'], $_POST['time']);
        header('Location: ./timetable.php');
    }
    $seance = seance_get($link, $id);
    $films = films_all($link);
    $films = array_combine(array_column($films, 'id'), array_column($films, 'name'));
    include '../views/admin_seance.php';
}
else {
    $items = seances_all($link);
    include '../views/admin_timetable.php';
}

?>