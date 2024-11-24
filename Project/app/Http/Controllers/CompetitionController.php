<?php

namespace App\Http\Controllers;

use App\Http\Filters\CompetitionFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Discipline;
use App\Models\Location;
use App\Models\ParticipantsNumber;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(FilterRequest $request){

        $data = $request->validated();
        $filter = app()->make(CompetitionFilter::class, ['queryParams' => array_filter($data)]);
        $competitions = Competition::filter($filter)->paginate(10);

        $ids = Competition::select('id')->distinct()->pluck('id')->toArray();
        $types = Competition::select('type')->distinct()->pluck('type')->toArray();
        $locations = Competition::select('location')->distinct()->pluck('location')->toArray();

        return view('competitions/index', [
            'competitions' => $competitions,

            'types' => $types,
            'locations' => $locations,
            'ids' => $ids,
        ]);
    }

    public function script(){
        $scriptPath = 'C:/OSPanel/home/mestosporta.local/resources/scripts/downld.py';
        shell_exec("python3 $scriptPath");
        return redirect('/');
    }
}
