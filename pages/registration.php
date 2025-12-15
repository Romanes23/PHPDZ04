<H3>Registration</H3>
<?

require_once "pages/regform.php";
require_once "pages/functions.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // dd($_POST);
     $errors = regUser($_POST['username'], $_POST['age'],
     $_POST['gender'], $_POST['tipezan'],
         $_POST['spesgroup'],   $_POST['sum_of_credit'],
         $_POST['term_of_credit'],  $_POST['sum_of_incom'] );
    dd($errors);
    if (!empty($errors)) {
        $list = "<ul class = 'col-6' style  = 'color:red;'>";
        foreach ($errors as $err) {
            $list .= "<li>$err</li>";
        }
        $list .= "</ul>";
        echo $list;
    } else {
        echo "<p class='mt-3 col-6' style ='color:green;'> User registered sucsessfully </p>";
    }
}



