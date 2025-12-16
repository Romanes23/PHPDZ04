<!-- <H5> HELLO functions.php </H5> -->
<?

function validate($username, $age,  $gender, $tipezan, &$ids, $term_of_credit,$sum_of_credit,$sum_of_incom)
{   
   //dump($ids);
   //foreach ($ids as $values => $value) { echo " $value  ";}
   $child = in_array("'many_child'", $ids);
   $username = trim(htmlspecialchars($username));
    $fl=0;
    $errors = [];
    if (empty($username) || empty($age)||  empty($gender) || empty($tipezan)|| empty($term_of_credit)
                          || empty($sum_of_credit) || empty($sum_of_incom)  )  {$errors[] = "10";$er = "10"; $fl=1;}

    elseif ((mb_strlen($username) < 3 || mb_strlen($username) > 50) && $fl==0) 
    {$errors[] = "10";$er = "10"; $fl=1;}  

    elseif (($age > 55 || $age <21) && $fl==0)  {$errors[] = "1 отказ по возрасту";$er = "1 отказ по возрасту"; $fl=1;}

    elseif ($child && ($age <31) && ($gender==="female")  && ($fl==0)) 
    { $errors[] = "2 отказ по матери";  $er ="2 отказ по матери"; $fl=1;}
   
    elseif (($tipezan==="IP"|| $tipezan==="SZ" || $child) && $age >30 && $fl==0)
    { $errors[] = 5 ; $er = 5 ;  $fl=1;}

    elseif ($fl==0) { $errors[] = 7;$er = 7;}
   
    
    return $er;
    
 }

function get_buisness($er,$term_of_credit, $sum_of_credit, $sum_of_incom){
$base_mes =(30+$er)/12/100;
 $plateg =[];
$term_kr = $term_of_credit; // срок кредита в месяцах
$sum_kr_ost = $sum_of_credit;   // сумма кредита оставшаяся
$sum_of_incom;    // сумма дохода в мес
$sum_kr_mes = $sum_of_credit / $term_kr; // ежемес платеж основной суммы 
if (($sum_kr_mes*(1+$base_mes))<$sum_of_incom/2 ){
$i=1;
   while (($sum_kr_ost > 0) ) 
{
   $rasch_perc =   $sum_kr_ost*$base_mes; //ежемес расчет %% на остаток долга
   $vsego = round($sum_kr_mes+$rasch_perc, 2);
 //  echo "<br>" .$i . "  ". $sum_kr_ost. "  ". $rasch_perc;
   $sum_kr_ost -= $sum_kr_mes;
   $i++;
   
   $plateg[] =  $vsego;}

   
   return $plateg;

}
 else return $plateg; 

}
// Условия:
// 0. Базовая ставка 30%
// 1. Отказать всем младше 21 и старше 55 . Многодетным матерям до 30 отказать
// 2. Для ИП и Самозанятых повысить ставку на 5%
// 3. Для многодетных повысить ставку на 5%, 
// 4. для остальных групп повысить на 7%
// 5. Рассчитать ежемесячный платеж.
// 6. Если платеж превышает 50% от дохода - отказать

