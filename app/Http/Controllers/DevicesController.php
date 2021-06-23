<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;

use App\Post;
use App\Device, Session;
use DB;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    public function subcribe(){
        echo shell_exec('calc');
        // Display the list of all file
        // and directory
        // echo "<pre>$output</pre>";
    }

    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $devices = Device::orderBy('created_at','desc')->paginate(10);
        return view('devices.index')->with('devices', $devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'DeviceName' => 'required',
            'body' => 'required'
        ]);

        // Create device
        $device = new Device;
        $device->DeviceName = $request->input('DeviceName');
        $device->body = $request->input('body');
        $device->warehouseID = Session::get('curID');
        $curID = Session::get('curID');

        $device->save();
        echo $request['devcieID'];

        return redirect('/posts/'.$curID)->with('success', 'device Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('devices.show')->with('device', $device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        
        //Check if post exists before deleting
        if (!isset($device)){
            return redirect('/devices')->with('error', 'No device Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$device->user_id){
            return redirect('/devices')->with('error', 'Unauthorized Page');
        }

        return view('devices.edit')->with('device', $device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'DeviceName' => 'required',
            'body' => 'required'
        ]);
		$device = device::find($id);
         // Handle File Upload
        // if($request->hasFile('cover_image')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        //     // Delete file if exists
        //     Storage::delete('public/cover_images/'.$post->cover_image);
		
	   //Make thumbnails
	    // $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
        //     $thumb = Image::make($request->file('cover_image')->getRealPath());
        //     $thumb->resize(80, 80);
        //     $thumb->save('storage/cover_images/'.$thumbStore);
		
        // }

        // Update Post
        $device->title = $request->input('title');
        $device->body = $request->input('body');
        // if($request->hasFile('cover_image')){
        //     $device->cover_image = $fileNameToStore;
        // }
        $device->save();

        return redirect('/')->with('success', 'device Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        
        //Check if device exists before deleting
        if (!isset($device)){
            return redirect('/')->with('error', 'No device Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$device->user_id){
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        // if($device->cover_image != 'noimage.jpg'){
        //     // Delete Image
        //     Storage::delete('public/cover_images/'.$device->cover_image);
        // }
        
        $device->delete();
        return redirect('/devices')->with('success', 'Warehouse Removed');
    }
}


