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

$name='Распродажа Водка Кизлярка Виноградная ориг.40% 0,1л (Кизляр.кон.з-д)';
$pieces = explode(" ", $name);

foreach ($pieces as $key=>$val){
    $postData = file_get_contents('https://api.vk.com/method/photos.search?&v=5.52&q="'+$val.'"');
    echo $val.'<br>';
    $data = json_decode($postData, true);
    foreach ($data as $value){
        echo $value['count'];
        if($value['count']>0){
            foreach ($value['items'] as $v){
                echo str_replace('\/', '/', $v["photo_1280"]);
            }
        };
    }
}