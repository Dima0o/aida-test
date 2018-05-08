<?
session_start();
//$y2k = mktime(0,0,0,1,1,2000);
//setcookie('name', 'bret', $y2k);

include_once('core.php');
mb_internal_encoding("UTF-8");
require '../rb-mysql.php';

function token_on($id){
    if(isset($_COOKIE['token']) or isset($_SESSION['token'])){

        $date=date("Y-m-d H:i:s");
        $qwery =mysql_query("INSERT INTO `k99969kp_1c`.`token` (`id`, `token`, `data`) 
          VALUES (NULL, '".$_COOKIE['token']."', '$date'");
        //INSERT INTO `token` (`id`, `token`, `data`) VALUES (NULL, 'asda', '2018-05-04 00:00:00');
        $result = array_merge ($_COOKIE, $_POST);
//echo '[{"PHPSESSID":"e748ee24c0b0d53aace7bbcdde6920ac","cadr_list":"","cadr_price":"0","token":"ff63494649e895555fc608afcebc5f8b"}]';

   //   echo '['.json_encode($_COOKIE).']';
    }else{


        $qr_result = mysql_query("select * from `k99969kp_1c`.`token` WHERE `token`='".$id."'") or die(mysql_error());
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
        setcookie("token",$token,time()+(60*60*24*30));
        $_COOKIE['token']=$token;
         setcookie("token",$token,time()+(60*60*24*30));
        $_COOKIE['token']=$token;


       // echo '-'.$row_cnt;
        // $_SESSION['token']= $token;
      //  echo $_COOKIE['token'];
        //$result = array_merge ($_COOKIE, $_SESSION);
    //    echo '["tipe":"if",'.json_encode($_COOKIE).']';
    };
}

function out_card(){
  //  echo $_COOKIE['token'];
    //рендеринг корзины какой бы она не была
    $summ=0;
    if(isset($_COOKIE['token']) or isset($_SESSION['token'])) {
        $qr_result = mysql_query("select `prod`,`kol` from `k99969kp_1c`.`shop` WHERE `token`='" . $_SESSION['token'] . "'") or die(mysql_error());
        $data = array(); // в этот массив запишем то, что выберем из базы
        while ($row = mysql_fetch_array($qr_result)) {// оформим каждую строку результата
            // как ассоциативный массив
            $data[] = $row;
            $summ=$summ+$row['kol'];
           // echo $row['id'];// допишем строку из выборки как новый элемент результирующего массива
        }//echo '/'.$qr_result;
        setcookie("cadr_col_shop",count($data));
        $_COOKIE['cadr_col_shop']=count($data);
        setcookie("cart_count",count($data));
        $_COOKIE['cart_count']=count($data);
         echo '[{"item":'.json_encode($data).',"sum":'.$summ.'}]';
         $_SESSION['word']='adada';
        //echo '["tipe":"if",'.json_encode($_COOKIE).']';
        //echo $id;
        //$.cookie('cadr_col_shop'));
        //$('.cart_price').html($.cookie('cart_count'));
        //$('.cart_count').html($.cookie('cart_count'));

    }else{
        printf('["col":[]]');
    }
}
function add_card(){
    //запись в корзину
    if(isset($_POST['item'])){
        R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
        $cat = R::dispense('shop');
        $cat->token =$_SESSION['token'];
        $cat->prod =$_POST['item'];
        $cat->kol =$_POST['col'];
        $cat->data = date("Y-m-d H:i:s");
        R::store( $cat );
        //запись в вессию
    }
}

// авторизация через токен

token_on($_COOKIE['token']);
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