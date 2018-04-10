<?

session_start();
include_once('core.php');


class Cat
{
    //public static $row='';
    function all()
    {
        mb_internal_encoding("UTF-8");
        $qr_result = mysql_query("select * from `k99969kp_1c`.`categori`") or die(mysql_error());
        $i = 1;
        $row='';
        while ($data = mysql_fetch_array($qr_result)) {

            if ($i == mysql_num_rows($qr_result)) {
                $row.='{
                        "id":"'.$data['id'].'",
                        "name":"'.str_replace('"', '11', $data['name']).'",
                        "uid":"'.$data['uid'].'"                              
                        }';

                $i++;
            } else {

                $row.='{
                        "id":"'.$data['id'].'",
                        "name":"'.str_replace('"', '11', $data['name']).'",
                        "uid":"'.$data['uid'].'"                
                        },';
                $i++;
            }

        };
        return $row;

        /*foreach($mass  as $key=>$value){
            // $bodytag = str_ireplace("%body%", "black", "<body text=%BODY%>");


        }*/


    }

    function categori_id()
    {
        return 1;
    }
}

$Cat = new Cat;
?>[<?= $Cat->all() ?>]


