<?php

session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");
function catalog_id()
{

    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `categori`.`id`=" . $_GET['id']) or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        return $data['name'];
    }

}

function prod_col($id)
{
    if (isset($id)) {
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `categori`=" . $id) or die(mysql_error());
        return mysql_num_rows($qr_result);
    } else {
        return '1';
    }
}

function Prod_data($id)
{
    $i = 1;
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` LIMIT 0, 5") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        $row = '';
        if ($data['id'] == $id) {
            $status = '"status": "color: #ef7f1b;",';
        } else {
            $status = '"status": "",';
        }


        if ($i == mysql_num_rows($qr_result)) {
            $row .= '{"id":"' . $data['id'] . '",' . $status . ' "name":"' . str_replace('"', '`', $data['name']) . '"}';

            $i++;
        } else {

            $row .= '{"id":"' . $data['id'] . '",' . $status . '  "name":"' . str_replace('"', '`', $data['name']) . '"},';
            $i++;
        }

    }
    ;
    return $row;
}

function all()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
    $i   = 1;
    $row = '';
    while ($data = mysql_fetch_array($qr_result)) {
        if ($i == mysql_num_rows($qr_result)) {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
}';
            $i++;
        } else {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . rand(0, 222122) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
},';
            $i++;
        }
    }
    ;
    //return mysql_fetch_array($qr_result);
    return $row;
}

function data($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='" . $id . "'" . $_POST['sort']) or die(mysql_error());
    $i   = 1;
    $row = '';
    while ($data = mysql_fetch_array($qr_result)) {
        if ($i == mysql_num_rows($qr_result)) {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
}';
            $i++;
        } else {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
},';
            $i++;
        }
    }
    ;
    //return mysql_fetch_array($qr_result);
    return $row;
}



function img($name)
{
    $pieces = explode(" ", $name);
    foreach ($pieces as $key => $val) {
        if ($val != 'Распродажа' and $val != '40%' and $val != '0,5л' and $val != 'Водка' and $val != 'ориг.40% 0,1л ') {
            $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="' . $val . '"');
            $data     = json_decode($postData, true);
            foreach ($data as $value) {
                // return $value['count'];
                if ($bvalue['count'] > 0) {
                    foreach ($value['items'] as $v) {
                        if ($v['photo_604'] != '') {
                            return str_replace('\/', '/', $v['photo_604']);
                        } elseif ($v['photo_1280'] != '') {
                            return str_replace('\/', '/', $v['photo_1280']);
                        } elseif ($v['photo_807'] != '') {
                            return str_replace('\/', '/', $v['photo_807']);
                        } elseif ($v['photo_2560'] != '') {
                            return str_replace('\/', '/', $v['photo_2560']);
                        }
                    }
                }
                ;
            }
        }
    }
}


function price($id)
{
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `uid` ='" . $id . "' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) > 0) {
        while ($sql = mysql_fetch_array($qr_result)) {
            return $sql['price'] / 10;
        }
        ;
    } else {
        return '404';
    }
}

