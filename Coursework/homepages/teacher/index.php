<?php
include 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет преподавателя</title>
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
				<button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-plus"></i></button>
				<table class="table shadow">
					<thead class="thead-dark">
						<tr>
                            <th style="text-align: center; vertical-align: middle;">Предмет</th>
							<th style="text-align: center; vertical-align: middle;">№</th>
							<th style="text-align: center; vertical-align: middle;">Задание</th>
							<th style="text-align: center; vertical-align: middle;">Описание</th>
							<th style="text-align: center; vertical-align: middle;">Файл</th>
                            <th style="text-align: center; vertical-align: middle;">Проверка</th>
							<th style="text-align: center; vertical-align: middle;">Действие</th>
						</tr>
						<?php foreach ($tablesres as $value) { ?>
                                <?php if(explode('/', $value['TABLE_NAME'])[0] == mb_strtolower($_SESSION['user']['subject'], 'UTF-8')) {?>
						<tr>
                            <td style="text-align: center; vertical-align: middle;"><?=$_SESSION['user']['subject'] ?></td>
							<td style="text-align: center; vertical-align: middle;"><?php if(explode('/', $value['TABLE_NAME'])[0] == mb_strtolower($_SESSION['user']['subject'], 'UTF-8')) echo (int)explode('/', $value['TABLE_NAME'])[1] + 1?></td>
							<td style="text-align: center; vertical-align: middle;"><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db`");
                                while($row = $items -> fetch_assoc()){

                                     echo $row['task'];

                                }?></td>
							<td style="text-align: center; vertical-align: middle;"><?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db`");
                                while($row = $items -> fetch_assoc()){

                                    echo $row['description'];

                                } ?></td>
                            <td style="text-align: center; vertical-align: middle;"><a href='../../files/pdfopener.php?file=<?php $conn = new mysqli("localhost", "root", "root", "tasksimit"); $db = $value["TABLE_NAME"];
                                $items = $conn -> query("SELECT * FROM `$db`");
                                while($row = $items -> fetch_assoc()){

                                    echo $row['file'];

                                } ?>'>Загруженный файл</a></td>
                            <td style="text-align: center; vertical-align: middle;"><a href="works.php?index=<?php if(explode('/', $value['TABLE_NAME'])[0] == mb_strtolower($_SESSION['user']['subject'], 'UTF-8')) echo (int)explode('/', $value['TABLE_NAME'])[1] ?>">Работы</a></td>
							<td style="text-align: center; vertical-align: middle;">
								<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=(int)explode('/', $value['TABLE_NAME'])[1] ?>"><i class="fa fa-edit"></i></a>
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=(int)explode('/', $value['TABLE_NAME'])[1] ?>"><i class="fa fa-trash"></i></a>
								<?php require 'modal.php'; ?>
							</td>
						</tr> <?php }} ?>
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
	        <h5 class="modal-title">Добавить задание</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post" enctype="multipart/form-data">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="theme" value="" placeholder="Тема">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="desc" value="" placeholder="Описание">
	        	</div>
	        	<div class="form-group">
	        		<input type="file"  name="file" value="" placeholder="Файл">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
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