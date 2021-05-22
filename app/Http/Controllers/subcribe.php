<?php
use Bluerhinos\phpMQTT;
use Illuminate\Http\Request;

// $request = new Request;


$host   = "io.adafruit.com";
$port = 1883;                     // change if necessary
$username = 'NMT99';                   // set your username
$password = 'aio_ZIiS92quf0OHrB9JS7hpgnT9CKmF';                   // set your password
$client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()


require('phpMQTT.php');
$mqtt = new phpMQTT($host, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
    exit(1);
}

$mqtt->debug = true;
$topics['NMT99/feeds/bk-iot-temp-humid'] = array('qos' => 0, 'function' => 'procMsg');

$mqtt->subscribe($topics, 0);

while ($mqtt->proc()) {}
$mqtt->close();


function procMsg($topic, $msg){
    global $request;
    echo 'Msg Recieved: ' . date('r') . "\n";
    echo "Topic: {$topic}\n\n";
    echo "\t$msg\n\n";
    // $data = json_decode($msg);
    // print_r($msg);
    // $request->session()->put('th', $data->{'data'});
    // echo $request->session()->get('th'); 
}


