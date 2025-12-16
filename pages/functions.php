<!-- <H5> HELLO functions.php </H5> -->
<?
// function regUser($username, $age,  $gender, $tipezan, $spesgroup )
// {
//     $errors = [];
   
//     $username = trim(htmlspecialchars($username));
//     $age = trim(htmlspecialchars($age));

//    // var_dump($username, $age,  $gender, $tipezan,  $spesgroup, $term_of_credit, $sum_of_credit, $sum_of_incom );
//     $errors = validate($username, $age,  $gender, $tipezan, $spesgroup);
      
//     // dd($errors);
//     return $errors;
  
// }

function get_business($username, $age,  $gender, $tipezan, $spesgroup, $term_of_credit, $sum_of_credit, $sum_of_incom ){

 $err= validate($username, $age,  $gender, $tipezan, $spesgroup);


}
function validate($username, $age,  $gender, $tipezan, $spesgroup)
{   

   $username = trim(htmlspecialchars($username));
    $age = trim(htmlspecialchars($age));


    $errors = [];
     if (empty($username) || empty($age)|| is_null($gender) || empty($tipezan)|| empty($term_of_credit)
                || empty($sum_of_credit) || empty($sum_of_incom)  )
            {$errors = "10";}
    if (mb_strlen($username) < 3 && mb_strlen($username) > 40) {
            {$errors = "10";}
    }         
    if ($age > 55 && $age <21) {$errors = "1";}
    if (in_array("many_child", $spesgroup) && $age <31 ) { $errors = "2";}
    if ($tipezan==="IP"|| $tipezan==="SZ"|| (in_array("many_child", haystack: $spesgroup) && $age >30 )) { $errors = "3";}
    if (!in_array("1", $errors) && !in_array("2", $errors) ) { $errors = "4";}
    return $errors;
    
}

    // $term_of_credit = trim(htmlspecialchars($term_of_credit));
    // $sum_of_credit = trim(htmlspecialchars($sum_of_credit));
    // $sum_of_incom = trim(htmlspecialchars($sum_of_incom));

// , $term_of_credit, $sum_of_credit, $sum_of_incom 


// Условия:
// 0. Базовая ставка 30%
// 1. Отказать всем младше 21 и старше 55 . Многодетным матерям до 30 отказать
// 2. Для ИП и Самозанятых повысить ставку на 5%
// 3. Для многодетных повысить ставку на 5%, 
// 4. для остальных групп повысить на 7%
// 5. Рассчитать ежемесячный платеж.
// 6. Если платеж превышает 50% от дохода - отказать

