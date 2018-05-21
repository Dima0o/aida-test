
<?php
session_start();
include_once ('core.php');

mb_internal_encoding("UTF-8");

function global_categori()
{
    $qr_result = mysql_query("select * from `k99969kp_1c`.`blog` WHERE `status`!= 0   ORDER BY `blog`.`data` ASC ") or die(mysql_error());
    while ($data = mysql_fetch_array($qr_result))
    {
        $mass[] = array(
            "id" => $data['id'],
            "name" => $data['name'],
            "text" => $data['text'],
            "autor" => $data['autor'],
            "img" => $data['img'],
            "data" => $data['data']
        );
    };

    // return mysql_fetch_array($qr_result);

    return $mass;
}

echo '[{"item":' . json_encode(global_categori()) . '}]'; //var_dump(global_categori());

?>

