<?
class Template{

  function hleb($url){
    $pieces = explode(" ", $url);
    foreach ($pieces as $value) {
      $value=explode(" ", $value);
    }
    return $value;
  }
  

}


?>
