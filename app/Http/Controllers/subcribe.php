<?php

use Bluerhinos\phpMQTT;

public function temp_humid(){   
    $host   = "io.adafruit.com";
    $port = 1883;                     // change if necessary
    $username = 'NMT99';                   // set your username
    $password = 'aio_dmiu88VO4lbKuRxGjoivn7cMx87c';                   // set your password
    $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()

    require('phpMQTT.php');
    $mqtt = new phpMQTT($host, $port, $client_id);

    $mqtt->connect(true, null, $username, $password);

    // $mqtt->debug = true;
    $topics['NMT99/feeds/bk-iot-temp-humid'] = array('qos' => 0, 'function' => 'procMsg');

    $mqtt->subscribe($topics, 0);

    while ($mqtt->proc()) {
    }

    $mqtt->close();

    function procMsg($topic, $msg)
    {
        echo 'Msg Recieved: ' . date('r') . "\n";
        echo "Topic: {$topic}\n\n";
        echo "\t$msg\n\n";
        $data = json_decode($msg);
        print_r($data->{'data'}) ;
    }
}
// conver string to JSON
// then seperate data into 2 number 
// take humid and temperature, push to the chart in view