<?php
#Подключение к БД и начало сессии
include("config.php");
session_start();
# Проверка существования SESSION
if(isset($_SESSION["auth"])){
    #Переменные сессии
    $global_id = $_SESSION["auth"];
    $global_pr = $_SESSION["prava"];
    $pr = $_SESSION['prava'];
    #Запрос данных пользователя
    $sql = mysql_query("SELECT * FROM `$db_name`.`trans_users` WHERE id = '$global_id'");
    $row = mysql_num_rows($sql);
    if($row == 1){$global_mass = mysql_fetch_array($sql);}
    # Проверка есть ли mod
    if(isset($_GET["mod"])){
        $mod = $_GET["mod"];
        $sub = $_GET["sub"];
        #Если существует папка MOD
        if(file_exists("app/$mod")){
            #Если переменная SUB
            if(isset($_GET["sub"])){
                #Если файл SUB существует
                if(file_exists("app/$mod/page/$sub.php")){
                    include ("app/$mod/page/$sub.php");
                }else{
                    #Если файла SUB нет
                    include ("app/$mod/page/home.php");
                }
            }else{
                #Если переменной SUB нет
                include ("app/$mod/page/home.php");
            }
        }else{
            #Если папки папки с модом нет
            include ("app/task/page/home.php");
        }
    }else{
        include ("app/task/page/home.php");
    }
    #Если SESSION отсутствует
}else{
    header("Location: app/login/login.php");
    exit();
}
?>