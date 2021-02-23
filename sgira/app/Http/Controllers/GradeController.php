<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Subject;
use App\Team;
use App\User;

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
        return redirect()->route('grades.index')->with('success', true);
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
        $subjects = Subject::all();
        return view('grades.show', compact('grade', 'students', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $students = User::where('is_admin', 0)->get();
        $subjects = Subject::all();
        return view('grades.edit', compact('grade', 'students', 'subjects'));
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
        return redirect()->route('grades.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', true);
    }
}
