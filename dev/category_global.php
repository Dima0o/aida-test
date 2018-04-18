[<?php

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
$i=1;
while ($data = mysql_fetch_array($qr_result)) {
    $status='';



    if ($i == mysql_num_rows($qr_result)) {
        $row.='"'.str_replace('"', '`', $data['name']).'"';

        $i++;
    } else {

        $row.= $row.='"'.str_replace('"', '`', $data['name']).'",';
        $i++;
    }

};
echo $row;
?>
]

