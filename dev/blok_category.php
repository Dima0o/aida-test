<?php


session_start();
include_once('core.php');
header("Content-type: text/html; charset=windows-1251");
$search = $_POST['search'];
$search = addslashes($search);
$search = htmlspecialchars($search);
$search = stripslashes($search);
$qr_result = mysql_query("select * from `k99969kp_1c`.`categori` id =".$_GET['id']) or die(mysql_error());
?>
[
    {
        "titel": "5ad5c20c7a2171495479b4bf",
        "data":[



<?php

if( mysql_num_rows($qr_result)>0){
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
echo $row;}
else{?>
    {
        "id":"0",
        "name":"Категория Пустая"
    }
<?}?>
    ]}
]
