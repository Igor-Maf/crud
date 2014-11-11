<h1> Редактировать город-производитель </h1>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="edit_manufact" value="1">
    <p>
        <label> Редактировать город: </label>
        <input type="text" class="validate[required]" name="manufact_city_name" value="{$data.manufact_city_name}" />
    </p>
    <p>
        <input type="submit" value="Редактировать город">
    </p>
</form>