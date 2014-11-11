<h1> Редактировать склад </h1>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="edit_store" value="1">
    <p>
        <label> Имя нового склада: </label>
        <input type="text" class="validate[required]" name="store_name" value="{$data.store_name}" />
    </p>
    <p>
        <input type="submit" value="Редактировать склад">
    </p>
</form>