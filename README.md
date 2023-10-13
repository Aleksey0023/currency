## Тестовое задание для Refloor

<h3>Условия тестового задания</h3>

<p>Реализовать сервис который обрабатывает запрос /getCurrency/</p>

<p>1.  Проверяет jwt токен переданный в заголовке, в котором передаётся id пользователя. Отвечает только если id задан и больше 0</p>
<p>2.  Пример параметров в теле запроса {“date_start”:”20.08.2023”,”date_end”,”22.08.2023”}</p>
<p>3.  Ответ – JSON , содержит список курсов валют за заданный период (USD,EUR,CNY)</p>
<p>4.  Для получения как вариант использовать https://cbr.ru/development/SXML/</p>

<h3>Инструкция по запуску проекта</h3>

<p>При первом запуске проекта необходимо переименовать файл <b>.env.example</b> в <b>.env</b> и прописать в консоли следующие команды:</p>

- composer install<br>
- npm install<br>
- php artisan jwt:secret<br>
- php artisan migrate --seed<br>
- php artisan serve

<p>При последующих запусках проекта необходимо будет прописать в консоли следующую команду:</p>

- php artisan serve

<h3>Комментарий по выполнению тестового задания</h3>

<p>Немного отошёл от первого пункта задания и вместо передачи ID подключил авторизацию по токену, поэтому нет смысла проверять ID пользователя. Запросы проверял через сервис Postman.</p>
<p>При переходе по роуту login необходимо указать в качестве параметров email и password, которые можно взять в базе (при первом запуске проекта при вводе команды php artisan migrate --seed в базе создаётся пользователь с email <b>admin@example.com</b> и паролем <b>admin</b>).</p>
<p>В ответе на запрос мы получаем access_token, который нужно занести в Postman на вкладку Authorization, для того чтобы сохранить токен для авторизованного пользователя.</p>
<p>Теперь нам доступны роуты me (в ответ приходит информация о пользователе), refresh (обновляет access_token) и logout (производит выход пользователя из системы).</p>
<p>Так же после авторизации нам доступен роут getCurrency, который принимает два значения date_start и date_end и в ответе выдаёт курсы для валют USD, EUR, CNY за этот период.</p>
<p>Можно было бы ещё поработать над ответами для пользователя при ошибках или если в запросе getCurrency указаны некорректные данные, но я не стал это реализовывать, т.к. в условиях тестового задания про это ничего не сказано.</p>
