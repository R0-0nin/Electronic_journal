<?php
session_start();
include 'func.php';
$counter = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет учащегося</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href = "index.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col mt-1">
				<?=$success ?>
                <form action = "../../passwords/htmls/index.php">
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal" type="submit"><i class="fa fa-caret-left"></i></button>
                </form>

				<table class="table shadow">
					<thead class="thead-dark">
						<tr>
							<th style="text-align: center; vertical-align: middle;">№</th>
                            <th style="text-align: center; vertical-align: middle;">Предмет</th>
							<th style="text-align: center; vertical-align: middle;">Задание</th>
                            <th style="text-align: center; vertical-align: middle;">Описание</th>
                            <th style="text-align: center; vertical-align: middle;">Файл с заданием</th>
							<th style="text-align: center; vertical-align: middle;">Статус</th>
							<th style="text-align: center; vertical-align: middle;">Оценка</th>
                            <th style="text-align: center; vertical-align: middle;">Комментарий преподавателя</th>
                            <th style="text-align: center; vertical-align: middle;">Ответ</th>
						</tr>
						<?php foreach ($tablesres as $value) { ?>
                                <?php if($value["TABLE_NAME"] != "users" && $value["TABLE_NAME"] != "admintable") { ?>
						<tr>
							<td style="text-align: center; vertical-align: middle;"><?php echo $counter = $counter + 1 ?></td>
							<td style="text-align: center; vertical-align: middle;"><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db` WHERE `id` = 1");
                                while($row = $items -> fetch_assoc()){
                                    $word = mb_convert_case($row['subject'], MB_CASE_TITLE, 'UTF-8');
                                    echo $word;

                                }?></td>
							<td style="text-align: center; vertical-align: middle;"><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db` WHERE `id` = 1");
                                while($row = $items -> fetch_assoc()){

                                    echo $row['task'];

                                }?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                    $items = $conn -> query("SELECT * FROM `$db` WHERE `id` = 1");
                                    while($row = $items -> fetch_assoc()){

                                        echo $row['description'];

                                    }?></td>
                            <td style="text-align: center; vertical-align: middle;"><a href='../../files/pdfopener.php?file=<?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db` WHERE id = 1");
                                while($row = $items -> fetch_assoc()){

                                    if($row['file'] == null)
                                        echo 'Без вложений';

                                    else
                                        echo $row['file'];
                                }?>'>Открыть файл</a></td>
							<td style="text-align: center; vertical-align: middle;">

                                <?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $user = $_SESSION['user']['email'];
                                $items = $conn -> query("SELECT * FROM `$db` WHERE `user` = '$user'");
                                while($row = $items -> fetch_assoc()){

                                    if($row['mark'] != null){

                                        echo 'Проверено с оценкой';
                                    }

                                    else if($row['file'] == null && $row['mark'] == null){

                                        echo 'Не загружено';

                                    }

                                    else if($row['file'] != null && $row['mark'] == null){

                                        echo 'Загружено';

                                    }
                                }?>


                                <!--<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a>
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id'] ?>"><i class="fa fa-trash"></i></a>-->
								<?php require 'modal.php'; ?>
							</td>
                            <td style="text-align: center; vertical-align: middle;">
                                    <div><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];

                                        $user = $_SESSION['user']['email'];
                                        $items = $conn -> query("SELECT * FROM `$db` WHERE `user` = '$user'");
                                        while($row = $items -> fetch_assoc()){

                                            if($row['mark'] != null)
                                                echo $row['mark'];
                                            else
                                                echo 'Не оценено';
                                        }?></div>
                            </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];

                                        $user = $_SESSION['user']['email'];
                                        $items = $conn -> query("SELECT * FROM `$db` WHERE `user` = '$user'");
                                        while($row = $items -> fetch_assoc()){

                                            if($row['comment'] != null)
                                                echo $row['comment'];
                                            else
                                                echo 'Без комментариев';

                                        }?></div>
                                </td>

                            <td style="text-align: center; vertical-align: middle;"><?php if($value['file'] != null) echo $value['file']; else?><a href = "#" data-toggle="modal" data-target="#Modal">Загрузить</a></td>
						</tr> <?php } }?>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="Modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить файл</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="file"  name="file" value="" placeholder="Заметка">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" name="filesubmit" class="btn btn-primary">Добавить</button>
                </div>
                </form>
            </div>
        </div>
    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>