<?php
session_start();
// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

//API endpoint for sign in
$url = 'https://netzwelt-devtest.azurewebsites.net/Account/SignIn';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//headers
$headers = array(
   "accept: text/plain",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//data
$data = '{"username":"' . $data->username . '","password":"' . $data->password . '"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$arr = json_decode($resp, true);
if (isset($arr['displayName'])) {
   $_SESSION['loggedin'] = true;
   $_SESSION['name'] = $arr['displayName'];
}

echo json_encode($arr);