//работа с новыми товарами
function data_all($id)
{

    if (isset($id)) {
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='" . $id . "'" . $_POST['sort']) or die(mysql_error());

    } else {
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`" . $_POST['sort']) or die(mysql_error());
    }
    $i   = 1;
    $row = '';
    while ($data = mysql_fetch_array($qr_result)) {
        if ($i == mysql_num_rows($qr_result)) {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
}';
            $i++;
        } else {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
},';
            $i++;
        }
    }
    ;
    //return mysql_fetch_array($qr_result);
    return $row;
}

/*
 * <? if (isset($_POST['id']) and prod_col($_POST['id'])>0) {
 echo  data_all(categori_uid($_POST['id']));
 } else {
 echo all();
 }; ?>
 */
function data_out()
{
    //json_encode
    if (isset($_GET['id']) or prod_col($_GET['id']) > 0 or $_GET['id'] != null) {
        return json_encode( all2() );
        //echo '<pre>';
        //var_dump(all2());
        //echo '</pre>';

    } else {
        return json_encode( all2() );
        //return json_encode(data_cat(categori_uid($_POST['id'])));
    }
}
//работа с полечение  даных
function all2()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0,20") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] = array(
            "id" => $data['id'],
            "name" => $data['name'],
            "price" => $data['id'],
            "categori_name" => category_name($data['categori']),
            "uid" => $data['uid'],
            "categori_id" => category($data['categori']),

            "categori" => category($data['categori']),
            "price" => price2($data['uid'], $_COOKIE['main-shop']),
            "img" => img2(),
            //"tipe" => $data[ 'quantity' ]
            //работа с типом товара для поиска его массива
            "status" => status($data['id']),
            "event" => event_prod($data['uid'])
        );
    };
    //return mysql_fetch_array($qr_result);
    return $mass;
}
//работа с  эвентом  для отображения разного статуса товара

function event_prod($id)
{

    $qr_result = mysql_query("select * from `k99969kp_1c`.`eventslist` WHERE `guid`='" . $id . "' LIMIT 0,1") or die(mysql_error());
    // echo $id . '//' . count(mysql_fetch_array($qr_result)) . '**<br>';
    if (count(mysql_fetch_array($qr_result)) > 0) {
        while ($data = mysql_fetch_array($qr_result)) {
            //  echo "name: ".$data[ 'name' ];
            return $data['name']; //   array("name"=>$data[ 'name' ],"class"=>$data[ 'value' ]);

        }
    } else {
        //$data1[]=;
        //     echo $id;
        return array(
            "name" => "Акции нет все нормально",
            "class" => 22
        );
    }

}


//выбранная категория
function prod_cat($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`") or die(mysql_error());
    //img($data['name']);
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] = array(


            "id" => $data['id'],
            "name" => $data['name'],
            "price" => $data['id'],
            "uid" => $data['uid'],
            "categori_name" => category_name($data['categori']),
            "categori_id" => category($data['categori']),
            "categori" => category($data['categori']),
            "price" => price2($data['uid'], $_COOKIE['main-shop']),
            "img" => img2(),
            "status" => status($data['id']),
            "tipe" => $data['quantity']
        );
    }
    ;
    //return mysql_fetch_array($qr_result);
    return $mass;
}
//проверка в корзине
function status($id){
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`shop` WHERE `k99969kp_1c`.`shop`.`status`=0 and `k99969kp_1c`.`shop`.`token`='" . $_COOKIE['PHPSESSID']. "' and `k99969kp_1c`.`shop`.`prod`=".$id) or die(mysql_error());
    if (mysql_num_rows($qr_result) > 0) {
        return array(
            "html"=>"<i class=\"icon-bag\"></i>В корзине",
            "class" => "btn btn-success btn-sm",
            "add" => mysql_num_rows($qr_result)
        );
    } else {
        return array(
            "html"=>"<i class=\"icon-bag\"></i>В корзину",
            "class" => "btn btn-outline-warning btn-sm",
            "add" => 0
        );
    }
}

function category($id)
{
    //получение  id категории для рабты
    return $id;
}
//отработка   картинки  с обрезания
function img2()
{
    /*$pieces = explode(" ", $name);
    foreach ($pieces as $key => $val) {
    if ($val != 'Распродажа' and $val != '40%' and $val != '0,5л' and $val != 'Водка' and $val != 'ориг.40% 0,1л ') {
    $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="' . $val . '"');
    $data = json_decode($postData, true);
    foreach ($data as $value) {
    if ($value['count'] > 0) {
    foreach ($value['items'] as $v) {
    if ($v['photo_604'] != '') {
    return str_replace('\/', '/', $v['photo_604']);
    } elseif ($v['photo_1280'] != '') {
    return str_replace('\/', '/', $v['photo_1280']);
    } elseif ($v['photo_807'] != '') {
    return str_replace('\/', '/', $v['photo_807']);
    } elseif ($v['photo_2560'] != '') {
    return str_replace('\/', '/', $v['photo_2560']);
    }



    //    return $_SESSION['errors'].=$val["photo_1280"].'--'.$value;
    }
    };
    }
    }

    }*/
    $name = 'http://aidaset.ru/wp-content/themes/Aida%20Template%20Mark%201/images/vacancyAida.png';
    return $name;
}

//работа с ценой 2
function price2($id, $type)
{
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `uid` ='" . $id . "' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) > 0) {
        while ($sql = mysql_fetch_array($qr_result)) {
            return $sql['price'] / 10;
        }
        ;
    } else {
        return '404';
    }
}

