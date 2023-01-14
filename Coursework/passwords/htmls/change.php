<?php

    session_start();

?>


<!DOCTYPE HTML>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href="../styles/style.css">
    <meta charset="UTF-8">
    <title>Смена пароля</title>
    <meta name="description" content="Registration and Authorization form by R0_0nin. All rights reserved." />
</head>
<body>
<main>
    <form action = "../phps/change.php" method="post">

        <h1>Смена пароля</h1><br>
        <input type = "password" placeholder = "Введите новый пароль" name = "pass"><br>
        <input type = "password" placeholder= "Введите пароль снова" name = "newpass"><br>
        <button type="submit">Сменить пароль</button> <br>
    </form>
    <?php

    if($_SESSION['change']){

        echo '<p class = "msg"> ' . $_SESSION['change'] . '</p>';
        unset($_SESSION['change']);

    }

    ?>
</main>

</body>
</html>