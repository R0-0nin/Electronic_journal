<?php
session_start();


$pdo = new PDO('mysql:dbname=tasksimit; host=localhost', 'root', 'root');

$subject = mb_strtolower($_SESSION['user']['subject'], 'UTF-8');
$tasktb = $subject.'/'.$_SESSION["var"];

if($_POST['mark'] != 'value'){

    $id = $_GET["id"];
    $mark = $_POST['mark'];
    $comment = $_POST['comment'];

    echo $id;
    $sql = ("UPDATE `$tasktb` SET comment=?, mark=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$comment, $mark, $id]);

}

header('Location: works.php?index='.$_SESSION["var"]);