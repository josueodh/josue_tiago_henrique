<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Team;
use App\User;
use App\Bonification;
Use App\Partner;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        $partners = Partner::all();
        $subjects = Subject::all();
        $students = User::where('is_admin', 0)->get();
        $teachers = User::where('is_admin', 1)->get();
        return view('teams.create', compact('team', 'students', 'teachers', 'subjects','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = Team::create($request->all());
        $team->students()->attach($request->student_id);
        return redirect()->route('teams.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $students = User::where('is_admin', 0)->get();
        $teachers = User::where('is_admin', 1)->get();
        $subjects = Subject::all();
        $partners = Partner::all();
        return view('teams.show', compact('team', 'students', 'teachers', 'subjects','partners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $students = User::where('is_admin', 0)->get();
        $teachers = User::where('is_admin', 1)->get();
        $subjects = Subject::all();
        $partners = Partner::all();
        return view('teams.edit', compact('team', 'students', 'teachers', 'subjects','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        $team->students()->sync($request->student_id);
        return redirect()->route('teams.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->students()->detach();
        $team->delete();
        return redirect()->route('teams.index')->with('success', true);
    }

    public function bonificating(Team $team)
    {
        if($team->bonus == 1 && $team->status == 1 ){
            foreach($team->students as $student)
            {
                if($student->grades->grade >= $team->rule)
                {
                    Bonification::create([
                        'student_id'=> $student->id,
                        'type'=>'materia',
                        'description'=>'Aluno teve media maior do que o criterio',
                        'expirationDate'=> date('Y-m-d',strtotime('+ 30 days',date('Y-m-d'))),
                        'partner_id'=>$team->partner_id,
                    ]);
                }
            }
        }
        $team->status= !$team->status;
        $team->save();
        return redirect()->route('teams.index')->with('success', true);
    }
}
