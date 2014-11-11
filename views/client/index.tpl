<h1> Города-клиенты </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="add_client" value="1">
    <p>
        <label> Новый город: </label>
        <input type="text" class="validate[required]" name="client_city_name" value="{$data.client_city_name|default:""}" />
    </p>
    <p>
        <input type="submit" value="Добавить новый город">
    </p>
</form>
<hr>
{if isset($clients) && count($clients)}
<table>
        <tr>
            <th>Ид. города</th>
            <th>Город</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    {foreach from = $clients item = client}
        <tr>
            <td>{$client.client_city_id}</td>
            <td>{$client.client_city_name}</td>
            <td><a href="{$_layoutParams.root}client/edit/{$client.client_city_id}">Редактировать</a></td>
            <td><a href="{$_layoutParams.root}client/delete/{$client.client_city_id}">Удалить</a></td>
        </tr>
    {/foreach}
</table>
<p>{$pagination}</p>
{else}
    <p> Не найдено ни одного города-клиент. </p>
{/if}