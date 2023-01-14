<?php

$pdo = new PDO('mysql:dbname=tasksimit; host=localhost', 'root', 'root');


$mail = $_POST['mail'];
$pass = $_POST['pass'];
$role = $_POST['role'];
$subject = $_POST['subject'];

/*
 *
if($subject != null && $role == 'pup') {

    $subject = 'null';
    $sql = ("INSERT INTO `users` (`email`, `password`, `salt`, `role`, `subject`) VALUES (?, ?, ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$mail, $pass, 'nosalt', $role, $subject]);

}

*/

if (isset($_POST['submit'])) {

    if(filter_var($mail, FILTER_VALIDATE_EMAIL) != false && $pass != null && $role != null){

        if($role == 'Ученик' && $subject != null){

            $subject = 'null';

        }

        $sql = ("INSERT INTO `users` (`email`, `password`, `salt`, `role`, `subject`) VALUES (?, ?, ?, ?, ?)");
        $query = $pdo->prepare($sql);
        $query->execute([$mail, $pass, 'nosalt', $role, $subject]);

        if($role == 'Ученик') {
            $sql = "CREATE TABLE `$mail` (`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `task` VARCHAR(30) NOT NULL, `subject` VARCHAR(255))";
            mkdir('D:\MAMP\htdocs\Coursework\files\\'.$mail, 0700);
        }
        if($role == 'Учитель'){
            $sql = "CREATE TABLE `$mail` (`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(30) NOT NULL, `message` VARCHAR(255))";
            mkdir('D:\MAMP\htdocs\Coursework\files\\'.$mail, 0700);
        }
        header('Location: adminpage.php');

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


//Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update

$edit_mail = $_POST['edit_mail'];
$edit_pass = $_POST['edit_pass'];
$edit_subject = $_POST['edit_subject'];
$edit_role = $_POST['edit_role'];
$get_id = $_GET['id'];

if (isset($_POST['edit-submit'])) {
    if($edit_mail != null && filter_var($edit_mail, FILTER_VALIDATE_EMAIL) != false && $edit_subject != null) {
        $sqll = "UPDATE users SET email=?, role=?, subject=? WHERE id=?";
        $querys = $pdo->prepare($sqll);
        $querys->execute([ $edit_mail, $edit_role, $edit_subject, $get_id]);
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

    $sql = "DELETE FROM users WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}


?>