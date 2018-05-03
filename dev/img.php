<?php
/*
$postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q=vodka');
$data = json_decode($postData, true);
echo $data['count'];
foreach ($data as $value){
    echo $value['count'];
    foreach ($value['items'] as $val){
     echo '<h1>'. str_replace('\/', '/', $val["photo_1280"]).'</h1>';
       // return str_replace('\/', '/', $val["photo_1280"]);
        echo $value;
    }
}
if (array_key_exists('photo_1280', $data)) {
    echo "Массив содержит элемент 'first'.";
}
//var_dump($data);
echo '<br>';
//count($data);
*/

$name='Водка Кизлярка Виноградная';
$pieces = explode(" ", $name);
echo 'q';

function img($val){
    //$pieces = explode(" ", $name);
echo $val;
    //foreach ($pieces as $key=>$val){
        if( $val!='Распродажа'  and  $val!= 'Водка' and $val!='ориг.40% 0,1л'){
            $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="'.$val.'"');
            $data = json_decode($postData, true);
        ///    var_dump($data);
            foreach ($data as $value){
                echo $value['count'];
                if($value['count']>0){
                    foreach ($value['items'] as $v){
                        echo '</pre>';
                        var_dump($v);
                        echo '</pre>';
                        //echo str_replace('\/', '/', $v["photo_1280"]);
                        //    return $_SESSION['errors'].=$val["photo_1280"].'--'.$value;
                    }
                };
            }
        }

    //}
}
foreach ($pieces as $key=>$val){
    if( $val!='Распродажа'  and  $val!= 'Водка' and $val!='ориг.40% 0,1л '){
        /*$postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="'.$val.'"');
        echo $val.'<br>';
        $data = json_decode($postData, true);
        echo $data;
        foreach ($data as $value){
           // echo $value['count'];
            if($value['count']>0){
                foreach ($value['items'] as $v){
                    echo             ' <p><img src="'.str_replace('\/', '/', $v["photo_1280"]).'" width="450" height="450" alt=""></p><br>';
                }
            };

        }*/
      //  echo '<p>'. img($val).'</p><br>';
    }
}

for($i=0;$i<10;$i++){
    $arr[]=rand(-25,25);
}
foreach ($arr as $value){
    if ($value < 0)
    {
        $new_arr[]=$value;
    }
}
echo "sum(a) = " . array_sum($new_arr) . "\n";
echo rand(-25,25);