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
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `categori`=" . $id) or die(mysql_error());
    return mysql_num_rows($qr_result);
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

    };
    return $row;
}

function all()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
    $i = 1;
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
    };
    //return mysql_fetch_array($qr_result);
    return $row;
}

function data($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='" . $id . "'" . $_POST['sort']) or die(mysql_error());
    $i = 1;
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
    };
    //return mysql_fetch_array($qr_result);
    return $row;
}

function categori_uid($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='" . $id . "'") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        return $data['uid'];
    }
}

function img($name)
{
    $pieces = explode(" ", $name);
    foreach ($pieces as $key => $val) {
        if ($val != 'Распродажа' and $val != '40%' and $val != '0,5л' and $val != 'Водка' and $val != 'ориг.40% 0,1л ') {
            $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="' . $val . '"');
            $data = json_decode($postData, true);
            foreach ($data as $value) {
                // return $value['count'];
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

                        /*else{
                            return str_replace('\/', '/', $v['photo_75']);
                        }*/

                        //    return $_SESSION['errors'].=$val["photo_1280"].'--'.$value;
                    }
                };
            }
        }

    }
}

$Prod = new Prod;
function price($id)
{
    $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `uid` ='" . $id . "' ORDER BY `price`.`data` DESC LIMIT 0, 1");
    if (mysql_num_rows($qr_result) > 0) {
        while ($sql = mysql_fetch_array($qr_result)) {
            return $sql['price'] / 10;
        };
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
    $i = 1;
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
    };
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
function data_out(){
//json_encode
    if (isset($_POST['id']) and prod_col($_POST['id']) > 0) {
        return data_all($_POST['id']);
    } else {
        return full_fledged(null);
    }
}
//работа с полечение  данных товаров
 function full_fledged($id){
    if($id!=Null){

    }else{
        all2();
    }
}

function all2()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
    $i = 1;
    $row = '';
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[]=array("id"=>$data['id'],"name"=>$data['name'],"price"=>$data['id'],"uid"=>$data['uid'],"categori"=>category($data['categori']),"price"=>price2($data['uid'],user_cook($_COOKIE['main-shop'])),"tipe"=>$data['quantity']);
    };
    //return mysql_fetch_array($qr_result);
    return $row;
}
function category($id){
    //получение  id категории для рабты
}
///подготовить парсинг товаров из перекрестка упор на фото для
/**
{id: 1, name: "Распродажа Водка Кизлярка Виноградная ориг.40% 0,1л (Кизляр.кон.з-д)",…}
categori
:
"269c8446d8a3440ea89caf02840178ce"
id
:
1
img
:
"https://pp.userapi.com/c840120/v840120113/90591/n0Yls9kdbWg.jpg"
name
:
"Распродажа Водка Кизлярка Виноградная ориг.40% 0,1л (Кизляр.кон.з-д)"
price
:
"100"
tipe
:
"1"
uid
:
"e0fd05d8d0ea436081a4d88f17dff9ca"*/
//отработка   картинки  с обрезания
function igm2($name){
    $pieces = explode(" ", $name);
    foreach ($pieces as $key => $val) {
        if ($val != 'Распродажа' and $val != '40%' and $val != '0,5л' and $val != 'Водка' and $val != 'ориг.40% 0,1л ') {
            $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="' . $val . '"');
            $data = json_decode($postData, true);
            foreach ($data as $value) {
                // return $value['count'];
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

                        /*else{
                            return str_replace('\/', '/', $v['photo_75']);
                        }*/

                        //    return $_SESSION['errors'].=$val["photo_1280"].'--'.$value;
                    }
                };
            }
        }

    }
}

    ?>
{
"titel":"<?= $_POST['sort'] ?>",
"col":"<?=prod_col($_POST['id'])?>",
"data":[<?= data_out() ?>], "cat":"<? if (isset($_POST['id'])) {
    echo categori_uid($_POST['id']);
} else {
    echo 'else';
}; ?>"}