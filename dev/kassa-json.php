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
    $mass='';
    $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1c` WHERE DATE >= DATE(NOW( ) - INTERVAL 1 DAY) AND DATE <= NOW( ) - INTERVAL 1 DAY") or die(mysql_error());
    //img($data['name']);
   /* while ($data = mysql_fetch_array($qr_result)) {
        $mass=$mass.$data['name'].' ';

    };

    */
    //return mysql_fetch_array($qr_result);

   // return $mass;


    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] =             $data['name'];

    };
    //return mysql_fetch_array($qr_result);

    foreach (array_unique($mass)as $value){
        $mass=$mass.$value.' ';
    };
    return $mass;
}
//проверка в корзине


//echo json_encode(prod_cat());

printf('{
"token":"%s"}
',prod_cat());
//echo  mb_substr(json_encode(prod_cat()), 1, -1);

/*
{
"token":"<?=$_COOKIE['PHPSESSID']?>",
"titel":"Кассы которые работали",
"filter":[],
"action":[],
"data":<?=json_encode(prod_cat()); ?>
},
{
"token":"<?=$_COOKIE['PHPSESSID']?>",
"titel":"Кассы которые работали",
"filter":[],
"action":[],
"data":<?=json_encode(prod_cat()); ?>
},{
"token":"<?=$_COOKIE['PHPSESSID']?>",
"titel":"Кассы которые работали",
"filter":[],
"action":[],
"data":<?=json_encode(prod_cat()); ?>
},{
"token":"<?=$_COOKIE['PHPSESSID']?>",
"titel":"Кассы которые работали",
"filter":[],
"action":[],
"data":<?=json_encode(prod_cat()); ?>
},{
"token":"<?=$_COOKIE['PHPSESSID']?>",
"titel":"Кассы которые работали",
"filter":[],
"action":[],
"data":<?=json_encode(prod_cat()); ?>
}


*/
 /*for ($i = 1; $i <= 10; $i++) {
    echo '<br>$name['.$i.']' ;
 }*/
