<?php

namespace App\Http\Controllers;

use App\Mail\Communication;
use App\Team;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('is_admin', 1)->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new User;
        return view('teachers.create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('teachers.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', true);
    }

    public function communicate()
    {
        $teams = Team::where('teacher_id', request()->user()->id)->get();
        return view('teachers.communicate', compact('teams'));
    }


    public function sendCommunicate(Request $request)
    {
        $team = Team::firstWhere('id', $request->to);
        $data = $request->all();
        foreach ($team->students as $student) {
            Mail::to('josuedelgadoheringer98@gmail.com')->send(new Communication(request()->user(), $data));
        }
        dd($request->all());
    }
}
