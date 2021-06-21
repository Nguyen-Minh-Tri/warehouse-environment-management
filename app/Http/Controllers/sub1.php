<?php
use Bluerhinos\phpMQTT;

// Thông số cần để tạo object subcribe
$host   = "io.adafruit.com";
$port = 1883;                     // change if necessary
$username = 'NMT99';              // set your username
$password = 'aio_jhHM91927yaLdzIZk1HVa0OMS3pZ';                   // set your password
$client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()


// Tạo object MQTT để subcribe vào topic
require_once('phpMQTT.php');
$mqtt = new phpMQTT($host, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
    exit(1);
}

// Kết nối và nghe 
$mqtt->debug = true;
$topics['NMT99/feeds/bk-iot-temp-humid'] = array('qos' => 0, 'function' => 'procMsg');
$mqtt->subscribe($topics, 0);
while ($mqtt->proc()) {}
$mqtt->close();



function procMsg($topic, $msg){
    // In ra vài thông số quan trọng để check tình trạng của object MQTT
    echo "Topic: {$topic}\n\n";
    echo "\t$msg\n\n";
    $data = json_decode($msg);
    // Đưa dữ liệu vào một file để get ra sau
    file_put_contents('1.php', '<?php'."\n".'$a=[\''.$data->{'id'}.'\',\''.$data->{'name'}.'\',\''.$data->{'data'}.'\',\''.$data->{'unit'}.'\']'."\n".'?>');
}