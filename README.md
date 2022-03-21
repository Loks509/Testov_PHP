# Описание тестового задания PHP
1. Файл index.php - стратовая страница с календарем и формой (48-78) для добавления экзамена. Форма выбора экзамена заполняется путем считывания из БД существующих экзаменов и их id (30-34). Календарь подключается из отдельного файла: calender.php на строке 23. При ошибке подключения к БД выходит сообщение об ошибке и её описание (38-40)
2. Файл calender.php - генерирует календарь текущего месяца. Каждый день - GET запрос с номером дня (29), который отправляется в файл GetList.php.
3. Файл GetList.php - подключается к базе данных и с помощью INNER JOIN получает отсортированную таблицу с временем, названием экзамена и групп, которым надо сдать этот экзамен (11-27). Объединение групп происходит с помощью GROUP_CONCAT.
4. На файл addForm.php приходит POST запрос из формы файла index.php. В случае ошибок появляется окно об ошибке (41-47), а в случае успешного добавления окно об успехе и автоматическая переадресация на начальную страницу (50-62).
5. Класс работы с БД находится в папке Setting/dbClass.php. Также он хранит информацию для подключения. Доступ к этой папке закрыт с помощью .htaccess
6. DATA_BASE - бекап базы данных для проверки.
7. Ссылка на сайт - http://www.phpform.freecluster.eu/
