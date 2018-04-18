<?php

session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");
$qr_result = mysql_query("select * from `k99969kp_1c`.`categori` LIMIT 0, 5") or die(mysql_error());
class Prod
{
function catalog_id(){

        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `categori`.`id`=".$_GET['id']) or die(mysql_error());
            while ($data = mysql_fetch_array($qr_result)) {
                return $data['name'];
            }

}
}
$Prod = new Prod;
?>
{
"titel":"<?=$Prod->catalog_id();?>",
"data":[
<?php
$i=1;
while ($data = mysql_fetch_array($qr_result)) {
    $status='';
    if($data['id']==$_GET['id']){
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
?>
]}

