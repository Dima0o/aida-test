<?php
mb_internal_encoding("UTF-8");
//Данные к БД
$db_name = 'k99969kp_1c';
$db_user = 'k99969kp_1c';
$db_pass = '123456';
$db_loc = 'localhost';
//Подключение к БД
$db = mysql_connect($db_loc,$db_user,$db_pass);
mysql_query ("set character_set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_bin'");
#if (!$db){echo "Нет соединения<br>";}else{echo "Соединение есть<br>";}


//выбранная категория
function prod_cat()

{
    $date = new DateTime();
    $date->modify('-1 day');
    $data1= $date->format('Y-m-d'). ' 04:06:55';
    $date = new DateTime();
    $data2=$date->format('Y-m-d'). ' 23:59:55';;
    $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1c`  WHERE `date`>= '$data1' AND `date` <='$data2'") or die(mysql_error());
    //img($data['name']);
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] =$data['name'];

    };
    return array_unique($mass);
}
function doc($id){
    return $id;
}
function kassa($id){

    if($id==1){
        return count(prod_cat());
    }
    elseif ($id==2){
        return count(All1());
    }
    //return $id;

}
//кто не работал вчера

function All(){

    $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1call`") or die(mysql_error());
    //img($data['name']);
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] =$data['name'];

    };
    //return ;

    foreach (array_diff_ukey($mass, prod_cat(), 'key_compare_func')as $value){
        $mass=$mass.$value.' ';
    };
    return $mass;
   // prod_cat();
}
function All1(){

    $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1call`") or die(mysql_error());
    //img($data['name']);
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] =$data['name'];

    };
    return   $mass;

  /*  foreach (array_diff_ukey($mass, prod_cat(), 'key_compare_func')as $value){
        $mass=$mass.$value.' ';
    };
    return $mass;
    // prod_cat();*/
}
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}


//проверка в корзине
?>


{
    "doc_in":<?=doc(1)?>,
    "doc_out":<?=doc(2)?>,
    "kassa_in":<?=kassa(1)?>,
    "kassa_out":<?=kassa(2)?>,
    "text":<?=json_encode(All());?>,
    "all":<?=json_encode(prod_cat());?>
}
