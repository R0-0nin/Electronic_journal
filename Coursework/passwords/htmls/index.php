<?php

    session_set_cookie_params(3600,"/");
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
    <form action = "../phps/index.php" method="post">

        <h1>Войти</h1>
        <input type = "text" placeholder = "Введите почту" name = "email"><br>
        <input type = "password" placeholder= "Введите пароль" name = "password"><br>
        <button type="submit">Войти</button> <br>
    </form>


        <?php

            if($_SESSION['message']){

                echo '<p class = "msg"> ' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);

            }

        ?>

</main>

</body>
</html>