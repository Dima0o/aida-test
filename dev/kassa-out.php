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
   // $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1c` WHERE DATE >= DATE(NOW( ) - INTERVAL 1 DAY) AND DATE <= NOW( ) - INTERVAL 1 DAY") or die(mysql_error());
    //img($data['name']);
    $date = new DateTime();
    $date->modify('-1 day');
    $data1= $date->format('Y-m-d'). ' 04:06:55';
    $date = new DateTime();
    $data2=$date->format('Y-m-d'). ' 23:59:55';;

    $qr_result = mysql_query("select * from `k99969kp_1c`.`kassa1c`  WHERE `date`>= '$data1' AND `date` <='$data2'") or die(mysql_error());

    while ($data = mysql_fetch_array($qr_result)) {
        $mass[] =$data['name'];

    };
    //return mysql_fetch_array($qr_result);

    return array_unique($mass);
}
//проверка в корзине




//echo json_encode(prod_cat());

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    body{background:#f9f9f9;}
    #wrapper{padding:90px 15px;}
    .navbar-expand-lg .navbar-nav.side-nav{flex-direction: column;}
    .card{margin-bottom: 15px; border-radius:0; box-shadow: 0 3px 5px rgba(0,0,0,.1); }
    .header-top{box-shadow: 0 3px 5px rgba(0,0,0,.1)}
    .leftmenutrigger{display: none}
    @media(min-width:992px) {
        .leftmenutrigger{display: block;display: block;margin: 7px 20px 4px 0;cursor: pointer;}
        #wrapper{padding: 90px 15px 15px 15px; }
        .navbar-nav.side-nav.open {left:0;}
        .navbar-nav.side-nav{background: #585f66;box-shadow: 2px 1px 2px rgba(0,0,0,.1);position:fixed;top:56px;flex-direction: column!important;left:-220px;width:200px;overflow-y:auto;bottom:0;overflow-x:hidden;padding-bottom:40px}
    }
    .animate{-webkit-transition:all .3s ease-in-out;-moz-transition:all .3s ease-in-out;-o-transition:all .3s ease-in-out;-ms-transition:all .3s ease-in-out;transition:all .3s ease-in-out}
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div id="wrapper" class="animate">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Json app</h5>

                            <p class="card-text">
                                <pre>
                                    <?=var_dump(prod_cat());?>
                                </pre>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-6">

            <?
            foreach (prod_cat()as $item){

                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?=$item?></h5>
                            <span class="badge badge-primary">Primary</span>
                            <span class="badge badge-danger">Danger</span>
                            <span class="badge badge-warning">Warning</span>
                        </div>
                    </div>
                </div>
                <?
            }
            ?>



        </div>
        </div>


    </div>
</div>