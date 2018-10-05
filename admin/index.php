<?php 
    session_start();
    if (!empty($_SESSION['admin'])) {
        header("Location: ./films.php");
    }

    require_once '../db.php';
    $link = db_connect();

    if ($_POST) 
    {
        if ($_POST['login'] and $_POST['password']) 
        {
            if (!is_admin($link, $_POST['login'], $_POST['password'])) {
                require_once '../defines.php';
                echo LOGIN_FAILED;
            }
            else {
                $_SESSION['admin'] = true;
                $_SESSION['created'] = time();
                // Ending a session in 30 minutes from the starting time
                $_SESSION['expired'] = $_SESSION['created'] + 30*60;
                header("Location: ./films.php");
            }
        }
    }
    include '../views/admin.php';
?>