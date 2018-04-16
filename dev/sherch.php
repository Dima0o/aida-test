<?php


session_start();
include_once('core.php');
header("Content-type: text/html; charset=windows-1251");
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
if($search == ''){
    exit("Начните вводить запрос");
}
/*
$db = mysql_connect("localhost","k99969kp_1c","123456");
mysql_select_db("prod",$db);
mysql_query("SET NAMES cp1251");

$query = mysql_query("SELECT * FROM table WHERE MATCH(name) AGAINST('$search')",$db);
if(mysql_num_rows($query) > 0){
    $sql = mysql_fetch_array($query);
    do{
        echo "<div>".$sql['name']."</div>";
    }while($sql = mysql_fetch_array($query));
}else{
    echo "Нет результатов";
}

*/
//"SELECT * from `$db_name`.`files_user` WHERE text_name LIKE '%$slovo%' AND id_user = '$glid'");
$qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`prod` WHERE id = $search ");
if(mysql_num_rows($qr_result) > 0){
    $sql = mysql_fetch_array($qr_result);
    do{
        echo "<div>".$sql['name']."</div>";
    }while($sql = mysql_fetch_array($qr_result));
}else{
    echo "Нет результатов--".$_POST['search'].'--'.$search;
}

?>