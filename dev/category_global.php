<?php

session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");

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
$qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `rang` <> 'null' ORDER BY `rang` ASC") or die(mysql_error());
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
//echo $row;



function catalog_global()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `rang` <> 'null' ORDER BY `rang` ASC") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result)) {
        $mass[]=array("id"=>$data['id'],"name"=>$data['name']);
    };
//return mysql_fetch_array($qr_result);
    return $mass;
}
echo json_encode(catalog_global());




?>


