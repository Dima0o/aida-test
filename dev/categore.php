<?php

session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");

class Prod
{
    public  $status='';
    public $row='';
    function catalog_id(){

        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `categori`.`id`=".$_GET['id']) or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
            return $data['name'];
        }

    }
    function prod_col($id){
       $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `categori`=".$id) or die(mysql_error());
        return  mysql_num_rows($qr_result);
    }
    function Prod_data($id){
        $i=1;
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` LIMIT 0, 5") or die(mysql_error());
        while ($data = mysql_fetch_array($qr_result)) {
             $row='';
            if($data['id']==$id){
                $status='"status": "color: #ef7f1b;",';
            }else{
                $status='"status": "",';
            }


            if ($i == mysql_num_rows($qr_result)) {
                $row.='{"id":"'.$data['id'].'",'.$status.' "name":"'.str_replace('"', '`', $data['name']).'"}';

                $i++;
            } else {

                $row.='{"id":"'.$data['id'].'",'.$status.'  "name":"'.str_replace('"', '`', $data['name']).'"},';
                $i++;
            }

        };
return $row;
    }
    function all(){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {
            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                         "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "img":"'.img($data['categori']).'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         }';
                $i++;
            } else {
                $row.='{
                        "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "price":"'.rand(0,222122).'",
                         "img":"'.img($data['name']).'",
                         "tipe":"'.rand(0,2).'"
                         },';
                $i++;
            }
        };
        //return mysql_fetch_array($qr_result);
        return $row;
    } function data($id){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod`  WHERE `categori`='".$id."'") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {
            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                         "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "img":"'.img($data['name']).'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         }';
                $i++;
            } else {
                $row.='{
                        "id":'.$data['id'].',
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "img":"'.img($data['name']).'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         },';
                $i++;
            }
        };
        //return mysql_fetch_array($qr_result);
        return $row;
    }
    function categori_uid($id){
     $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`='".$id."'") or die(mysql_error());
            while ($data = mysql_fetch_array($qr_result)) {
                return $data['uid'];
            }
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
$Prod = new Prod;
?>

{
"col":"<? if (isset($_POST['id'])) {    echo  $Prod->prod_col($_POST['id']);} else {    echo 58;}; ?>",
"data":[<? if (isset($_POST['id']) and $Prod->prod_col($_POST['id'])>0) {
    echo  $Prod->data($Prod->categori_uid($_POST['id']));
} else {
   echo $Prod->all();
}; ?>],"cat":"<? if (isset($_POST['id'])){echo $Prod->categori_uid($_POST['id']);}else{echo 'else';};?>"}

