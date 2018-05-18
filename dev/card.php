<?
session_start();
//$y2k = mktime(0,0,0,1,1,2000);
//setcookie('name', 'bret', $y2k);

include_once('core.php');
mb_internal_encoding("UTF-8");
require '../rb-mysql.php';

function token_on(){
    if(isset($_COOKIE['token']) or isset($_SESSION['tokens'])){

       // $date=date("Y-m-d H:i:s");
        //$qwery =mysql_query("INSERT INTO `k99969kp_1c`.`token` (`id`, `token`, `data`)
         // VALUES (NULL, '".$_COOKIE['token']."', '$date'");
        //INSERT INTO `token` (`id`, `token`, `data`) VALUES (NULL, 'asda', '2018-05-04 00:00:00');
     //   $result = array_merge ($_COOKIE, $_POST);
//echo '[{"PHPSESSID":"e748ee24c0b0d53aace7bbcdde6920ac","cadr_list":"","cadr_price":"0","token":"ff63494649e895555fc608afcebc5f8b"}]';

   //   echo '['.json_encode($_COOKIE).']';




    }else{
        $qr_result = mysql_query("select * from `k99969kp_1c`.`token` WHERE `token`='".$_COOKIE['token']."'") or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
            $_SESSION['token'] = $data['token'];
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
        setcookie("TestCookie",$token);
        //$_COOKIE['token']=$token;
        $_SESSION['tokens']=$token;
    };
}

function out_card(){
    $summ=0;
    if(isset($_COOKIE['token']) or isset($_SESSION['token'])) {
        $qr_result = mysql_query("select `id`,`prod`,`kol` from `k99969kp_1c`.`shop` WHERE `status`!=1 and `token`='" . $_SESSION['tokens']. "'") or die(mysql_error());
        $data = array(); // в этот массив запишем то, что выберем из базы
        while ($row = mysql_fetch_array($qr_result)) {// оформим каждую строку результата
            // как ассоциативный массив
            $data[] = $row;
            $summ=$summ+ price($row['prod'])*$row['kol'];
        }
         echo '[{"item":'.json_encode((super_unique($data,'prod'))).',"sum":'.$summ.',"tokens":"'.$_SESSION['tokens'].'","token":"'.$_COOKIE['TestCookie'].'"}]';
        setcookie("cadr_col_shop",count($data));
        $_COOKIE['cadr_col_shop']=count($data);
        setcookie("cart_count",count($data));
        $_COOKIE['cart_count']=count($data);
         $_SESSION['word']='adada';
    }else{
        printf('["col":[]]');
    }
}
function super_unique($array,$key)
{
    $temp_array = [];
    foreach ($array as &$v) {
        if (!isset($temp_array[$v[$key]]))
            $temp_array[$v[$key]] =& $v;
    }
    $array = array_values($temp_array);
    return $array;

}
function add_card(){
    //запись в корзину
    if(isset($_POST['item'])){
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $cat = R::dispense('shop');
        $cat->token =$_SESSION['token'];
        $cat->prod =$_POST['item'];
        $cat->kol =$_POST['kol'];
        $cat->status =$_POST['status'];
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
        //запись в вессию
    }
}
function join_card(){

}
function price($id)
{
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `id` ='".$id."' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) > 0) {

        while($sql = mysql_fetch_array($qr_result)){
            return  $sql['price']/10;
        };
    }else{
        return  '404';
    }
}
// авторизация через токен

token_on();
//запись данных в корзину

add_card();
out_card();
/*
R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
$cat = R::dispense('views');
$cat->token =$_SESSION['uid'];
$cat->prod =$_POST['item'];
$cat->token = $_COOKIE['token'];

$cat->data = date("Y-m-d H:i:s");
R::store( $cat );*/

//корзина по новому  с возравтом для работы с всплывающей корзиной}