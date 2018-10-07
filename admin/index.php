<?php 
    session_start();
    if (!empty($_SESSION['admin'])) {
        header("Location: ./films.php");
    }
    if (isset($_GET['exit']))
    {
        unset($_SESSION['expired']);
        unset($_SESSION['admin']);
        session_destroy();
        header("Location: ./index.php");
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
                // Ending a session in 60 minutes from the starting time
                $_SESSION['expired'] = $_SESSION['created'] + 60*60;
                header("Location: ./films.php");
            }
        }
    }
    include '../views/admin.php';
?>