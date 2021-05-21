<?php

namespace App\Http\Controllers;

use Illuminate\Database\TempHumidSeeder;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['7', 'TEMP-HUMID', '29-55', 'C-%']
        );
        $value = explode ( '-' , $data['services'][2] , $limit = 2 ); //split
        $unit = explode ( '-' , $data['services'][3] , $limit = 2 );
        $data1 = array(
            'title' => $data['title'],
            'services' => [$data['services'][0], $data['services'][1], [$value[0],$unit[0] ], [$value[1],$unit[1]] ]
        );

        return view('pages.services')->with($data1);
    }
}