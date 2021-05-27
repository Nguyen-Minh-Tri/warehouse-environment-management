<?php
namespace App\Http\Controllers;
use Bluerhinos\phpMQTT;


class Publisher extends Controller
{
    public function pub()
    {
        require_once('phpMQTT.php');

        $server   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_xmiI44fQSd0B8UkRoq0YIarfC40U';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        $mqtt = new phpMQTT($server, $port, $client_id);
        
        if ($mqtt->connect(true, null, $username, $password)) {
            $humid_num = rand(30, 90);
            $temp_num = rand(15, 40);
            $humid = "$humid_num";
            $temp = "$temp_num";
            $message = '{ "id":"7", "name":"TEMP - HUMID", "data":'.'"'.strval($temp).'-'.strval($humid).'"'.', "unit":"*C -%" }';
            $mqtt->publish('NMT99/feeds/bk-iot-temp-humid2', $message, 0, false);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
    }
}