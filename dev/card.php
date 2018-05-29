<?
session_start();

//$y2k = mktime(0,0,0,1,1,2000);
//setcookie('name', 'bret', $y2k);
include_once('core.php');
mb_internal_encoding("UTF-8");
require '../rb-mysql.php';
function token_on(){
   /* if(isset($_COOKIE['token'])or $_COOKIE['token']!=null ){
        // $date=date("Y-m-d H:i:s");
        //$qwery =mysql_query("INSERT INTO `k99969kp_1c`.`token` (`id`, `token`, `data`)
        // VALUES (NULL, '".$_COOKIE['token']."', '$date'");
        //INSERT INTO `token` (`id`, `token`, `data`) VALUES (NULL, 'asda', '2018-05-04 00:00:00');
        //   $result = array_merge ($_COOKIE, $_POST);
//echo '[{"PHPSESSID":"e748ee24c0b0d53aace7bbcdde6920ac","cadr_list":"","cadr_price":"0","token":"ff63494649e895555fc608afcebc5f8b"}]';
        //   echo '['.json_encode($_COOKIE).']';
    }else{*/
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
      //  setcookie("token",$token);
        setcookie('token', $token, time() + 136000);
        //$_COOKIE['token']=$token;
        $_SESSION['token']=$token;
         setcookie('beget',  $token, time() + 3600);

    //};
    return $token;
}

//вывод в корзину в json
function out_card(){
    $summ=0;

  /*  if($_POST['token']==null or $_POST['token']='undefined' or isset($_POST['token'])){
        $token=$_POST['token'];

        $card=1;
    }else{
        $card=0;
    }*/
    if(isset($_SESSION['token'])){
        $token= token_on();
        $card=1;
    }else{
        $token= $_COOKIE['PHPSESSID'];
        $card=1;
    }
    setcookie("color","red");
    if($card==1) {
        //$qr_result = mysql_query("SELECT `k99969kp_1c`.`shop`.`prod`,`k99969kp_1c`.`price`.`price`, `k99969kp_1c`.`shop`.`kol` FROM `k99969kp_1c`.`prod`,`k99969kp_1c`.`price`,`k99969kp_1c`.`shop` WHERE `k99969kp_1c`.`shop`.`status`=0 and `k99969kp_1c`.`shop`.`token`='" . $_SESSION['tokens']. "'") or die(mysql_error());
        $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`shop` WHERE `k99969kp_1c`.`shop`.`status`=0 and `k99969kp_1c`.`shop`.`token`='" . $token. "'") or die(mysql_error());
        $data = array(); // в этот массив запишем то, что выберем из базы
        while ($row = mysql_fetch_array($qr_result)) {// оформим каждую строку результата
            // как ассоциативный массив
            $data[] = array("prod"=>$row['prod'],"name"=> mb_strimwidth(name($row['prod']), 0, 15, "..."),"kol"=>$row['kol'],"prise"=>price($row['prod']),"img"=>"data:image/png;base64,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");
            $summ=$summ + price($row['prod'])*$row['kol'];

        };
        echo '[{"item":'.json_encode((super_unique($data,'prod'))).',"sum":'.$summ.',"session-tokens":"'.$_SESSION['token'].'",,"color-tokens":"'.$_COOKIE["color"].'",,"session-tokens":"'.$_SESSION['token'].'","token":"'.$token.'","coke-tokens":"'.$_COOKIE['token'].'"}]';
        setcookie("cadr_col_shop",count($data));
        $_COOKIE['cadr_col_shop']=count($data);
        setcookie("cart_count",count($data));
        $_COOKIE['cart_count']=count($data);
        $_SESSION['word']='adada';
    }else{
       $token= token_on();
        echo '[{"item":[],"sum":'.$summ.',"session-tokens":"'.$_SESSION['token'].'",,"color-tokens":"'.$_COOKIE["color"].'",,"session-tokens":"'.$_SESSION['token'].'","token":"'.$token.'","coke-tokens":"'.$_COOKIE['token'].'"}]';

     //   printf('[{"item":[],"sum":0,"session-tokens":"","token":"'.$token.'","coke-tokens":"null"}]');
    }
    echo '[{"item":'.json_encode((super_unique($data,'prod'))).',"sum":'.$summ.',"session-tokens":"'.$_SESSION['token'].'",,"color-tokens":"'.$_COOKIE["color"].'",,"session-tokens":"'.$_SESSION['token'].'","token":"'.$token.'","coke-tokens":"'.$_COOKIE['token'].'"}]';

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
    if(isset($_POST['item']) and $_POST['status']==0){
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $cat = R::dispense('shop');
        $cat->token =$_SESSION['token'];
        $cat->prod =$_POST['item'];
        $cat->kol =$_POST['kol'];
        $cat->status =$_POST['status'];
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
        //запись в вессию
    }elseif(isset($_POST['item']) and  $_POST['status']!=0){
        //R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
       // $prod=R::find('shop',"prod = ?",array($_POST['item']));
        $qr_result = mysql_query("select * from `k99969kp_1c`.`shop` WHERE `prod`=".$_POST['item']." and `token`='" . $_SESSION['tokens']. "'") or die(mysql_error());
         //$qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `prod` ='".$id."' ORDER BY `price`.`data` DESC LIMIT 0, 1");
        if (mysql_num_rows($qr_result) > 0) {
            while($sql = mysql_fetch_array($qr_result)){
                $sql = "DELETE FROM `k99969kp_1c`.`shop` WHERE id=".$sql['id'];
                mysql_query($sql) or die (mysql_error());
            }
        };
        /*
        foreach ($prod as $value){
            /*$cat1 = R::load('shop', $value->id);
            $cat1->status = 2;
            R::store($cat1);
            $cat1 = R::load('shop', $value->id);
            R::trash($cat1);
        }*/
    }
}


