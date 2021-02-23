<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('is_admin', 0)->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new User();
        $courses = Course::all();
        return view('students.create', compact('student', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('students.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        $courses = Course::all();
        return view('students.show', compact('student', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $data = $request->all();
        if ($request->password != '') {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $student->update($data);
        return redirect()->route('students.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', true);
    }
}
