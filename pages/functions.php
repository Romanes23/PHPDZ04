<!-- <H5> HELLO functions.php </H5> -->
<?
function regUser($username, $age, $age1, $gender, $tipezan,  $spesgroup, $term_of_credit, $sum_of_credit, $sum_of_incom )
{
    $errors = [];
    
    $username = trim(htmlspecialchars($username));
    $age = trim(htmlspecialchars($age));
    $term_of_credit = trim(htmlspecialchars($term_of_credit));
    $sum_of_credit = trim(htmlspecialchars($sum_of_credit));
    $sum_of_incom = trim(htmlspecialchars($sum_of_incom));
   // var_dump($username, $age, $term_of_credit, $sum_of_credit);
    $errors = validate($username, $age, $term_of_credit, $sum_of_credit, $sum_of_incom);
    dd($errors);
    return $errors;
  
}

function validate($username, $age, $age1, $term_of_credit, $sum_of_credit ,$sum_of_incom)
{
    $errors = [];
    if (empty($username) || empty($age) || empty($term_of_credit) || 
        empty($sum_of_credit) || empty($sum_of_incom) ){
         $errors[] = "All filds must be filled";
     };

    if (mb_strlen($username) < 3 && mb_strlen($username) > 15) {
       // echo "The number of characters in the  name field should be from 3 to 15   ";
        $errors[] = "The number of characters in the  name field should be from 3 to 15   ";
    };
    if (mb_strlen($term_of_credit) < 3 && mb_strlen($term_of_credit) > 30) {
       // echo "Characters term_of_credit and confirm filds aren't equally";
        $errors[] = "The number of characters in the  term_of_credit field should be from 5 to 30   "; 
    };

        return $errors;
    
}



