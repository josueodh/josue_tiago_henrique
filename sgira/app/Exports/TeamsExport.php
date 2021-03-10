<?php

namespace App\Exports;

use App\Team;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TeamsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection

    
    */
    protected $team;

    public function __construct(Team $team){
        $this->team = $team;
    }

    public function view():View
    {
        return view('excel.team',[
            'team' => $this->team
        ]);
    }
}
