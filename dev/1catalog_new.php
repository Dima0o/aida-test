<?
session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");
foreach ($_GET as $key=>$value){
    $_SESSION[$key]=$value;
};
class Prod
{
    //public static $row='';
    function all()
    {
       
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 10") or die(mysql_error());
        $i = 1;
        $row='';
         while ($data = mysql_fetch_array($qr_result)) {
             if ($i == mysql_num_rows($qr_result)) {
                 $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['prod'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         }';
                 $i++;
             } else {
                 $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['prod'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         },';
                 $i++;
             }
         };
        //return mysql_fetch_array($qr_result);
        return $row;
    }
    function categori_id($id)
    {
       
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `prod`.`prod`='".$id."'LIMIT 0, 10") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {
             if ($i == mysql_num_rows($qr_result)) {
                 $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['prod'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         }';
                 $i++;
             } else {
                 $row.='{
                         "name":"'.str_replace('"', '11', $data['name']).'",
                         "uid":"'.$data['uid'].'",
                         "categori":"'.$data['prod'].'",
                         "price":"'.rand(0,222122).'",
                         "tipe":"'.rand(0,2).'"
                         },';
                 $i++;
             }
         };
       // return mysql_fetch_array($qr_result);
        return $row;
    }
    function categori_col($id)
    {
       
        ////////mb_internal_encoding("UTF-8");
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `prod`.`prod`= '".$id."' LIMIT 0, 10") or die(mysql_error());
        return mysql_fetch_array($qr_result);
    }
    public function catalog_id($id,$type){
       
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` WHERE `categori`.`id`=".$id) or die(mysql_error());
        $i = 1;
        $row='';
        if (0< mysql_num_rows($qr_result) and $type=='col') {
            while ($data = mysql_fetch_array($qr_result)) {
                return $data['uid'];
            }
        }elseif (0< mysql_num_rows($qr_result) and$type=='name'){
            while ($data = mysql_fetch_array($qr_result)) {
                return $data['name'];
            }
        }
        {
            return  'eror';
        }
    }

}
$Prod = new Prod;
?>{
    "titel":"<?=$Prod->catalog_id($_SESSION['id'],'name');?>",
    "url":"<?=$_SESSION['id']?>",
    "data":[<?

foreach ($_SESSION as $key=>$value){
    if($Prod->categori_col($Prod->catalog_id($value))>0){

        echo $Prod->categori_col($Prod->catalog_id($value,'col'));
        //  echo $Prod->all();
    } else {
        echo $Prod->all();}

}?>
]}