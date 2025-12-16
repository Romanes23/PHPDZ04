<H3>Registration</H3>
<?

require_once "pages/regform.php";
require_once "pages/functions.php";

    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ids=[];
   if (isset($_POST['spesgroup'])){
    $ids = array_keys($_POST['spesgroup']); 
    }else $ids; 

$gender = isset($_POST['gender']) ? $_POST['gender']:"";
$error =[];
    $er =  validate($_POST['username'], $_POST['age'], $gender, $_POST['tipezan'], 
                       $ids,$_POST['term_of_credit'], $_POST['sum_of_credit'],
                       $_POST['sum_of_incom']);
 //   dump($er);
        if ($er==="10") {echo "<H3><p  style ='color:red;'> Дефект заполнения формы </p></H3>";}
    elseif ($er==="1 отказ по возрасту")  {echo "<H3><p  style ='color:red;'> Вам отказано по возрастному критерию. </p></H3>";}
    elseif ($er==="2 отказ по матери" ) {echo "<H3><p  style ='color:red;'> Вам отказано. </p></H3>";}
    
    
    
    
     else $get_buisness= get_buisness($er,$_POST['term_of_credit'], $_POST['sum_of_credit'],
         $_POST['sum_of_incom']);
    
  //       dump($get_buisness);

         if (empty($get_buisness)){ echo "<H3><p  style ='color:red;'> Вам отказано по критерию недостаточности дохода. </p></H3>";}
else {
     echo "<H3><p  style ='color:green;'> Расчет сумм ежемесячных платежей </p></H3>";
foreach ($get_buisness as $key => $value) {
     echo "<H5><p  style ='color:green;'> $value </p></H5>";
}


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
