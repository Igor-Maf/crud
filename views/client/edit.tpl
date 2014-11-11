<h1> Редактировать города-клиенты </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="edit_client" value="1">
    <p>
        <label> Редактировать город: </label>
        <input type="text" class="validate[required]" name="client_city_name" value="{$data.client_city_name}" />
    </p>
    <p>
        <input type="submit" value="Редактировать город">
    </p>
</form>