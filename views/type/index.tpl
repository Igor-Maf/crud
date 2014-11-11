<h1> Типы контейнеров </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="add_type" value="1">
    <p>
        <label> Название типа: </label>
        <input type="text" class="validate[required]" name="type_cont_name" value="{$data.type_cont_name|default:""}" />
    </p>
    <p>
        <input type="submit" value="Добавить тип контейнера">
    </p>
</form>
<hr>
{if isset($types_cont) && count($types_cont)}
<table>
        <tr>
            <th>Ид. типа</th>
            <th>Название типа</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    {foreach from = $types_cont item = type}
        <tr>
            <td>{$type.type_cont_id}</td>
            <td>{$type.type_cont_name}</td>
            <td><a href="{$_layoutParams.root}type/edit/{$type.type_cont_id}">Редактировать тип</a></td>
            <td><a href="{$_layoutParams.root}type/delete/{$type.type_cont_id}">Удалить тип</a></td>
        </tr>
    {/foreach}
</table>
<p>{$pagination}</p>
{else}
    <p> Не найдено ни одного типа. </p>
{/if}