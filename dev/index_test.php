<?

    foreach ($_POST as $key=>$value){
     echo $key.'-//-'.$value.'</br>';
    };

?>
<?php echo json_encode(array("name"=>"John","time"=>"2pm")); ?>
