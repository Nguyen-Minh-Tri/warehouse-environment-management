<?php
use Bluerhinos\phpMQTT;

$host   = "io.adafruit.com";
$port = 1883;                     // change if necessary
$username = 'NMT99';                   // set your username
$password = 'aio_xmiI44fQSd0B8UkRoq0YIarfC40U';                   // set your password
$client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()



require_once('phpMQTT.php');
$mqtt = new phpMQTT($host, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
    exit(1);
}


$mqtt->debug = true;
$topics['NMT99/feeds/bk-iot-temp-humid2'] = array('qos' => 0, 'function' => 'procMsg');

$mqtt->subscribe($topics, 0);

while ($mqtt->proc()) {}
$mqtt->close();
$_SESSION['th'] = "";



function procMsg($topic, $msg){
    // Request $request;
    // echo 'Msg Recieved: ' . date('r') . "\n";
    
    echo "Topic: {$topic}\n\n";
    echo "\t$msg\n\n";
    $data = json_decode($msg);
    file_put_contents('1.php', '<?php'."\n".'$a=[\''.$data->{'id'}.'\',\''.$data->{'name'}.'\',\''.$data->{'data'}.'\',\''.$data->{'unit'}.'\']'."\n".'?>');
    
}



// $value = explode ( '-' , $data['data'] , $limit = 2 ); //split
// $unit = explode ( '-' , $data['unit'] , $limit = 2 );

// file_put_contents('2.php', );
// print_r($msg);
// $v = $request->session()->put('th', $data->{'data'});
// echo $request->session()->get('th'); 




// function procMsg($topic, $msg){
//     echo "\t$msg\n\n";
//     $data = json_decode($msg);
//     print $data->{'data'};

//     // $data_string = $data->{'data'};
//     // $_SESSION['foo'] = $data_string;
//     // $curl = curl_init('http://lsapp.md');
//     // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
//     // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
//     // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
//     // curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//     //     'Content-Type: application/json',
//     //     'Content-Length: ' . strlen($data_string))
//     // );
//     // curl_exec($curl);
//     // curl_close($curl);
// }