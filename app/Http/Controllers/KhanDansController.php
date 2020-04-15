<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Session\Middleware\StartSession;
use App\Imports\KhanDansImport;
use App\Imports\ABCDansImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class KhanDansController extends Controller
{


    public function create() 
    {
        return view('import');
    }
    //
    public function importKhan(Request $request) 
    {

        $request->validate([
            'fileToUpload' => 'required|file|max:2048|mimes:xls,xlsx',
        ]);

        Excel::import(new KhanDansImport, request()->file('fileToUpload'));
        
        return back()->with('success', 'Excel Imported, Download to see the imported data.');

    }
    public function importABC(Request $request) 
    {

        $request->validate([
            'fileToUpload' => 'required|file|max:2048|mimes:xls,xlsx',
        ]);

        Excel::import(new ABCDansImport, request()->file('fileToUpload'));
        
        return back()->with('success', 'Excel Imported, Download to see the imported data.');

    }    
    
    public function showId()
    {
        echo Auth::check() ? Auth::user()->id : "Хоосон";
    }
    
}
