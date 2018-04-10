
<?php
header("Content-type: text/html; charset=windows-1251");
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
if($search == ''){
    exit("Начните вводить запрос");
}
$db = mysql_connect("localhost","k99969kp_1c","123456");
mysql_select_db("k99969kp_1c",$db);
mysql_query("SET NAMES cp1251");

$query = mysql_query("SELECT * FROM`prod` WHERE name LIKE '%{$search}%' LIMIT 10)",$db);
//$query = mysql_query("SELECT * FROM prod WHERE Name LIKE '%{$search}%' LIMIT 10)",$db);
if(mysql_num_rows($query) > 0){
    $sql = mysql_fetch_array($query);
    do{
        echo "<div>".$sql['text']."</div>";
    }while($sql = mysql_fetch_array($query));
}else{
    echo "Нет результатов";
}
?>
