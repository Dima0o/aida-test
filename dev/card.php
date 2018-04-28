<?
$y2k = mktime(0,0,0,1,1,2000);
setcookie('name', 'bret', $y2k);
foreach($_COOKIE as $key=>$value){
    echo $key .' - '.$value .'<br>';
}
?>