<?php
session_start();
include_once('core.php');

class Prod
{
    public  $error;
   public function prod($type)
    {
        $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`prod` WHERE `id` =".$_POST["id"]);
        if (mysql_num_rows($qr_result) > 0) {

            while($sql = mysql_fetch_array($qr_result)){
              return  $sql[$type];
            };
        }else{
            return  '404';
        }
    }

    function price($id)
    {
        $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`price` WHERE `uid` ='".$id."' ORDER BY `price`.`data` DESC LIMIT 0, 1");
        if (mysql_num_rows($qr_result) > 0) {

            while($sql = mysql_fetch_array($qr_result)){
                return  $sql['price'];
            };
        }else{
            return  '404';
        }
    }

    function category($id)
    {
        $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`categori` WHERE `uid` ='".$id."'");
        if (mysql_num_rows($qr_result) > 0) {

            while($sql = mysql_fetch_array($qr_result)){
                return   '{"id":"../catalog.php?id='.$sql['id'].'","name":"'.$sql['name'].'" }'; //$sql['id'];
            };
        }else{
            return  '{"id":404,"name":"Ошибка" }'; //$sql['id'];
        }
    }

    function properties($id)
    {
        return  '{"id":404,"name":"Ошибка" }';
    }
    function col($id){

        $qr_result = mysql_query("SELECT * FROM `k99969kp_1c`.`kol` WHERE `uid` ='".$id."' ORDER BY `kol`.`data` DESC LIMIT 0, 1");
        if (mysql_num_rows($qr_result) > 0) {
                while($sql = mysql_fetch_array($qr_result)){
                    return   '{"id":".#","data":"'.$sql['data'].'","col":"'.$sql['kol'].'" }'; //$sql['id'];
            };
        }else{
               return  '{"id":404,"name":"В наличии более 100 " }';
        }
   }
   function img($name){
       $pieces = explode(" ", $name);

       foreach ($pieces as $key=>$val){
            if( $val!='Распродажа'  and $val!='40%' and $val!='0,5л'   and  $val!= 'Водка' and $val!='ориг.40% 0,1л '){
               $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="'.$val.'"');
               $data = json_decode($postData, true);
               foreach ($data as $value){
                  // return $value['count'];
                     if($value['count']>0){
                         foreach ($value['items'] as $v){
                             if( $v['photo_604']!='' ) {
                                 return str_replace('\/', '/', $v['photo_604']);
                             }elseif ($v['photo_1280']!=''){
                                 return str_replace('\/', '/', $v['photo_1280']);
                             }elseif ($v['photo_807']!=''){
                                 return str_replace('\/', '/', $v['photo_807']);
                             }elseif ($v['photo_2560']!=''){
                                 return str_replace('\/', '/', $v['photo_2560']);
                             }

                             /*else{
                                 return str_replace('\/', '/', $v['photo_75']);
                             }*/

                        //    return $_SESSION['errors'].=$val["photo_1280"].'--'.$value;
                         }
                     };
               }
            }

       }



   }
}

$Prod = new Prod;
?>
[{
"error":"<?= $Prod->prod('error') ?>",
"id": "<?= $Prod->prod('id') ?>",
"name":"<?= $Prod->prod('name') ?>",
"categori":"<?= $Prod->prod('categori') ?>",
"col":[<?= $Prod->col($Prod->prod('uid')) ?>],
"price":"<?= $Prod->price($Prod->prod('uid')) ?>",
"category": [<?= $Prod->category($Prod->prod('categori')) ?>],
"body": "<?= $Prod->prod('name') ?>",
"properties":[<?= $Prod->prod($Prod->prod('uid')) ?>],
"img":"<?=$Prod->img($Prod->prod('name'))?>",
"var_test":"<?=$_SESSION['errors']?>"}]

<?// работа с поиском изображения ?>
