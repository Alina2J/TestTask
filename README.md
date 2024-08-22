<h1 align="center">Тестовое задание</h1>
<p align="center">Инструкция по извлечению проекта Test Task</p>

<h2 align="center">1 - Установка или наличие локального сервера</h2>

<p>Для запуска проекта требуется локальный сервер. Я использовала <a href="https://ospanel.io">Open Server Panel (OSP)</a> — это инструмент для локальной разработки и тестирования веб-сайтов на платформе Windows. Инструкция будет описана на его основе; на других платформах возможен иной подход.</p>

<h2 align="center">2 - Настройка локального сервера</h2>

<ul>
    <li>Запустите скачанный локальный сервер.</li>
    <li>После запуска на панели задач Windows отобразится красный флажок:
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/d8e2b819-43a9-4900-a17e-b5348bed2f4e" alt="Картинка 1"></img>
    </li>
    <li>Нажмите на флажок правой кнопкой мыши и выберите пункт "Настройки":
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/135859be-9789-4d5d-9bb9-621226b89674" alt="Картинка 2"></img>
    </li>
    <li>Откроется окно настроек, где необходимо выбрать пункт "Модули":
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/de44d835-c227-4aad-8fcc-b19412201497" alt="Картинка 3"></img>
    </li>
    <li>Выберите следующие параметры:
        <ul>
            <li>HTTP: Apache_2.4-PHP_8.0-8.1+Nginx_1.23
                <br>
                <img style="width: 300px; height: auto;" src="https://github.com/user-attachments/assets/f6077728-afcd-4f95-aded-6b5041333039" alt="Картинка 4"></img>
            </li>   
            <li>PHP: PHP_8.1
                <br>
                <img style="width: 300px; height: auto;" src="https://github.com/user-attachments/assets/2eee7db2-d25e-49fa-8d9c-e5032d104984" alt="Картинка 5"></img>
            </li>
            <li>MySQL/MariaDB: MySQL-8.0-Win10
                <br>
                <img style="width: 300px; height: auto;" src="https://github.com/user-attachments/assets/521ea111-14a8-4da3-a139-7fde93fa0355" alt="Картинка 6"></img>
            </li>
        </ul>
    </li>
    <li>Нажмите кнопку "Сохранить".</li>
</ul>

<h2 align="center">3 - Настройка проекта "TestTask" перед запуском</h2>

<ul>
    <li>Скачанный архив с проектом распакуйте по пути "C:\OSPanel\domains".
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/b471c2ba-e41f-440d-b4f3-7bb8f77e3322" alt="Картинка 7"></img>
    </li>
    <li>Нажмите правой кнопкой мыши на значок флага на панели задач.
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/0fd72d69-d3b0-4691-b429-91a099549839" alt="Картинка 8"></img>
    </li>
    <li>Откроется окно настроек, где необходимо выбрать пункт "Домены".
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/b6e00e5c-87ce-45f5-82cd-14634c565b63" alt="Картинка 9"></img>
    </li>
    <li>Установите в пункте "Управление доменами" — "Ручное + Автопоиск".</li>
    <li>В поле "Имя домена" введите "TestTask".</li>
    <li>В поле "Папка домена" нажмите на три точки и выберите распакованную папку "TestTask", а в ней папку "public".
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/28869472-0bdc-4109-b962-55ef633f9b3b" alt="Картинка 10"></img>
    </li>
    <li>Справа от поля "Папка домена" нажмите кнопку "Добавить".</li>
    <li>Нажмите кнопку "Сохранить".</li>
</ul>

<h2 align="center">4 - Подключение локальной базы данных "TestTask" перед запуском</h2>

<ul>
    <li>Нажмите правой кнопкой мыши на значок флага на панели задач, выберите пункт "Дополнительно", затем "Консоль".
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/4824ca4a-2961-4dba-b386-145d955756a9" alt="Картинка 11"></img>
    </li>
    <li>Введите команду "cd domains/TestTask" и нажмите "Enter".
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/98317da4-d20e-4733-be42-3e8e81629dca" alt="Картинка 12"></img>
    </li>
    <li>Затем введите команду "php artisan migrate --seed" и нажмите "Enter" (Сиды необходимы для автоматического заполнения таблицы "Статусы").
        <br>
        <img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/4cb7711f-efb6-43c8-bbda-ba1c50304c69" alt="Картинка 13"></img>
    </li>
</ul>

<h2 align="center">5 - Запуск проекта "TestTask"</h2>

<p>Для запуска проекта нажмите правой кнопкой мыши на флажок Open Server Panel на панели задач, затем выберите "Мои проекты" и выберите проект с именем домена "TestTask".
<br>
<img style="width: 500px; height: auto;" src="https://github.com/user-attachments/assets/c7b66a65-ecc8-41cf-969b-18cd4924fa8d" alt="Картинка 14"></img>
</p>

<h2 align="center">Сайт должен запуститься в одном из ваших браузеров. Приятного использования!</h2>
<img src="https://github.com/user-attachments/assets/b6a876fc-3308-45b3-936c-792c2803cbf4" alt="Картинка 15"></img>
