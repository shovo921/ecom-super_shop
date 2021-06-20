<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SubCribe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcribeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

    $all_data=SubCribe::latest()->get();
     return view('admin.subscribe.index',compact('all_data'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required',
        ]);
        $email= $request->email;
        $check=SubCribe::where('email',$email)->get();
        if($check)
        {
            return redirect()->back()->with('error_msg', 'you are already Subscribe');   
        }
        else{
        
            SubCribe::insert([

                'email'=>$email,
                'created_at'=>Carbon::now()
    
            ]);
            return redirect()->back()->with('msg','Subscribe suessfully');
        }
  

       

    }
    public function Delete($id){

        SubCribe::findorfail($id)->delete();
    return redirect()->back()->with('message_delete', 'Your data was successfully deleted !');


        
    }


      public function inactive($id){
                SubCribe::find($id)->update([
            'status'=> 0
            ]);
                return redirect()->back()->with('message', 'Your SubCribe member Incative now !');

            }
        public function active($id)
        {
            SubCribe::find($id)->update([

            'status'=> 1,
        ]);
        return redirect()->back()->with('message', 'Your SubCribe member Active !');

        }
}
