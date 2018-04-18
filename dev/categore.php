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
            //$status='';
            if($data['id']==$id){
                $status='"status": "color: #ef7f1b;",';
            }else{
                $status='"status": "",';
            }


            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                    "id":"'.$data['id'].'",
                     '.$status.'
                    
                    "name":"'.str_replace('"', '`', $data['name']).'"
                   
               }';

                $i++;
            } else {

                $row.='{       
                "id":"'.$data['id'].'",
                '.$status.'
                "name":"'.str_replace('"', '`', $data['name']).'"
                                    
            },';
                $i++;
            }

        };
echo $row;

    }
    function all(){
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {
            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         }';
                $i++;
            } else {
                $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['categori'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         },';
                $i++;
            }
        };
        //return mysql_fetch_array($qr_result);
        return $row;
    }
}
$Prod = new Prod;
?>

{
"col":"<?=$Prod->prod_col($_GET['id']);?>",

"data":[<?=$Prod->all();?>]}

