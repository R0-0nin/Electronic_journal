<?php

    session_start();
    $pass = $_POST["pass"];
    $reppass = $_POST["newpass"];

    if ($pass != $reppass){

        $_SESSION['change'] = 'Пароли не совпадают';
        header('Location: ../htmls/change.php');
        die();

    }

    else if(strlen($pass) < 8){

        $_SESSION['change'] = 'Длина пароля не менее 8 символов!';
        header('Location: ../htmls/change.php');
        die();

    }

    $myid = $_SESSION['user']['id'];

    $success = new mysqli('localhost', 'root', 'root', 'tasksimit');
    $salt = bin2hex(random_bytes(32));
    $pass = hash('sha256', crypt($pass, $salt));
    $success -> query("UPDATE `users` SET `password` = '$pass', `salt` = '$salt' WHERE  `id` = '$myid'");

    header("Location: ../htmls/hello.php");
    $_SESSION['changed'] = 'Пароль успешно изменён!';
    $success->close();


?>