//работа с категорией
function categori_uid($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='" . $id . "'") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        return $data['uid'];
    }
}

/**
 * работа в  категории
 */

//https://themehunt.com/html-templates/ecommerce
//http://themesground.com/hexino/demo-page/1.htm
//новая кат
function data_cat($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='" . $id . "'") or die(mysql_error());
    $i   = 1;
    $row = '';
    while ($data = mysql_fetch_array($qr_result)) {
        if ($i == mysql_num_rows($qr_result)) {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
}';
            $i++;
        } else {
            $row .= '{
"id":' . $data['id'] . ',
"name":"' . str_replace('"', '11', $data['name']) . '",
"uid":"' . $data['uid'] . '",
"categori":"' . $data['categori'] . '",
"img":"' . img($data['name']) . '",
"price":"' . price($data['uid']) . '",
"tipe":"' . $data['quantity'] . '"
},';
            $i++;
        }
    }
    ;
    //return mysql_fetch_array($qr_result);
    return $row;
}

function titel($id){
    if(isset($_GET['id'])){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='" . $id . "'") or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
            return $data['name'];
        }
    }else{
        return "Категория";
    }
}

// новый возврат товаров для работы с  параметрами вхождения
// штрих код  артикул название  атритубы потом
// категория  название категории код категории

function data_category($id){
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` where `categori`='$id'") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] = array(
            "id" => $data['id'],
            "name" => $data['name'],
            "price" => $data['id'],
            "uid" => $data['uid'],
            "categori" => category($data['categori']),
            "price" => price2($data['uid'], $_COOKIE['main-shop']),
            "img" => img2(),
            //"tipe" => $data[ 'quantity' ]
            //работа с типом товара для поиска его массива
            "status" => status($data['id']),
            "event" => event_prod($data['uid'])
        );
    };
    //return mysql_fetch_array($qr_result);
    return $mass;
}
function data_prod($id){
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` where `id`='$id'") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] = array(
            "id" => $data['id'],
            "name" => $data['name'],
            "price" => $data['id'],
            "code" => $data['code'],
            "categori_name" => category_name($data['categori']),
            "uid" => $data['uid'],
            "categori_id" => category($data['categori']),

            "about" => $data['about'],
            "price" => price2($data['uid'], $_COOKIE['main-shop']),
            "img" => img2(),
            //"tipe" => $data[ 'quantity' ]
            //работа с типом товара для поиска его массива
            "status" => status($data['id']),
            //    "brend"=>brend($data['_silver']),
            "event" => event_prod($data['uid'])

        );
    };
    //return mysql_fetch_array($qr_result);
    return $mass;
}
function category_name($id){
    if(isset($id)){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `uid`='" . $id . "'") or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
            return $data['name'];
        }
    }else{
        return "Категория-отсутствует";
    }
}
function data_in(){
    if(isset($_GET['id'])){
     return   json_encode(data_category(categori_uid($_GET['id'])));
    }elseif (isset($_GET['profile'])){
     return   json_encode(data_prod($_GET['profile']));
    }else{
      //  data_out();
        return json_encode( all2() );
    }
}
function col_category(){
    if(isset($_GET['id'])){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` where `categori`='" . categori_uid($_GET['id']). "'") or die(mysql_error());
        //$qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='" . categori_uid($_GET['id']) . "'") or die(mysql_error());
        return mysql_num_rows($qr_result);
    }else{
        return 50;
    }
}
function PostMasss(){
    $text='';
    foreach ($_GET as $key=>$value){


        $text.=$text.'/'.$key.'-'.$value;

    };
}

//наладить работу функций для вхождения данных
?>


{
    "token":"<?=$_COOKIE['PHPSESSID']?>",
    "titel":"<?= titel($_GET['id']) ?>",
    "filter":[],
    "action":[],
    "data":<?= data_in(); ?>,
    "cat":"<?if (isset($_POST['id'])) {    echo categori_uid($_POST['id']);} else {    echo 'else';};?>",
    "code":<?=col_category()?>,
    "keys":1<? ?>,
    "mass":"<?=PostMasss()?>"

}

