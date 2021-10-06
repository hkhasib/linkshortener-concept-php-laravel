<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortlinkController extends Controller
{
    public function dashboard(){

        return view('dashboard.index');
    }

    public function linkShortener(Request $request){
        $short_link=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        if(ShortLink::where('short_id',$short_link)->first()!=null){
            while (ShortLink::where('short_id',$short_link)->first()!=null){
                $short_link=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            }
        }
        Shortlink::create([
           'short_id'=>$short_link,
           'long_url'=>$request->url
        ]);

        return back()->with('success','Successfully Created the ShortLink!');
    }

    public function index(){
        return view('dashboard.shortlinks')->with('data_list',Shortlink::all()->sortByDesc('created_at'));
    }

    public function redirect($id){
        $short_link=ShortLink::where('short_id',$id)->first();
        if (isset($short_link)){
            return redirect()->away($short_link->long_url);
        }
        else{
            abort(404);
        }

    }
}
