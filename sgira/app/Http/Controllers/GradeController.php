<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
Use App\Subject;
use App\User;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $students = User::where('is_admin', 0)->get();
        $subjects = Subject::all();
        return view('grades.index', compact('grades','students','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        $grade = new Grade();
        $subjects = Subject::all();
        $subjectselected = $subject;
        $students = User::where('is_admin', 0)->get();
        return view('grades.create', compact('grade', 'students','subjects','subjectselected'));
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
       return redirect()->route('grades.index')->with('success',true);
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
        return view('grades.show', compact('grade', 'students','subjects'));
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
    public function update(Request $request,Grade $grade)
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
