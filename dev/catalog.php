<?
session_start();
include_once('core.php');
class Prod
{
    //public static $row='';
    function all()
    {
        mb_internal_encoding("UTF-8");
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` LIMIT 0, 50") or die(mysql_error());
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
        return $row;
    }
    function id_cat($id)
    {
        mb_internal_encoding("UTF-8");
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `prod`.`categori`='".$id."'") or die(mysql_error());
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
        return $row;
    }

}

function id_categ($id){
    //
    $qr_result = mysql_query("select * from `k99969kp_1c`.`categori` where `id`=$id") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result))
    {
        return $data['uid'];
    };
}

$Prod = new Prod;
?>

{
"titel":"Каталог товаров",
"url":"#",
"date":<?=json_encode(var_dump($_GET))?>,
"data":[<?

if (isset($_GET['id'])==false) {
    echo $Prod->categori_id();
}else {
    echo $Prod->all();} ?>]
}