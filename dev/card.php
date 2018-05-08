<?
session_start();
//$y2k = mktime(0,0,0,1,1,2000);
//setcookie('name', 'bret', $y2k);

include_once('core.php');
mb_internal_encoding("UTF-8");
require '../rb-mysql.php';


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
/*  работа с наполнением в корзине если да то да если нет то просто рендеринг отдельно в 3 модуля разделить это все
R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');

$cat = R::dispense('shop');
$cat->token =$_SESSION['token'];
$cat->prod =123;
$cat->kol =12;

$cat->kod ='asdasdaASDAD12';
$cat->data = date("Y-m-d H:i:s");
R::store( $cat );
*/

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

    if(isset($_COOKIE['token']) or isset($_SESSION['token'])){
     /*
        $date=date("Y-m-d H:i:s");
        $qwery =mysql_query("INSERT INTO `k99969kp_1c`.`token` (`id`, `token`, `data`) 
          VALUES (NULL, '$token', '$date'");
        //INSERT INTO `token` (`id`, `token`, `data`) VALUES (NULL, 'asda', '2018-05-04 00:00:00');
        $result = array_merge ($_COOKIE, $_POST);
//echo '[{"PHPSESSID":"e748ee24c0b0d53aace7bbcdde6920ac","cadr_list":"","cadr_price":"0","token":"ff63494649e895555fc608afcebc5f8b"}]';
       */
        echo '<br>["tipe":"else",'.json_encode($_COOKIE).']</br>';
        echo '<br>["tipe":"else",'.json_encode($_SESSION).']';
    }else{


        $qr_result = mysql_query("select * from `k99969kp_1c`.`token` WHERE `token`='".$id."'") or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
            $_SESSION['token']= $data['token'];
        };
        $row_cnt = mysqli_num_rows($qr_result);
        //$result = array_merge ($_COOKIE, $_SESSION);
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $token=  md5(uniqid(rand(1,525), true));
        $_SESSION['token']=$token;
        $cat = R::dispense('token');
        $cat->token =$token;
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
        //$_COOKIE['PHPSESSID']= $token;
        setcookie("token",$token,time()+(60*60*24*30));
        $_COOKIE['token']=$token;
        echo '-'.$row_cnt;
        // $_SESSION['token']= $token;
        echo $_COOKIE['token'];
        //$result = array_merge ($_COOKIE, $_SESSION);
        echo '<br>["tipe":"if",'.json_encode($_COOKIE).']</br>';
        echo '<br>["tipe":"if",'.json_encode($_SESSION).']';
    };
}

function out_card(){
    //рендеринг корзины какой бы она не была
}
function add_card(){
    //запись в корзину
    if(isset($_POST['item'])){
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $cat = R::dispense('shop');
        $cat->token =$_SESSION['token'];
        $cat->prod =$_POST['item'];
        //$cat->user =$_POST[''];
        $cat->kol =$_POST['col'];
       // $cat->kod ='asdasdaASDAD12';
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
    }
}

// авторизация через токен

token_on($_COOKIE['token']);
//запись данных в корзину
