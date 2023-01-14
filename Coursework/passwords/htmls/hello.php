<?php

    session_start();

?>

<!DOCTYPE HTML>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel = "stylesheet" href="../styles/style.css">
    <meta charset="UTF-8">
    <title>Форма авторизации</title>
    <meta name="description" content="Registration and Authorization form by R0_0nin. All rights reserved." />
</head>
<body>
<main>


    <form>

        <h1>Здравствуйте!</h1>
        <a href= "../phps/sessionkiller.php">Выйти</a>
        <a href="change.php">Сменить пароль</a>

    </form>

    <?php

    if($_SESSION['changed']){

        echo '<p class = "msg"> ' . $_SESSION['changed'] . '</p>';
        unset($_SESSION['changed']);

    }

    ?>

</main>

</body>
</html>