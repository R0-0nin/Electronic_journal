<?php
include 'config.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$note = $_POST['note'];



// Create

if(isset($_POST['like'])) {

    $sql = ("UPDATE `crudusers` SET likes = likes + 1 WHERE `id` = ?");
    $query = $pdo -> prepare($sql);
    $query-> execute([$_GET['id']]);
    header('Location: index.php');

}

if(isset($_POST['dislike'])) {

    $sql = ("UPDATE `crudusers` SET `likes` = `likes` - 1 WHERE id = ?");
    $query = $pdo -> prepare($sql);
    $query-> execute([$_GET['id']]);
    header('Location: index.php');

}


if (isset($_POST['submit'])) {

    if(filter_var($mail, FILTER_VALIDATE_EMAIL) != false && $note != null && $name != null){

        $sql = ("INSERT INTO `crudusers` (`name`, `email`, `note`) VALUES (?,?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $mail, $note]);
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
