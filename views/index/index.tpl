<h1> CRSystem. Модель базы данных </h1>
<p> База данных состоит из <b>5</b> таблиц: </p>
<ul class="main-list num">
    <li> Контейнера </li>
    <li> Склады </li>
    <li> Город-производитель (из которого прибыл контейнер) </li>
    <li> Город-клиент (в который нужно доставить контейнер) </li>
    <li> Типы контейнеров </li>
</ul>
<p> Главной из них является таблица <b>"Контейнера"</b>, остальные являются для неё справочными. </p>

<img src="{$_layoutParams.root_img}model-db.png" alt="Model db" />
<hr>

<h2> Справочные таблицы </h2>
<ul class="main-list">
    <li>
        <i> Склад (Store). </i> Имеет 2 поля:
        <ul class="inside-list">
            <li> store_id (primary key (первичный ключ, являющийся идентификатором склада)) </li>
            <li> store_name (имя склада) </li>
        </ul>
    </li>
    <li>
        <i> Город-производитель (Manufact_city). </i> Имеет 2 поля:
        <ul class="inside-list">
            <li> manufact_city_id (pr. key) </li>
            <li> manufact_city_name (название города) </li>
        </ul>
    </li>
    <li>
        <i> Город-клиент (Client-city). </i> Имеет 2 поля:
        <ul class="inside-list">
            <li> client_city_id (pr. key) </li>
            <li> client_city_name (название города) </li>
        </ul>          
    </li>
    <li>
        <i> Типы контейнеров (Type_cont). </i> Имеет 2 поля:
        <ul class="inside-list">
            <li> type_cont_id (pr. key) </li>
            <li> type_cont_name (название города) </li>
        </ul> 
    </li>
</ul>

<hr>

<h2> Основная таблица - таблица Контейнеров (Cont). </h2>
<p> Имеет <b>9</b> полей: </p>
<ul class="main-list num">
    <li> cont_id (pr. key (уникальный идентификатор контейнера)) </li>
    <li> type_cont_id (foreign key (идентификатор типа контейнера)) </li>
    <li> cont_code (номер контейнера) </li>
    <li> cont_weight (описание груза в контейнере) </li>         
    <li> manufact_city_id (foreign key (идентификатор города-производителя)) </li>
    <li> client_city_id (foreign key (идентификатор города-клиента)) </li>
    <li> date_start (дата прибытия контейнера на склад от города-производителя) </li>   
    <li> date_end (дата отправления контейнера со склада в город-клиент) </li>
    <li> store_id ((foreign key (идентификатор склада, на котором находится контейнер))) </li>
</ul>
