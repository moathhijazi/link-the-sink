<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chart extends Controller
{
    public function index()
    {
        // $visitors = DB::table('views')->pluck('visits', 'month')->toArray();
        // return response()->json($visitors);
       
        $views = DB::table('views')->get() ; 
        foreach($views as $v) {
            $box[] = $v->id ; 
        }
        
        foreach($views as $vs) {
            $month[] = $vs->month ; 
        }
        
        return [$box , $month] ; 
    }
}
