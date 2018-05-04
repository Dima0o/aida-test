<?
session_start();
//$y2k = mktime(0,0,0,1,1,2000);
//setcookie('name', 'bret', $y2k);

include_once('core.php');
mb_internal_encoding("UTF-8");
require '../rb-mysql.php';

if($_SESSION['PHPSESSID']=='e748ee24c0b0d53aace7bbcdde6920ac'){
  //  echo '<h1>'.$_SESSION['PHPSESSID'].'</h1></br>';
    foreach($_COOKIE as $key=>$value){
    //    echo $key .' - '.$value .'<br>';
    }
    foreach($_POST as $key=>$value){
      //  echo $key .' post '.$value .'<br>';
    }
}


//$result = array_merge ($_COOKIE, $_POST);

//echo '['.json_encode($result).']';
    /*if(isset($_POST['edite'])){
        $qwery = mysql_query("
            INSERT INTO `k99969kp_1c`.`auto_car_info` (`id`, `gos`, `brig`, `tipe`, `model`, `year`, `servis`, `kasko`, `status`, `sut`, `koment`, `remont`)
            VALUES (NULL, '$gos', '$brig', '$type', '$model', '$year', '$sto', '$kasko', 1, '$sut', NULL, NULL);
            ");
        /*$qwery = mysql_query("
        INSERT INTO  `$db_name`.`tiket_list` (`id`, `titel`, `sut`, `start`, `end`, `user1`, `user2`, `className`, `metta`, `allDay`, `progress`, `status`)VALUES (NULL, '$titel', '$sut', '$start', '$end', '$user1', '$user2', '$info', '$metta', '$true', '$progress', '$status')");
        mysql_insert_id()
    */

    //}
//card_online



// работа с остальными штуками http://w3.org.ua/
//  посмотреть дома для анализа http://w3.org.ua/eshop/shop/



//if (isset($_POST['edite'])) {
    //
    // $cat->name = $_GET['name'];
    //$cat->uid = $_GET['code'];
    // $cat->code = $_GET['categori'];
  /*  $save = R::dispense('card_online');
    //получение массива
   $mass= json_decode($_POST['data']);
    $save->uid=$_SESSION['PHPSESSID'];
    $save->tipe=1;
    $save->item=$mass['item'];
    $save->col=$mass['col'];
    $save->shop=1;
    $save->time=date('d-m-Y H:M:S');*/

    /*
     * foreach (json_decode($_POST['data']) as $key=>$value){
        $cat->$key=$value;
        };
    */
 //   R::store( $save );
  //  echo 'Успешно Категория добавленна ' . $_GET['name'];
//} else {
  //  echo "Не порядочек";
//}*/

function token_on($id){
    $qr_result = mysql_query("select * from `k99969kp_1c`.`token` WHERE `token`='".$id."'") or die(mysql_error());
    if(mysql_num_rows($qr_result)==0 or $_SESSION['PHPSESSID']!=''){
     /*
        $date=date("Y-m-d H:i:s");
        $qwery =mysql_query("INSERT INTO `k99969kp_1c`.`token` (`id`, `token`, `data`) 
          VALUES (NULL, '$token', '$date'");
        //INSERT INTO `token` (`id`, `token`, `data`) VALUES (NULL, 'asda', '2018-05-04 00:00:00');
        $result = array_merge ($_COOKIE, $_POST);
//echo '[{"PHPSESSID":"e748ee24c0b0d53aace7bbcdde6920ac","cadr_list":"","cadr_price":"0","token":"ff63494649e895555fc608afcebc5f8b"}]';
       */
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $token=  md5(uniqid(rand(1,525), true));
        $_SESSION['token']=$token;
        $cat = R::dispense('token');
        $cat->token =$token;
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
        $result = array_merge ($_COOKIE, $_SESSION);
     echo '["tipe":"if",'.json_encode($result).']';
    }else{
        $result = array_merge ($_COOKIE, $_SESSION);
        echo '["tipe":"else",'.json_encode($result).']';
    };
}

// авторизация через токен

token_on($_COOKIE['PHPSESSID']);
//запись данных в корзину
