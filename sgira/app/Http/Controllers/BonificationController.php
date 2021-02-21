<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bonification;
use App\Partner;
use App\User;

class BonificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonifications = Bonification::all();
        return view('bonifications.index', compact('bonifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bonification = new Bonification();
        $partners = Partner::all();
        $students = User::where('is_admin', 0)->get();
        return view('bonifications.create', compact('bonification','students','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bonification::create($request->all());
        return redirect()->route('bonifications.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partners = Partner::all();
        $students = User::where('is_admin', 0)->get();
        return view('bonifications.show', compact('bonification','partners','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = Partner::all();
        $students = User::where('is_admin', 0)->get();
        return view('bonifications.edit', compact('bonification','students','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bonification->update($request->all());
        return redirect()->route('bonifications.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bonification->delete();
        return redirect()->route('bonifications.index')->with('success', true);
    }
}
