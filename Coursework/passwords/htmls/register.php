<?php

    session_start();

?>


<!DOCTYPE HTML>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href="../styles/style.css">
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <meta name="description" content="Registration and Authorization form by R0_0nin. All rights reserved." />
</head>
<body>
<main>

    <form action = "../phps/register.php" method="post">
        <h1>Регистрация</h1><br>
        <input type="text" placeholder= "Введите логин" name = "login"><br>
        <input type="password" placeholder="Введите пароль" name = "pass"><br>
        <input type="password" placeholder="Повторите пароль" name = "reppass"><br>
        <button type="submit">Зарегистрироваться</button><br>
    </form>

    <?php

    if($_SESSION['othermes']){

        echo '<p class = "msg"> ' . $_SESSION['othermes'] . '</p>';
        unset($_SESSION['othermes']);

    }

    ?>

</main>

</body>
</html>