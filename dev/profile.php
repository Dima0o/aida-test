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
                        "name":"'.str_replace('"', '`', $data['name']).'",
                        "uid":"'.$data['uid'].'",
                        "categori":"'.$data['prod'].'",
                        "price":"'.rand(0,222122).'",
                        "tipe":"'.rand(0,2).'"                
                        }';

                $i++;
            } else {

                $row.='{
                        "name":"'.str_replace('"', '`', $data['name']).'",
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

    function categori_id()
    {
        mb_internal_encoding("UTF-8");
        $qr_result = mysql_query("select * from `k99969kp_1c`.`prod` WHERE `prod`.`prod`=".$_GET['id']."LIMIT 0, 50") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {

            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                        "name":"'.str_replace('"', '`', $data['name']).'",
                        "uid":"'.$data['uid'].'",
                        "categori":"'.$data['prod'].'",
                        "price":"'.rand(0,222122).'",
                        "tipe":"'.rand(0,2).'"                
                        }';

                $i++;
            } else {

                $row.='{
                        "name":"'.str_replace('"', '`', $data['name']).'",
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

$Prod = new Prod;
?>

{
"titel":"Каталог товаров",
"url":"#",
"data":[<?
if (isset($_GET['id'])) {
    //echo 'adasdad';
    echo $Prod->categori_id();

}else {
    echo $Prod->all();} ?>]
}



