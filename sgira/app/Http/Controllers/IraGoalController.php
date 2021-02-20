<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IraGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $iraGoal = $user->iraGoal;
        return view('iraGoal.index', compact('iraGoal'));
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $iraGoal = $user->iraGoal;
        return view('iraGoal.edit', compact('iraGoal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $iraGoal = $request->input('iraGoal');

        $user = Auth::user();
        $user->iraGoal = $iraGoal;

        $user->save();

        return redirect()->route('iraGoal.index')->with('success', true);
    }
}
