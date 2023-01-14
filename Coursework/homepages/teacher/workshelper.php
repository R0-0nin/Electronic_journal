<?php
session_start();


$pdo = new PDO('mysql:dbname=tasksimit; host=localhost', 'root', 'root');

$subject = mb_strtolower($_SESSION['user']['subject'], 'UTF-8');
$tasktb = $subject.'/'.$_GET['index'];

$sql = $pdo->prepare("SELECT * FROM `$tasktb` WHERE `id` > 1");
$sql->execute();
$result = $sql->fetchAll();

// Create



if (isset($_POST['marksubmit'])) {

    if($_POST['mark'] != 'value'){

        $id = $_GET['id'];
        $mark = $_POST['mark'];
        $comment = $_POST['comment'];
        $id = $_GET['id'];
        echo $id;
        $sql = ("UPDATE `$tasktb` SET comment=?, mark=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$comment, $mark, $id]);
        header('Location: index.php');

    }
    else {

        $success = '<div class="alert alert-danger" role="alert">
  <strong>Введите корректные данные!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }

}
/*
// Read

$sql = $pdo->prepare("SELECT * FROM `crudusers`");
$sql->execute();
$result = $sql->fetchAll();

// Update

$edit_name = $_POST['edit_name'];
$edit_mail = $_POST['edit_mail'];
$edit_note = $_POST['edit_note'];
$get_id = $_GET['id'];

if (isset($_POST['edit-submit'])) {
    if($edit_name != null && filter_var($edit_mail, FILTER_VALIDATE_EMAIL) != false && $edit_note != null) {
        $sqll = "UPDATE crudusers SET name=?, email=?, note=? WHERE id=?";
        $querys = $pdo->prepare($sqll);
        $querys->execute([$edit_name, $edit_mail, $edit_note, $get_id]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    else{

        $success = '<div class="alert alert-danger" role="alert">
  <strong>Введите корректные данные!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }
}

// DELETE
if (isset($_POST['delete_submit'])) {
    $sql = "DELETE FROM crudusers WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}
*/
?>