<h1> Редактировать контейнер </h1>
<form name="form" id="form" method="post" action="">
    <input type="hidden" name="edit_cont" value="1">
    <p>
        <label> Код </label>
        <input type="text" class="validate[required]" name="cont_code" value="{$data.cont_code}" />
    </p>
    <p>
        <label> Тип </label>
        <select name="type_cont" class="validate[required]" >
            <option value="">-Выберите тип-</option>
            {foreach from = $types_cont item = t}
                <option value="{$t.type_cont_id}" {if $t.type_cont_id == $data.type_cont_id} selected="selected"{/if}>{$t.type_cont_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Груз </label>
        <input type="text" class="validate[required]" name="cont_weight" value="{$data.cont_weight}" />
    </p>
    <p>
        <label> Склад: </label>
        <select name="store" class="validate[required]" >
            <option value="">-Выберите склад-</option>
            {foreach from = $stores item = s}
                <option value="{$s.store_id}" {if $s.store_id == $data.store_id} selected="selected"{/if}>{$s.store_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Прибыл из: </label>
        <select name="manufact_city" class="validate[required]" >
            <option value="">-Выберите город-</option>
            {foreach from = $manufact_cityes item = m}
                <option value="{$m.manufact_city_id}" {if $m.manufact_city_id == $data.manufact_city_id} selected="selected"{/if}>{$m.manufact_city_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Отправлен в: </label>
        <select name="client_city" class="validate[required]" >
            <option value="">-Выберите город-</option>
            {foreach from = $client_cityes item = c}
                <option value="{$c.client_city_id}" {if $c.client_city_id == $data.client_city_id} selected="selected"{/if}>{$c.client_city_name}</option>
            {/foreach}
        </select>
    </p>
    <p>
        <label> Дата прибытия: </label>
        <input id="sdatepicker" class="validate[required] datepicker" type="text" name="date_start" value="{$data.date_start}" />
    </p>
    <p>
        <label> Дата отправления: </label>
        <input id="edatepicker" class="validate[required] datepicker" type="text" name="date_end" value="{$data.date_end}" />
    </p>
    <p>
        <input type="submit" value="Редактировать контейнер">
    </p>
</form>