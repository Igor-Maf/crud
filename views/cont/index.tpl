<h1> Контейнера </h1>
<hr>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="add_cont" value="1">
    <p>
        <label> Код </label>
        <input type="text" class="validate[required]" name="cont_code" value="{$data.cont_code|default:""}" />
    </p>
    <p>
        <label> Тип </label>
        <select name="type_cont" class="validate[required]" >
            <option value="">-Выберите тип-</option>
            {foreach from = $types_cont item = t}
                <option value="{$t.type_cont_id}">{$t.type_cont_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Груз </label>
        <input type="text" class="validate[required]" name="cont_weight" value="{$data.cont_weight|default:""}" />
    </p>
    <p>
        <label> Склад: </label>
        <select name="store" class="validate[required]" >
            <option value="">-Выберите склад-</option>
            {foreach from = $stores item = s}
                <option value="{$s.store_id}">{$s.store_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Прибыл из: </label>
        <select name="manufact_city" class="validate[required]" >
            <option value="">-Выберите город-</option>
            {foreach from = $manufact_cityes item = m}
                <option value="{$m.manufact_city_id}">{$m.manufact_city_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Отправлен в: </label>
        <select name="client_city" class="validate[required]" >
            <option value="">-Выберите город-</option>
            {foreach from = $client_cityes item = c}
                <option value="{$c.client_city_id}">{$c.client_city_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Дата прибытия: </label>
        <input id="sdatepicker" class="validate[required] datepicker" type="text" name="date_start" value="{$data.date_start|default:""}" />
    </p>
    <p>
        <label> Дата отправления: </label>
        <input id="edatepicker" class="validate[required] datepicker" type="text" name="date_end" value="{$data.date_end|default:""}" />
    </p>
    <p>
        <input type="submit" value="Добавить новый контейнер">
    </p>
</form>
<hr>
{if isset($conts) && count($conts)}
    <table>
        <tr>
            <th>Ид. конт.</th>
            <th>Код</th>
            <th>Тип</th>
            <th>Груз</th>
            <th>Склад</th>
            <th>Прибыл из</th>
            <th>Отправить в</th>
            <th>Дата прибытия</th>
            <th>Дата отправления</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        {foreach from = $conts item = cont}
            <tr>
                <td>{$cont.cont_id}</td>
                <td>{$cont.cont_code}</td>
                <td>{$cont.type_cont_name}</td>
                <td>{$cont.cont_weight}</td>
                <td>{$cont.store_name}</td>
                <td>{$cont.manufact_city_name}</td>
                <td>{$cont.client_city_name}</td>
                <td>{$cont.date_start}</td>
                <td>{$cont.date_end}</td>
                <td><a href="{$_layoutParams.root}cont/edit/{$cont.cont_id}">Редактировать</a></td>
                <td><a href="{$_layoutParams.root}cont/delete/{$cont.cont_id}">Удалить</a></td>
            </tr>
        {/foreach}
    </table>
    <p>{$pagination}</p>
{else}
    <p> Не найдено ни одного контейнера. </p>
{/if}