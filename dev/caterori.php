<?

session_start();
require_once ('../app/home.php');
require_once ('../core.php');
$loadall=R::find('prod',"`prod`=?",array($_POST["cat"]));
//$i=0;
function random_html_color()
{
  return sprintf( '%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
}
$code;
$img=random_html_color();
echo'[';
?>

<?
if(count($loadall)>0){
  $code=200;
/*
?>
  {
    "name":"",
    "code":"<?=$code?>",
    "data":
      {
      "guid":"adada",
      "name":"EWada"
      },
    "bread_crumbs":
      {
      "guid":"adada",
      "name":"EWada"
      }
  }
<?*/
  for ($i = 1; $i <= count($loadall); $i++) {

    if($i==count($loadall)){
      echo'{"id":"'.$loadall[$i]->uid.'",
      "name":"'.substr($loadall[$i]->name, 0, 22).'",
      "about":"'.substr($loadall[$i]->about, 0, 52).'",
      "price":"'.rand(12,3552).'",
      "img":"http://dummyimage.com/250x250/'.$img.'"}';
    }else{
      echo'{"id":"'.$loadall[$i]->uid.'",
      "name":"'.substr($loadall[$i]->name, 0, 22).'",
      "about":"'.substr($loadall[$i]->about, 0, 52).'",
      "price":"'.rand(12,3552).'",
      "img":"http://dummyimage.com/250x250/'.$img.'"},';
    };
    //'"'.$i.'"'
  }
  //echo ']}';
}else{
  /*?>
  {
  "name":"Пустота",
  "code":"400",
  "data":[
    {
    "guid":"adada",
    "name":"EWada"
    }
  ],
  "bread_crumbs":[
  {
  "guid":"adada",
  "name":"EWada"
  }]
  }

    <?*/


  echo'{"id":"0",
      "name":"Пусто",
      "about":"Укроп",
      "price":"ss",
      "img":"http://dummyimage.com/250x250/'.$img.'"}';
} echo']';
?>
