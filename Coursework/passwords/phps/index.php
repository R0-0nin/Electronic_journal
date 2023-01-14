<?php

session_start();

$connection = new mysqli('localhost', 'root', 'root','tasksimit');

$email = $_POST["email"];
$password = $_POST["password"];

if($email == null || $password == null){

    $_SESSION['message'] = 'Введите данные!';
    header("Location: ../htmls/index.php");
    die();

}

$a = $connection->query("SELECT * FROM `users` WHERE `email` = '$email'");

if(mysqli_num_rows($a) == 0){

    $_SESSION['message'] = 'Не найден такой пользователь!';
    header('Location: ../htmls/index.php');
    die();

}


$rows = mysqli_fetch_array($a);
/*
if($rows['password'] != hash('sha256', crypt($password, $rows['salt']))){

        $_SESSION['message'] = 'Неверный пароль';
        header('Location: ../htmls/index.php');
        die();

    }

*/

if($rows['password'] != $password){

    $_SESSION['message'] = 'Неверный пароль';
    header('Location: ../htmls/index.php');
    die();

}
$_SESSION['user'] = mysqli_fetch_array($connection->query("SELECT * FROM `users` WHERE `email` = '$email'"));
if($_SESSION['user']['role'] == 'Учитель')
    header("Location: ../../homepages/teacher/index.php");
if($_SESSION['user']['role'] == 'Ученик')
    header("Location: ../../homepages/pupil/index.php");



?>


