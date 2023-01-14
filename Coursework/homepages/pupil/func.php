<?php
session_start();

$pdo = new PDO('mysql:dbname=tasksimit; host=localhost', 'root', 'root');

$tables = $pdo ->prepare("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = 'tasksimit'");
$tables->execute();
$tablesres = $tables->fetchAll();

foreach($tablesres as $value){
    $conn = new mysqli("localhost", "root", "root", "tasksimit");
    $db = $value["TABLE_NAME"];
    $items = $conn -> query("SELECT * FROM `$db`");
    while($row = $items -> fetch_assoc()){

        //echo $row['email'];

    }

}

$theme = $_POST['theme'];
$desc = $_POST['desc'];
$file = $_POST['file'];
$subject = $_SESSION['user']['subject'];
$user = $_SESSION['user']['email'];

if (isset($_POST['submit'])) {
    $myflag = false;
    $max = -1;
    if ($theme != null && $subject != null) {
        foreach ($tablesres as $value) {
            if (explode("/", $value["TABLE_NAME"])[0] == $subject) {
                if ($max < (int)explode("/", $value["TABLE_NAME"])[1]);
                $max =(int)explode("/", $value["TABLE_NAME"])[1];

            }
        }

        if ($max != -1) {

            $num = $max + 1;
            $num = (string)$num;
            $db = $subject . '/' . $num;
            $sql = "CREATE TABLE `$db` (`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `user` VARCHAR(255) NOT NULL, `subject` VARCHAR(255),`task` varchar(255), `description` varchar(255), `file` MEDIUMBLOB, `comment` varchar(255), `mark` int(1))";
            $pdo->query($sql);
            $myflag = true;


        }
        if ($myflag == false) {

            $db = $subject . '/0';
            $sql = "CREATE TABLE `$db` (`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `user` VARCHAR(255) NOT NULL, `subject` VARCHAR(255) NOT NULL,`task` varchar(255) NOT NULL, `description` varchar(255), `file` MEDIUMBLOB, `comment` varchar(255), `mark` int(1))";
            $pdo->query($sql);


        }

        $sql = ("INSERT INTO `$db` (`user`, `subject`, `task`, `description`) VALUES (?, ?, ?, ?)");
        $query = $pdo->prepare($sql);
        $query->execute([$user, $subject, $theme, $desc]);
        $pdo = null;
        $arr = array();

        $conn = new mysqli("localhost", "root", "root", "tasksimit");
        $items = $conn -> query("SELECT * FROM `users` WHERE `role` = 'Ученик'");
        while($row = $items -> fetch_assoc()){

            $name = $row['email'];
            $conn -> query("INSERT INTO `$db` (`user`, `subject`, `task`, `description`, `file`, `comment`, `mark`) VALUES ('$name', '$subject', null, null, null, null, null)");


        }

        header("Location: index.php");



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

if(isset($_POST["file"])){

    $name = $_FILES["file"]["name"];
    $file = $name;

    foreach ($tablesres as $value){



    }
    $db =

    $sql = ("INSERT INTO `$db` (`user`, `subject`, `task`, `description`, `file`) VALUES (?, ?, ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$user, $subject, $theme, $desc, $file]);
    $pdo = null;
    $arr = array();

}




// Read
/*
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
*/
// DELETE



if (isset($_POST['delete_submit'])) {

    $id = $_GET['id'];
    $dbname = $subject.'/'.$id;
    $pdo = new PDO('mysql:dbname=tasksimit; host=localhost', 'root', 'root');
    $sql = "DROP TABLE `$dbname`";
    $query = $pdo->prepare($sql);
    $query->execute();
    $pdo = null;
    header('Location: index.php');
}


?>