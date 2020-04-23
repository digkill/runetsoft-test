# runetsoft-test
Тестовое задание

1. Для уникальных показов, можно считать только с разных апи. Которых нет в БД.
Для подсчета количество всего, просто обновляем счетчик и записываем в БД.

2. employee[id, name, post] project[id, title, description, employee_id]

3. Сам проект
cp .env .env.local
docker-compose up -d --build
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

Запуск для парсинга команда db -DB file -File
php bin/console app:executor db