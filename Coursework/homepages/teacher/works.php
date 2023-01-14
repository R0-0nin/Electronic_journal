<?php
include 'workshelper.php';
$_SESSION['var'] = $_GET["index"]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задание <?=$_GET['index'] + 1?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href = "../../styles/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col mt-1">
            <?=$success ?>
            <table class="table shadow">
                <thead class="thead-dark">
                <tr>
                    <th style="text-align: center; vertical-align: middle;">№</th>
                    <th style="text-align: center; vertical-align: middle;">Ученик</th>
                    <th style="text-align: center; vertical-align: middle;">Файл</th>
                    <th style="text-align: center; vertical-align: middle;">Комментарий</th>
                    <th style="text-align: center; vertical-align: middle;">Оценка</th>
                    <th style="text-align: center; vertical-align: middle;">Оценить</th>
                </tr>
                <?php foreach ($result as $value) { ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;"><?=$value['id'] - 1 ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$value['user'] ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$value['file'] ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$value['comment'] ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$value['mark'] ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="?mark=<?=$value['id']?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#markModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a>
                            <?php require 'modal.php'; ?>
                            <!-- <button class="btn btn-success mb-1" data-toggle="modal" data-target="#Modal<?=$value['íd']?>"><i class="fa fa-plus"></i></button>-->
                        </td>
                    </tr> <?php } ?>
                </thead>
            </table>
        </div>
    </div>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    </body>
    </html>