<?php

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************

// Replace the accessKey string value with your valid access key.
$accessKey = '09b4692475694bcb907b5810a47bf8fd';

// Verify the endpoint URI.  At this writing, only one endpoint is used for Bing
// search APIs.  In the future, regional endpoints may be available.  If you
// encounter unexpected authorization errors, double-check this value against
// the endpoint for your Bing Search instance in your Azure dashboard.
$endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';

$term = 'ss solder';

function BingImageSearch ($url, $key, $query) {
    // Prepare HTTP request
    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
    // http://php.net/manual/en/function.stream-context-create.php
    $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
    $options = array ( 'http' => array (
        'header' => $headers,
        'method' => 'GET' ));
    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);
    $result = file_get_contents($url . "?q=" . urlencode($query), false, $context);
    // Extract Bing HTTP headers
    $headers = array();
    foreach ($http_response_header as $k => $v) {
        $h = explode(":", $v, 2);
        if (isset($h[1]))
            if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                $headers[trim($h[0])] = trim($h[1]);
    }
    return array($headers, $result);
}
if (strlen($accessKey) == 32) {
    list($headers, $json) = BingImageSearch($endpoint, $accessKey, $term);
   //(json_decode(json_encode(json_decode($json), JSON_PRETTY_PRINT)) as $k => $v) {
   // echo  $headers.'/*/*/*/*'.$json;
    $data = json_decode($json, true);
    //var_dump($data);
    foreach ($data['value'] as $key=>$value){
        echo'</br>'. $value['contentUrl'].'</br>';
    };
      /* foreach ($data as $value){

               foreach ($value as $v){
                       echo str_replace('\/', '/', $v['webSearchUrl']);
               }
           };
       }*/
} else {
    print("Invalid Bing Search API subscription key!\n");
    print("Please paste yours into the source code.\n");
}


function img2_azure($accessKey,$endpoint,$term){
        if (strlen($accessKey) == 32) {
            list($headers, $json) = BingImageSearch($endpoint, $accessKey, $term);
            //(json_decode(json_encode(json_decode($json), JSON_PRETTY_PRINT)) as $k => $v) {
            // echo  $headers.'/*/*/*/*'.$json;
            $data = json_decode($json, true);
            //var_dump($data);
            $i=0;
            foreach ($data['value'] as $key => $value) {
                if($i==0){
                    return $value['contentUrl'] ;
                }
                // return $value['contentUrl'] ;
                $i++;
            };
            /* foreach ($data as $value){

                     foreach ($value as $v){
                             echo str_replace('\/', '/', $v['webSearchUrl']);
                     }
                 };
             }*/
        } else {
            return("Invalid Bing Search API subscription key!\n");
            //print("Please paste yours into the source code.\n");
        }

    }
echo img2_azure('09b4692475694bcb907b5810a47bf8fd','https://api.cognitive.microsoft.com/bing/v7.0/images/search','4607146496450');
//http://localhost:63342/AidaSet/v2/asset/page_invoices.html история покупок 
?>