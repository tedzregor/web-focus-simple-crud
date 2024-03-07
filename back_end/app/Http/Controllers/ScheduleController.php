<?php

namespace App\Http\Controllers;

use App\Models\tb_schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function addSchedule(Request $request) {
        $validated = $request->validate([
            'frequency' => 'required',
            'day' => 'required',
            'time' => 'required',
            'notes' => 'required',
            'start_date' => 'required'
        ]);

        if(!$validated) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        } else {
            $schedule= new tb_schedule();
            $schedule->frequency= $request->frequency;
            $schedule->start_date= $request->start_date;
            $schedule->day= $request->day;
            $schedule->time= $request->time;
            $schedule->notes= $request->notes;
    
            $schedule->save();
        }
    }
}
