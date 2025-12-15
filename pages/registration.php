<H3>Registration</H3>
<?

require_once "pages/regform.php";
require_once "pages/functions.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // dump($_POST);
     $errors = validate($_POST['username'], $_POST['age'], $_POST['gender'], 
     $_POST['tipezan'], $_POST['spesgroup[]'] );
    

    if (!empty($errors)) {
        $list = "<ul class = 'col-6' style  = 'color:red;'>";
        foreach ($errors as $err) { $list .= "<li>$err</li>";}
        $list .= "</ul>";
        echo $list;
    } else {
        echo "<p class='mt-3 col-6' style ='color:green;'> User registered sucsessfully </p>";
    }
}

// Условия:
// 0. Базовая ставка 30%
// 1. Отказать всем младше 21 и старше 55
// 2. Для ИП и Самозанятых повысить ставку на 5%
// 3. Для многодетных повысить ставку на 5%, для остальных групп повысить на 7%
// 4. Многодетным матерям до 30 отказать
// 5. Рассчитать ежемесячный платеж.
// 6. Если платеж превышает 50% от дохода - отказать

// , $_POST['term_of_credit'], $_POST['sum_of_credit'],
//      $_POST['sum_of_incom']