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
{       if(isset($id)){
            $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `categori`=" . $id) or die(mysql_error());
            return mysql_num_rows($qr_result);
        }else{
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
    if(isset($id)){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='" . $id . "'") or die(mysql_error());
            while ($data = mysql_fetch_array($qr_result)) {
                return $data['uid'];
            }
    }else{
        return '1';
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
                    }
                };
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
    if (isset($_POST['id']) or prod_col($_POST['id']) > 0 or $_POST['id']!=null ) {
        return json_encode(all2());
    } else {
        return  json_encode(data_cat(categori_uid($_POST['id'])));
    }
}
//работа с полечение  даных
function all2()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`") or die(mysql_error());

    while ($data = mysql_fetch_array($qr_result)) {
        $mass[]=array("id"=>$data['id'],"name"=>$data['name'],"price"=>$data['id'],"uid"=>$data['uid'],"categori"=>category($data['categori']),"price"=>price2($data['uid'],$_COOKIE['main-shop']),"img"=>img($data['name']),"tipe"=>$data['quantity']);
    };
    //return mysql_fetch_array($qr_result);
    return $mass;
}
//выбранная категория
function prod_cat($id)
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`") or die(mysql_error());

    while ($data = mysql_fetch_array($qr_result)) {
        $mass[]=array("id"=>$data['id'],"name"=>$data['name'],"price"=>$data['id'],"uid"=>$data['uid'],"categori"=>category($data['categori']),"price"=>price2($data['uid'],$_COOKIE['main-shop']),"img"=>img($data['name']),"tipe"=>$data['quantity']);
    };
    //return mysql_fetch_array($qr_result);
    return $mass;
}
function category($id){
    //получение  id категории для рабты
    return $id;
}
//отработка   картинки  с обрезания
function igm2(){
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
    $name='http://aidaset.ru/wp-content/themes/Aida%20Template%20Mark%201/images/vacancyAida.png';
    return $name;
}

//работа с ценой 2
function price2($id,$type)
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

//работа с категорией
function categori_uid($id){
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='".$id."'") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        return $data['uid'];
    }
}

/**
 * работа в  категории
 */
function data_cat($id){
    $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='".$id."'") or die(mysql_error());
    $i = 1;
    $row='';
    while ($data = mysql_fetch_array($qr_result)) {
        if ($i == mysql_num_rows($qr_result)) {
            $row.='{
                         "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "img":"'.img($data['name']).'",
                        "price":"'.price($data['uid']).'",
                         "tipe":"'.$data['quantity'].'"
                         }';
            $i++;
        } else {
            $row.='{
                        "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "img":"'.img($data['name']).'",
                       "price":"'.price($data['uid']).'",
                         "tipe":"'.$data['quantity'].'"
                         },';
            $i++;
        }
    };
    //return mysql_fetch_array($qr_result);
    return $row;
}
    ?>
{
"titel":"<?= $_POST['sort'] ?>",
"col":"<?=prod_col($_POST['id'])?>",
"data":<?=data_out();?>, "cat":"<? if (isset($_POST['id'])) {
    echo categori_uid($_POST['id']);
} else {
    echo 'else';
}; ?>"}