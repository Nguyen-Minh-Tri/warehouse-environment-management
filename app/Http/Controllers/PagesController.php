<?php

namespace App\Http\Controllers;

use Bluerhinos\phpMQTT;

class PagesController extends Controller
{
    public function index(){
        $host   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_IYTF58H7XWbqGB3ZtFS0kXJHM9Am';                   // set your password
        $client_id = 1626536; // make sure this is unique for connecting to sever - you could use uniqid()
        
        require('phpMQTT.php');
        $mqtt = new phpMQTT($host, $port, $client_id);
        if(!$mqtt->connect(true, NULL, $username, $password)) {
            exit(1);
        }
        
        $mqtt->debug = true;
        
        $topics['NMT99/feeds/bk-iot-temp-humid'] = array('qos' => 0, 'function' => 'procMsg');

        $mqtt->subscribe($topics, 0);
        
        while($mqtt->proc()) {
        
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
        $password = 'aio_IYTF58H7XWbqGB3ZtFS0kXJHM9Am';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()
        
        $mqtt = new phpMQTT($server, $port, $client_id);
        
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $message = '{ "id":"7", "name":"TEMP - HUMID", "data":"20-90", "unit":*C -%"}';
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
