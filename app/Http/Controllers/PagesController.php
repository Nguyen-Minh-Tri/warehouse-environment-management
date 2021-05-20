<?php

namespace App\Http\Controllers;

use Bluerhinos\phpMQTT;

class PagesController extends Controller
{
    public function index(){
        $host   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_dmiu88VO4lbKuRxGjoivn7cMx87c';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        echo("good here1");
        require('phpMQTT.php');
        $mqtt = new phpMQTT($host, $port, $client_id);
        echo("good here2");

        $mqtt->connect(true, NULL, $username, $password);
        
        // $mqtt->debug = true;
        echo("good here3");
        $topics['NMT99/feeds/bk-iot-temp-humid'] = array('qos' => 0, 'function' => 'procMsg');

        $mqtt->subscribe($topics, 0);
        echo("good here4");
        
        while ($mqtt->proc()) {
            echo "Topic\n\n";
        }
        
        $mqtt->close();
        
        function procMsg($topic, $msg){
                echo 'Msg Recieved: ' . date('r') . "\n";
                echo "Topic: {$topic}\n\n";
                echo "\t$msg\n\n";
        }
        $title = 'Welcome To Laravel!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        require('phpMQTT.php');

        $server   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_dmiu88VO4lbKuRxGjoivn7cMx87c';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        
        $mqtt = new phpMQTT($server, $port, $client_id);
        
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $humid = strval(rand(10,100));
            $temp = strval(rand(10,100));
            $message = '{ "id":"7", "name":"TEMP - HUMID", "data":'.$temp.'-'.$humid.', "unit":*C -%"}';
            $mqtt->publish('NMT99/feeds/bk-iot-temp-humid', $message, 0, false);
            echo "good connection";     
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
