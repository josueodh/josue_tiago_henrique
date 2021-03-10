<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'student');
    }
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
        $teams = $student->teams()->orderBy('year', 'asc')->orderBy('semester', 'asc')->where('status', false)->get();
        $label = [];
        $parcialIra = [];
        $parcialIraAllStudents = [];
        $ira = [];
        $iraAllStudents = [];
        $twoCredits = [];
        $twoCreditsAll = [];
        $fourCredits = [];
        $fourCreditsAll = [];
        foreach ($teams as $key => $team) {
            $grade = $team->grades()->where('student_id', $student->id)->sum('grade');
            $total = $team->grades()->where('student_id', $student->id)->count();
            $grade_all = $team->grades()->sum('grade');
            $total_all = $team->grades()->count();
            if (!collect($label)->contains($team->yearAndSemester)) {
                array_push($label, $team->yearAndSemester);

                if ($team->subject->credits == '2') {
                    if ($total > 0) {
                        array_push($twoCredits, 1);
                        array_push($fourCredits, 0);
                        array_push($parcialIra, 2 * ($grade / $total));
                    } else {
                        array_push($parcialIra, 0);
                    }
                    if ($total_all > 0) {
                        array_push($twoCreditsAll, 1);
                        array_push($fourCreditsAll, 0);
                        array_push($parcialIraAllStudents, 2 * ($grade_all / $total_all));
                    } else {
                        array_push($parcialIraAllStudents, 0);
                    }
                }
                if ($team->subject->credits == '4') {
                    if ($total > 0) {
                        array_push($twoCredits, 0);
                        array_push($fourCredits, 1);
                        array_push($parcialIra, 4 * ($grade / $total));
                    } else {
                        array_push($parcialIra, 0);
                    }
                    if ($total_all > 0) {
                        array_push($twoCreditsAll, 0);
                        array_push($fourCreditsAll, 1);
                        array_push($parcialIraAllStudents, 4 * ($grade_all / $total_all));
                    } else {
                        array_push($parcialIraAllStudents, 0);
                    }
                }
            } else {
                $index = array_search($team->yearAndSemester, $label);
                if ($team->subject->credits == '2') {
                    if ($total > 0) {
                        $twoCredits[$index] += 1;
                        $parcialIra[$index] += ($grade / $total);
                    }
                    if ($total_all > 0) {
                        $twoCreditsAll[$index] += 1;
                        $parcialIraAllStudents[$index] += ($grade_all / $total_all);
                    }
                }
                if ($team->subject->credits == '4') {
                    if ($total > 0) {
                        $fourCredits[$index] += 1;
                        $parcialIra[$index] += ($grade / $total);
                    }
                    if ($total_all > 0) {
                        $fourCreditsAll[$index] += 1;
                        $parcialIraAllStudents[$index] += ($grade_all / $total_all);
                    }
                }
            }
        }

        foreach ($parcialIra as $key =>  $finalIra) {
            $total_ira_grade = 0;
            $total_credits = 0;
            $total_all_ira_grade = 0;
            $total_credits_all = 0;
            for ($i = 0; $i <= $key; $i++) {
                $total_ira_grade += $parcialIra[$i];
                $total_all_ira_grade += $parcialIraAllStudents[$i];
                $total_credits_all += (2 * $twoCreditsAll[$i] + 4 * $fourCreditsAll[$i]);
                $total_credits += (2 * $twoCredits[$i] + 4 * $fourCredits[$i]);
            }
            if ($total_credits > 0) {
                array_push($ira, $total_ira_grade / $total_credits);
            } else {
                array_push($ira, 0);
            }
            if ($total_credits_all > 0) {
                array_push($iraAllStudents, $total_all_ira_grade / $total_credits_all);
            } else {
                array_push($iraAllStudents, 0);
            }
        }
        $last = count($iraAllStudents);
        if ($last > 0) {
            $iraAllStudents[$last - 1] = $student->course->average_ira;
        }
        $courses = Course::all();
        return view('students.show', compact('student', 'courses', 'label', 'ira', 'iraAllStudents'));
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
