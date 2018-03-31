<?

session_start();
require_once ('../app/home.php');
require_once ('../core.php');
$load_prod=R::find('prod',"`prod`=?",array($_POST["primer"]));
//$i=0;
function random_html_color()
{
  return sprintf( '%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
}


if(count($loadall)>0){
  //echo'{"uid":[';
  for ($i = 1; $i <= count($loadall); $i++) {
    if($i==count($loadall)){
      echo'{"id":"'.$loadall[$i]->uid.'",
      "name":"'.substr($value->name, 0, 22).'",
      "about":"'.substr($value->about, 0, 52).'",
      "price":"'.rand(12,3552).'",
      "dop":"'.$loadall[$i]->uid.'"}';
    }else{
      echo'{"id":"'.$loadall[$i]->uid.'",
      "name":"'.substr($value->name, 0, 22).'",
      "about":"'.substr($value->about, 0, 52).'",
      "price":"'.rand(12,3552).'",
      "dop":"'.$loadall[$i]->uid.'"},';
    };
    //'"'.$i.'"'
  }
  //echo ']}';
}else{
  echo'Пустота'.count($loadall);
}
?>
