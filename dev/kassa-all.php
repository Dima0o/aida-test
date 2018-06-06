<?php
require '../rb-mysql.php';
R::setup('mysql:host=localhost;dbname=k99969kp_1c', 'k99969kp_1c', '123456');
// работа с товарами
// обоработка добавление товаров
/*if (isset($_GET['name'])) {
$cat = R::dispense('prod');
$cat->name = $_GET['name'];
$cat->categori = $_GET['categori'];
$cat->description = $_GET['name'];
$cat->uid = $_GET['uid'];
//$cat->quantity = $_GET['quantity'];
//$cat->price = $_GET['price'];
R::store( $cat );
echo 'Успешно Добавлен товар' . $_GET['name']. $_GET['price'].$_GET['uid'];
} else {
echo "Не порядочек";
}*/
//require ('../prode-date.php');
$i=0;

if (isset($_GET['name'])) {

$cat = R::dispense('kassa1call');
foreach ($_GET as $key=>$value){
$cat->$key=$value;
};
$cat->date=date("Y-m-d  H:m:s");
R::store( $cat );


/*$cat = R::dispense('prod');
$cat->name = $_GET['name'];
$cat->uid = $_GET['uid'];
$cat->price = $_GET['price'];
$cat->display = $_GET['display'];
$cat->quantity = $_GET['quantity'];
// $cat->code = $_GET['categori'];
R::store( $cat );*/
echo 'Успешно Категория добавленна ' . $_GET['name'];


/*  mb_internal_encoding("UTF-8");
$_GET['all']=$_GET['name'];
$token = "459694012:AAF-Y2CEDs7IglOt2lSMDTE8Gwz5JOqfexc";
//$chat_id = "242350955";
//$token = "459694012:AAF-Y2CEDs7IglOt2lSMDTE8Gwz5JOqfexc";
$chat_id = "-1001383136294";
$mass_all = explode("/", $_GET['all']);
$titel=explode(",", $mass_all[0]);
$mass_all2=explode("@@", $mass_all[1]);
foreach ($mass_all2 as $value) {
$mass_al =explode("##", $value);
$key=0;
foreach ($mass_al as $value) {
$txt .= "<b>" .  $titel[$key] . "</b> " .$value . "%0A";
$key++;
};
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

if ($sendToTelegram) {
echo '<p class="success">Спасибо за отправку вашего сообщения!</p>';
return true;
} else {
echo '<p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p>';
};*/





} else {
echo "Не порядочек";
}
/*
foreach ($data as $value){
$cat = R::dispens