function name($id){
    $qr_result = mysql_query("SELECT *  FROM `k99969kp_1c`.`prod` WHERE  id=".$id);
    if (mysql_num_rows($qr_result) != 0) {
        while($sql = mysql_fetch_array($qr_result)){
            return  $sql['name'];
        };
    }else{
        return  'Товар не найден';
    }
}

function price($id){
    $qr_result = mysql_query("SELECT `price`.`price`  FROM `k99969kp_1c`.`prod`,`k99969kp_1c`.`price` WHERE prod.uid=price.uid AND prod.id='".$id."' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) != 0) {
        while($sql = mysql_fetch_array($qr_result)){
            return  $sql['price']/10;
        };
    }else{
        return  '404';
    }

}
// авторизация через токен
//token_on();
//запись данных в корзину
//add_card();
//out_card();





/*
R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
$cat = R::dispense('views');
$cat->token =$_SESSION['uid'];
$cat->prod =$_POST['item'];
$cat->token = $_COOKIE['token'];
$cat->data = date("Y-m-d H:i:s");
R::store( $cat );*/
//корзина по новому  с возравтом для работы с всплывающей корзиной}

/**
 * у нас будет  5 параметров  на вход  это   товар,количество, сессия и куки , а также  статус товар
 */

function TokenOn(){
   $token= md5(rand(0, PHP_INT_MAX));
    setcookie('PHPSESSID', $token, time() + 136000);
    //$_COOKIE['token']=$token;
    $_SESSION['token']=$token;
   return true;
    //
}


function ProdAdd(){
    R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
    $cat = R::dispense('shop');
    $cat->token =$_COOKIE['PHPSESSID'] ;
    $cat->prod =$_POST['item'];
    $cat->kol =$_POST['kol'];
    $cat->status =$_POST['status'];
    $cat->data = date("Y-m-d H:i:s");
   $id= R::store( $cat );
    R::close();
    return $id;
}
function ProdDell(){
    R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
    $qr_result = mysql_query("select * from `k99969kp_1c`.`shop` WHERE `prod`=".$_POST['item']." and `token`='" . $_COOKIE['PHPSESSID']. "'") or die(mysql_error());
    //$qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `prod` ='".$id."' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) > 0) {
        while($sql = mysql_fetch_array($qr_result)){
            $sql = "DELETE FROM `k99969kp_1c`.`shop` WHERE id=".$sql['id'];
            mysql_query($sql) or die (mysql_error());
        }
    };
    R::close();
    return true;
}

function CardBild(){
   // $pages = R::getAll('shop', 'token = :token , status :status',array(':token' =>  $_SESSION['PHPSESSID'],':status' => 0));
    //$sql='SELECT * FROM `k99969kp_1c`.`shop` WHERE `k99969kp_1c`.`shop`.`status`=0 and `k99969kp_1c`.`shop`.`token`='.$_COOKIE['PHPSESSID'];

    if(isset($_COOKIE['PHPSESSID'])==false){
        //token
        setcookie('PHPSESSID', $_POST['token'], time() + 3600);

    }
  //  R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
  //  $pages = R::find('shop',' token = ? ', array( $_COOKIE['PHPSESSID'] ));
   // $pages = R::getAll("select * from `shop` where `token` = ?", array( $_COOKIE['PHPSESSID']));
   $summ=0;
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`shop` WHERE `k99969kp_1c`.`shop`.`status`=0 and `k99969kp_1c`.`shop`.`token`='" . $_COOKIE['PHPSESSID']. "'") or die(mysql_error());
    $data = array(); // в этот массив запишем то, что выберем из базы
    while ($row = mysql_fetch_array($qr_result)) {// оформим каждую строку результата
        // как ассоциативный массив
        $pages[] = array("prod"=>$row['prod'],"name"=> mb_strimwidth(name($row['prod']), 0, 15, "..."),"kol"=>$row['kol'],"prise"=>price($row['prod']),"img"=>"data:image/png;base64,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");
       /// $summ=$summ + price($row['prod'])*$row['kol'];

    };

    if(count($pages)>0){
        foreach ($pages as $row) {
            $data[] = array("prod"=>$row['prod'],"name"=> mb_strimwidth(name($row['prod']), 0, 15, "..."),"kol"=>$row['kol'],"prise"=>price($row['prod']),"img"=>"data:image/png;base64,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");
            $summ=$summ + price($row['prod'])*$row['kol'];
        }

        return '[{"item":'.json_encode((super_unique($data,'prod'))).',"sum":'.$summ.',"token":"'.$_COOKIE["PHPSESSID"].'"}]';
    }else{
        echo  '[{"item":[],"sum":0,"token":"'.$_COOKIE["PHPSESSID"].'"}]';
    }
    R::close();

   // $data;
}

function Start(){
    if($_COOKIE["PHPSESSID"]==null or $_COOKIE["PHPSESSID"]=='undefined' or isset($_COOKIE["PHPSESSID"])==false){
        TokenOn();
    }
    //работа с остатками
    if(isset($_POST['item'])) {
        if ($_POST['status'] == 0) {
            ProdAdd();
        } elseif ($_POST['status'] == 1) {
            ProdDell();
        }
    }
        echo   CardBild();
}
Start();

//out_card();