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
//adadaS   # if (!$db){echo "Нет соединения<br>";}else{echo "Соединение есть<br>";}
?>

