<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wisataadat;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TempatWisatas = wisataadat::where('nama','LIKE',"%%")->latest()->paginate(4);
        $lates = wisataadat::orderBy('updated_at','desc')->limit(4)->get();
        return view('home',['TempatWisatas'=> $TempatWisatas,'lates'=>$lates]);
    }
    public function show($slug){
        $Data = wisataadat::where('slug', '=', $slug)->get();
        $lates= wisataadat::orderBy('updated_at','desc')->limit(4)->get();
        return view('detail',['Data'=> $Data,'lates'=>$lates]);


    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');
       
        $TempatWisatas = wisataadat::where('nama','LIKE',"%$query%")->orWhere('asal','LIKE',"%$query%")->paginate(6);
        $lates= wisataadat::orderBy('updated_at','desc')->limit(4)->get();
        return view('TempatWisata.cari',compact('TempatWisatas','lates'));
    }


      public function aboutus()
    {  
        
        return view('aboutus');
    }

     public function contact()
    {  
        return view('contact');
    }
}
