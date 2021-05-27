<?php
namespace App\Http\Controllers;
use Bluerhinos\phpMQTT;
use Illuminate\Http\Request;


class Subcriber extends Controller
{
    public function sub()
    {
        $host   = "io.adafruit.com";
        $port = 1883;                     // change if necessary
        $username = 'NMT99';                   // set your username
        $password = 'aio_xmiI44fQSd0B8UkRoq0YIarfC40U';                   // set your password
        $client_id = uniqid(); // make sure this is unique for connecting to sever - you could use uniqid()



        require_once('phpMQTT.php');
        $mqtt = new phpMQTT($host, $port, $client_id);
        if (!$mqtt->connect(true, null, $username, $password)) {
            exit(1);
        }

        $mqtt->debug = true;
        $topics['NMT99/feeds/bk-iot-temp-humid2'] = array('qos' => 0, 'function' => 'procMsg');

        $mqtt->subscribe($topics, 0);

        while ($mqtt->proc()) {
        }
        $mqtt->close();


        function procMsg(Request $request,$topic, $msg)
        {
            // global $request;
            // echo 'Msg Recieved: ' . date('r') . "\n";
            // echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $data = json_decode($msg);
            echo $data->{'data'};
            $_SESSION['th'] = $data->{'data'};
            if (isset($_SESSION['th'])) {
                print_r($_SESSION['th']);
                echo '----------------------------------------';
            }
        // echo $request->session()->get('th');
        }
    }

    
}
