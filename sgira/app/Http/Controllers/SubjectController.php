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
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Subject::class, 'subject');
    }
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
            $averageIRA = 0;
            $percentage_approved = 0;
        }

        return view('subjects.dashboard', compact('average', 'bonus', 'label', 'averageIRA', 'subject', 'percentage_approved', 'approved', 'disapproved'));
    }
    /*
    public function bonus(Subject $subject)
    {
        //pega lista de turmas da materia
        $teams = $subject->teams();

        //declara um array que vai conter todos alunos de todas as turmas concatenados
        $students = array();

        //preenche array de alunos
        foreach ($teams as $team) {
            array_push($students, $team->students());
        }

        //declara array com todas as Grades dessa materia, pegando pelo team_id
        $grades = Grades::whereIn('team_id', $teams->id)->get();

        //ordena array de Grades pela Nota
        $grades = $grades . OrderBy('grade');

        //pega os students bonificados
        $orderedGoodStudents = GetGoodStudents($grades);

        //pega os students nao bonificados
        $orderedBadStudents = GetBadStudents($grades);

        return view('subjects.bonus', compact('orderedGoodStudents', 'orderedBadStudents'));
    }

    public function GetGoodStudents($grades)
    {
        $goodGrades = array();
        foreach ($grades as $grade) {
            $team = Team::Find($grade->team_id);
            if ($grade->grade >= $team->rule) array_push($goodGrades, $grade->grade);
        }

        $goodGrades = $goodGrades . OrderByDescending();

        $goodStudents = array();
        foreach ($grades as $grade) {
            $team = Team::Find($grade->team_id);
            if ($grade->grade >= $team->rule) array_push($goodStudents, User::Find($grade->student_id)->name);
        }

        $orderedGoodStudents = array();
        for ($i = 0; $i < $grades . length; $i++) {
            $orderedGoodStudents[$goodGrades[$i]] = $goodStudents[$i];
        }

        return $orderedGoodStudents;
    }


    public function GetBadStudents($grades)
    {
        $badGrades = array();
        foreach ($grades as $grade) {
            $team = Team::Find($grade->team_id);
            if ($grade->grade >= $team->rule) array_push($badGrades, $grade->grade);
        }

        $badGrades = $badGrades . OrderByDescending();

        $baddStudents = array();
        foreach ($grades as $grade) {
            $team = Team::Find($grade->team_id);
            if ($grade->grade >= $team->rule) array_push($badStudents, User::Find($grade->student_id)->name);
        }

        $orderedbadStudents = array();
        for ($i = 0; $i < $grades . length; $i++) {
            $orderedBadStudents[$badGrades[$i]] = $badStudents[$i];
        }

        return $orderedBadStudents;
    }*/
}
