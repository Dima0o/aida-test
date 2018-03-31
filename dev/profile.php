<?

session_start();
require_once ('../app/home.php');
require_once ('../core.php');
$loadall=R::find('prod',"`uid`=?",array($_POST["cat"]));
//$i=0;
function random_html_color()
{
    return sprintf( '%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
}
$code;
$img=random_html_color();
echo'[';
    if(count($loadall)>0){
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


        echo'{"id":"0",
          "name":"Пусто",
          "about":"Укроп",
          "price":"ss",
          "img":"http://dummyimage.com/250x250/'.$img.'"}';
    }
echo']';
?>
