<?php
use Bluerhinos\phpMQTT;
use Illuminate\Http\Request;


// $request = new Request;
$host   = "io.adafruit.com";
$port = 1883;                     // change if necessary
$username = 'quangmanh1998';                   // set your username
$password = 'aio_fqOF75JnCtfogtce3q0xugETtGVd';                   // set your password
$client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()


require('phpMQTT.php');
// require("config.php");
$mqtt = new phpMQTT($host, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
    exit(1);
}

$mqtt->debug = true;
$topics['quangmanh1998/feeds/tmp'] = array('qos' => 0, 'function' => 'procMsg');

$mqtt->subscribe($topics, 0);
while ($mqtt->proc()) {}
$mqtt->close();


function procMsg($topic, $msg){
    // Request $request;
    // echo 'Msg Recieved: ' . date('r') . "\n";
    
    echo "Topic: {$topic}\n\n";
    echo "\t$msg\n\n";
    $data = json_decode($msg);
    file_put_contents('1.php', '<?php'."\n".'$a=[\''.$data->{'id'}.'\',\''.$data->{'name'}.'\',\''.$data->{'data'}.'\',\''.$data->{'unit'}.'\']'."\n".'?>');
    // print_r($msg);
    // $v = $request->session()->put('th', $data->{'data'});
    // echo $request->session()->get('th'); 
}