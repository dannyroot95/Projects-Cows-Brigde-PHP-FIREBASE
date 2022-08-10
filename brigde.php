<?php

$json = file_get_contents('php://input');
$data = json_decode($json);

$array= array('latitude'=>$data->{'latitude'},
              'longitude'=>$data->{'longitude'},
              'time'=>$data->{'time'});
$url = "https://cowiot-default-rtdb.firebaseio.com/cow0.json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

$response = curl_exec($ch);
if( curl_errno($ch) ){
     echo 'error: ',curl_errno($ch);
}
else{
  echo "ya inserto";
}

?>
