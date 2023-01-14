<?php
session_start();

$login = $_POST["login"];
$pass = $_POST["pass"];
$reppass = $_POST["reppass"];
if(strlen($pass) < 8) {

    $_SESSION['othermes'] = 'Длина пароля не менее 8 символов!';
    header("Location: ../htmls/register.php");
    die();

}

if($login == null || $pass == null){

    $_SESSION['othermes'] = 'Введите данные!';
    header("Location: ../htmls/register.php");
    die();

}

else if($pass != $reppass){

    $_SESSION['othermes'] = 'Пароли не совпадают!';
    header("Location: ../htmls/register.php");
    die();

}

$salt = bin2hex(random_bytes(32));
$pass = hash('sha256', crypt($pass, $salt));

$success = new mysqli('localhost', 'root', 'root', 'tasksimit');

if(mysqli_num_rows($success->query("SELECT * FROM `users` WHERE `login` = '$login'")) != 0){

    $_SESSION['othermes'] = 'Выберите другой логин!';
    header("Location: ../htmls/register.php");
    die();

}

$success->query("INSERT INTO `users` (`login`, `password`, `salt`) VALUES ('$login', '$pass', '$salt')");

    echo 'q';
    $_SESSION['user'] = mysqli_fetch_array($success->query("SELECT * FROM `users` WHERE `login` = '$login'"));
    header("Location: ../htmls/hello.php");
    $success->close();

?>