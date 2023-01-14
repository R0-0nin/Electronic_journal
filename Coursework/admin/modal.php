<!-- Modal Edit-->
<div class="modal fade" id="editModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать запись № <?=$value['id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!--
      <div class="modal-body">
        <form action="?id=<?=$value['id'] ?>" method="post">
        	<div class="form-group">
        		<input type="text" class="form-control" name="edit_name" value="<?=$value['edit_name'] ?>" placeholder="Логин">
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" name="edit_mail" value="<?=$value['edit_mail'] ?>" placeholder="Почта">
        	</div>
        	<div class="form-group">
        		<input type="text" class="form-control" name="edit_note" value="<?=$value['edit_note'] ?>" placeholder="Заметка">
        	</div>
        	<div class="modal-footer">
        		<button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
        	</div>
        </form>
-->
          <div class="modal-body">
              <form action="?id=<?=$value['id'] ?>" method="post">
                  <div class="form-group">
                      <input type="text" class="form-control" name="edit_mail" value="" placeholder="Почта">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="edit_pass" value="" placeholder="Личный пароль">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="edit_subject" value="" placeholder="Предмет">
                  </div>
                  <div class="form-group">
                      <select name = "edit_role">
                          <option value = "value" id="firstone">---Выберите роль---</option>
                          <option value="Учитель">Учитель</option>
                          <option value="Ученик">Ученик</option>
                      </select>
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
              <button type="submit" name="edit-submit" class="btn btn-primary">Обновить</button>
          </div>
          </form>

      </div>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?=$value['id'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <form action="?id=<?=$value['id'] ?>" method="post">
        	<button type="submit" name="delete_submit" class="btn btn-danger">Удалить</button>
    	</form>
      </div>
    </div>
  </div>
</div>
