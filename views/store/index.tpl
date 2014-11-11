<h1> Склады </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="add_store" value="1">
    <p>
        <label> Имя нового склада: </label>
        <input type="text" class="validate[required]" name="store_name" value="{$data.store_name|default:""}" />
    </p>
    <p>
        <input type="submit" value="Добавить новый склад">
    </p>
</form>
<hr>
{if isset($stores) && count($stores)}
<table>
        <tr>
            <th>Ид. склада</th>
            <th>Имя склада</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    {foreach from = $stores item = store}
        <tr>
            <td>{$store.store_id}</td>
            <td>{$store.store_name}</td>
            <td><a href="{$_layoutParams.root}store/edit/{$store.store_id}">Редактировать склад</a></td>
            <td><a href="{$_layoutParams.root}store/delete/{$store.store_id}">Delete</a></td>
        </tr>
    {/foreach}
</table>
<p>{$pagination}</p>
{else}
    <p> Не найдено ни одного склада. </p>
{/if}