<h1> Редактирование типа контейнеров </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="edit_type" value="1">
    <p>
        <label> Название типа: </label>
        <input type="text" class="validate[required]" name="type_cont_name" value="{$data.type_cont_name}" />
    </p>
    <p>
        <input type="submit" value="Редактировать тип контейнера">
    </p>
</form>