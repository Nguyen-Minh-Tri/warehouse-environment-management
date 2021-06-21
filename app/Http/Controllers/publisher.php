<?php
namespace App\Http\Controllers;
use Bluerhinos\phpMQTT;


class Publisher extends Controller
{
    public function pub($name_raw, $data_raw)
    {
        $data = $data_raw;
        $name = $name_raw;
        $temp = event('APP_NAME', 'defaul');
        print_r($temp);
        require_once('phpMQTT.php');
        $server   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        if (strtoupper($name) != "RELAY") {
            $username = 'NMT99';                   // set your username
            // $username = 'CSE_BBC';                   // set your username
            $password = 'aio_jhHM91927yaLdzIZk1HVa0OMS3pZ';                   // set your password
        }
        else{
            $username = 'NMT99';                   // set your username
            // $username = 'CSE_BBC1';                   // set your username
            $password = 'aio_jhHM91927yaLdzIZk1HVa0OMS3pZ';                   // set your password
        }
        
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        $mqtt = new phpMQTT($server, $port, $client_id);

        if ($mqtt->connect(true, null, $username, $password)) {
            // LCD
            if (strtoupper($name) == "LCD") {
                $message = '{ "id":"3", "name":"LCD", "data":'.'"'.strval($data).'"'.', "unit":"" }'; // LDC ok
                $mqtt->publish('NMT99/feeds/bk-iot-lcd', $message, 0, false); // LDC ok
            }
            // SPEAKER
            if (strtoupper($name) == "SPEAKER") {
                $message = '{ "id":"2", "name":"SPEAKER", "data":'.'"'.strval($data).'"'.', "unit":"" }'; // X trong khoảng từ 0 tới 1023
                $mqtt->publish('NMT99/feeds/bk-iot-speaker', $message, 0, false); // speaker ok
            }

            // Mạch Relay
            if (strtoupper($name) == "RELAY") {
                $message = '{ "id":"11", "name":"RELAY", "data":'.'"'.strval($data).'"'.', "unit":”” }'; // X la 0 hoac 1
                $mqtt->publish('NMT99/feeds/bk-iot-relay', $message, 0, false); // relay ok parrrk parrkk
                // $mqtt->publish('CSE_BBC1/feeds/bk-iot-relay', $message, 0, false); // relay ok parrrk parrkk
            }
            // Dừng chạy MQTT
            $mqtt->close();
        } else {
            // cỡ mà k chạy được thì check time out
            echo "Time out!\n";
        }
    }
}