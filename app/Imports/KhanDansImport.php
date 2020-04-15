<?php

namespace App\Imports;

use App\KhanDans;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class KhanDansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new KhanDans([
            
            'sub'=> $row[1],
            'date'=> $this->convert($row[0]),
            'start'=> $row[2],
            'debit'=> $row[3],
            'credit'=> $row[4],
            'end'=> $row[5],
            'desc'=> $row[6],
            'dans'=> $row[7],
            'user_id'=> Auth::check() ? Auth::user()->id : 0
            //
        ]);
    }
    public function convert($str)
    {
        return date('Y-m-d H:i:s',strtotime(substr($str,5,2)."/".substr($str,8,2)."/".substr($str,0,4)." ".substr($str,11,2).":".substr($str,14,2)));
    }
}
