<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = \App\Schedule::all(); 
        // return view('schedules.index', compact('schedules')); 
        return view('schedules.index', compact('schedules'));
        // return $schedules;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedule::create(request()->validate([
            'team' => ['required'],
            'onwork' => ['required'],
            'offwork' => ['required'],
            'startlunch' => ['required'],
            'endlunch' => ['required'],
            'starttime' => ['required'],
            'endtime' => ['required'],
            'description' => ['required'],   
        ]));
 
        return redirect('/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update(request(['team', 'onwork', 'offwork', 'startlunch', 'endlunch', 'starttime', 'endtime', 'description']));
 
        return redirect('/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
 
       return redirect('/schedules');
    }
}
