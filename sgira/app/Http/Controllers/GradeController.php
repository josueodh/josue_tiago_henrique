<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Subject;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewGrade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $grades = Grade::where('team_id', $team->id)->get();
        return view('grades.index', compact('grades','team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        $grade = new Grade();
        $students = User::where('is_admin', 0)->whereHas('teams', function ($query) use ($team) {
            return $query->where('team_id', $team->id);
        })->get();
        return view('grades.create', compact('grade', 'team', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $grade = Grade::create($request->all());
        Notification::send(User::where('id',$grade->student_id)->get(), new NewGrade('Nota', route('grades.show', $grade->id), 'fas fa-hand-holding-usd', 'Sua nota em '.$grade->team_id.' foi cadastrada'));
        return redirect()->route('grades.index',$grade->team_id)->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        $students = User::where('is_admin', 0)->get();
        $team = Team::where('id', $grade->team_id)->first();
        return view('grades.show', compact('grade', 'students','team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team,Grade $grade)
    {
        $students = User::where('is_admin', 0)->get();
        $subjects = Subject::all();
        return view('grades.edit', compact('grade', 'students', 'subjects','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $grade->update($request->all());
        return redirect()->route('grades.index',$grade->team_id)->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $team = $grade->team_id;
        $grade->delete();
        return redirect()->route('grades.index',$team)->with('success', true);
    }
}
