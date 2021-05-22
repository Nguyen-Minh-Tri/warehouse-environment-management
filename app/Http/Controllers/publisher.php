<?php
namespace App\Http\Controllers;
use Bluerhinos\phpMQTT;
use Illuminate\Http\Request;


class Publisher extends Controller
{
    public function pub()
    {
        require('phpMQTT.php');

        $server   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_ZIiS92quf0OHrB9JS7hpgnT9CKmF';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        
        $mqtt = new phpMQTT($server, $port, $client_id);
        
        if ($mqtt->connect(true, null, $username, $password)) {
            $humid = strval(rand(10, 100));
            $temp = strval(rand(10, 40));
            $message = '{ "id":"7", "name":"TEMP - HUMID", "data":'.$temp.'-'.$humid.', "unit":*C -%"}';
            $mqtt->publish('NMT99/feeds/bk-iot-temp-humid', $message, 0, false);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
    }
}