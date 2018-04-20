<?php


session_start();
include_once('core.php');
header("Content-type: text/html; charset=windows-1251");
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search=$query = stripslashes($search);
if($search == ''){
    exit("");
}
$qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`prod` WHERE  `name` LIKE '%$query%' OR `id` LIKE '%$query%' LIMIT 0, 10");
if(mysql_num_rows($qr_result) > 0){
    $sql = mysql_fetch_array($qr_result);
    do{?><a href="#" class="list-group-item"><?=$sql['name']?></a><?
    }while($sql = mysql_fetch_array($qr_result));
}else{
   # echo "Нет результатов--".$_POST['search'].'--'.$search;
}

?>