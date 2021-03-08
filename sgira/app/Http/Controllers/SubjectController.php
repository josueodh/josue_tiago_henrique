<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = new Subject();
        $teachers = User::all();
        $courses = Course::all();
        return view('subjects.create', compact('subject', 'teachers', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        $subject->courses()->attach($request->course_id);
        return redirect()->route('subjects.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $courses = Course::all();
        return view('subjects.show', compact('subject', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $teachers = User::all();
        $courses = Course::all();
        return view('subjects.edit', compact('subject', 'teachers', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        $subject->courses()->sync($request->course_id);
        return redirect()->route('subjects.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->courses()->detach();
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', true);
    }

    public function dashboard(Subject $subject)
    {
        $teams = Team::where('subject_id', $subject->id)->where('status', false)->get();
        $average = [];
        $bonus = [];
        $label = [];
        $approved = [];
        $disapproved = [];
        $total_approved = 0;
        $total_disapproved = 0;
        foreach ($teams as $key => $team) {
            $team_approved = $team->approved;
            $team_disapproved = $team->disapproved;
            array_push($average, 0);
            if ($team_approved + $team_disapproved > 0) {
                array_push($approved, number_format($team_approved / ($team_approved + $team_disapproved), 2) * 100);
                array_push($disapproved, number_format($team_disapproved / ($team_disapproved + $team_approved), 2) * 100);
            } else {
                array_push($approved, 0);
                array_push($disapproved, 0);
            }
            array_push($bonus, 0);
            array_push($label, $team->YearAndSemester);
            $total_approved += $team_approved;
            $total_disapproved += $team_disapproved;
            $students = $team->grades()->get()->unique('student_id')->pluck('student_id');
            foreach ($students as $student) {
                $total_student = $team->grades()->where('student_id', $student)->get();
                if ($total_student->count() > 0) {
                    $average[$key] = $average[$key] +  $total_student->sum('grade') / $total_student->count();
                }
            }
            if ($students->count() > 0) {
                $average[$key] = $average[$key] / $students->count();
            }
        }
        if (collect($average)->count() > 0) {
            $percentage_approved = number_format($total_approved / ($total_approved + $total_disapproved), 2) * 100;
            $averageIRA = number_format(collect($average)->sum() / collect($average)->count(), 2);
        } else {
            $averageIRA = 'Nenhuma nota encontrada';
            $percentage_approved = 'Nenhuma nota encontrada';
        }

        return view('subjects.dashboard', compact('average', 'bonus', 'label', 'averageIRA', 'subject', 'percentage_approved', 'approved', 'disapproved'));
    }
}
