<?php

namespace App\Imports;

use App\ABCDans;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
class ABCDansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ABCDans([

            'date'=>$this->convert($row[0],$row[1]),
            'amount'=>$row[2],
            'balance'=>$row[3],
            'dans'=>$row[4],
            'countryPart'=>$row[5],
            'line'=>$row[6],
            'channel'=>$row[7],
            'type'=>$row[8],
            'purpose'=>$row[9],
            'user_id'=> Auth::check() ? Auth::user()->id : 0
            //
        ]);
    }
    public function convert($year, $time)
    {
        return date('Y-m-d H:i:s',strtotime(substr($year,4,2)."/".substr($year,6,2)."/".substr($year,0,4)." ".substr($time,0,2).":".substr($time,2,2).":".substr($time,4,2)));
    }
}
