<!-- Создать форму заявки на регистрацию.
Поля:
- ФИО
- возраст
- пол: м/ж
- занятость: ип/самозанятый/ооо
- особые группы (выбор от 0 до всех) многодетный родитель/пенсионер/участник сво
- сумма кредита
- срок кредита (от 6 мес до 5лет)
- доход

Написать алгоритм принятия решения по выдаче кредита.

Условия:
0. Базовая ставка 30%
1. Отказать всем младше 21 и старше 55
2. Для ИП и Самозанятых повысить ставку на 5%
3. Для многодетных повысить ставку на 5%, для остальных групп повысить на 7%
4. Многодетным матерям до 30 отказать
5. Рассчитать ежемесячный платеж.
6. Если платеж превышает 50% от дохода - отказать -->

<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Romanes BANK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
  <main>
    <div>
      <?
      require_once 'pages/functions.php';
      require_once 'pages/menu.php';
      require_once "helpers.php";
      require_once "pages/registration.php";
      ?>
    </div>

  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>


</html>