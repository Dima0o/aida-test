<?php

session_start();
include_once('core.php');
mb_internal_encoding("UTF-8");
$qr_result = mysql_query("select * from `k99969kp_1c`.`categori` LIMIT 0, 5") or die(mysql_error());
?>
[
<?php
$i=1;
while ($data = mysql_fetch_array($qr_result)) {

    if ($i == mysql_num_rows($qr_result)) {
        $row.='{
                    "id":"'.$data['id'].'",
                    "name":"'.str_replace('"', '`', $data['name']).'"
                   
               }';

        $i++;
    } else {

        $row.='{       
                "id":"'.$data['id'].'",
                "name":"'.str_replace('"', '`', $data['name']).'"
                                    
            },';
        $i++;
    }

};
echo $row;
?>
]
