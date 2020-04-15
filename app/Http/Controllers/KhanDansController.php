<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Session\Middleware\StartSession;
use App\Imports\KhanDansImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class KhanDansController extends Controller
{


    public function create() 
    {
        return view('import');
    }
    //
    public function imports(Request $request) 
    {

        $request->validate([
            'fileToUpload' => 'required|file|max:2048|mimes:xls,xlsx',
        ]);

        Excel::import(new KhanDansImport, request()->file('fileToUpload'));
        
        return back()->with('success', 'Excel Imported, Download to see the imported data.');

        /*
        $str = '2020.03.02 13:01';
        $date = strtotime(substr($str,5,2)."/".substr($str,8,2)."/".substr($str,0,4)." ".substr($str,11,2).":".substr($str,14,2));

        
        echo date('Y-M-d H:i:s', $date);
        */
    }
    public function showId()
    {
        echo Auth::check() ? Auth::user()->id : "Хоосон";
    }
    
}
