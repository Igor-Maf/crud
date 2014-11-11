<h1> Города-отправители </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="add_manufact" value="1">
    <p>
        <label> Новый город: </label>
        <input type="text" class="validate[required]" name="manufact_city_name" value="{$data.manufact_city_name|default:""}" />
    </p>
    <p>
        <input type="submit" value="Добавить новый город">
    </p>
</form>
<hr>
{if isset($manufacts) && count($manufacts)}
<table>
        <tr>
            <th>Ид. города</th>
            <th>Город</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    {foreach from = $manufacts item = man}
        <tr>
            <td>{$man.manufact_city_id}</td>
            <td>{$man.manufact_city_name}</td>
            <td><a href="{$_layoutParams.root}manufact/edit/{$man.manufact_city_id}">Редактировать</a></td>
            <td><a href="{$_layoutParams.root}manufact/delete/{$man.manufact_city_id}">Удалить</a></td>
        </tr>
    {/foreach}
</table>
<p>{$pagination}</p>
{else}
    <p> Не найдено ни одного города-производителя. </p>
{/if}