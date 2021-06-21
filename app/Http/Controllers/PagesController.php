<?php
namespace App\Http\Controllers;

use Illuminate\Database\TempHumidSeeder;
use Illuminate\Http\Request;
// session_start();
require_once('1.php');
$_SESSION["service"] = $a;

class PagesController extends Controller
{
    public function index(){
        $title = "This is LSapp.md";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "This is about page";
        //return view('pages.index', compact('title'));
        return view('pages.about')->with('title', $title);
    }

    public function publishing(){
        // take data from view of wareHouse
        $name = $_GET['name'];
        $mess = $_GET['mess'];

        // establish the publisher
        require('subcribe.php');
        $publisher = new Publisher;

        if(strtoupper($name) == "SPEAKER" && $mess == "1000"){
            echo "The speaker is now turned on!";
        }
        if(strtoupper($name) == "SPEAKER" && $mess == "0"){
            echo "The speaker is now turned off";
        }
        if(strtoupper($name) == "RELAY" && $mess == "1"){
            echo "The relay is now turned on!";
        }
        if(strtoupper($name) == "RELAY" && $mess == "0"){
            echo "The relay is now turned off";
        }
        if(strtoupper($name) == "LCD"){
            echo "Sent to LCD content: ".$_GET['mess'];
        }

        // $data = "Fire";
        // $name = "lcd";
        $publisher->pub($name, $mess);
    }

    public function report(Request $request){
        $data = array(
            'title' => 'All devices',
            // 'services' => ['7' , 'TEMP-HUMID', '29-55', 'C-%']
            'services' => $_SESSION['service']
        );
        $value = explode ( '-' , $data['services'][2] , $limit = 2 ); //split
        $unit = explode ( '-' , $data['services'][3] , $limit = 2 );
        $data1 = array(
            'title' => $data['title'],
            'services' => [$data['services'][0], $data['services'][1], [$value[0],$unit[0] ], [$value[1],$unit[1]] ]
        );

        return view('pages.services')->with($data1);
    }


    // public function send_to_ada(){
    //     $title = 'About Us';
    //     return view('pages.about')->with('title', $title);
    // }
}