<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkingHoursRequest;
use App\Models\Restaurant;
use App\Models\WorkingHours;
use Illuminate\Http\Request;

class WorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $workingHours = WorkingHours::with('restaurant')->where('restaurant_id', $restaurant->id)
            ->orderBy('day')->paginate(4);
        $days = config('days');
//        dd($workingHours);
        return view('workingHours.index', compact('restaurant', 'days','workingHours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingHoursRequest $request)
    {
//        $request->dd();
        WorkingHours::create(
            [
                'restaurant_id' => $request->restaurant,
                'day'=>$request->day,
                'open_time'=>$request->open_time,
                'close_time'=>$request->close_time
            ]
        );

        return redirect()->back()->with('message','Time Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkingHours $workingHours
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WorkingHours $workingHours
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingHours $workingHours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkingHours $workingHours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingHours $workingHours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkingHours $workingHours
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingHours $workingHour)
    {
        $workingHour->delete();
        return redirect()->back()->with('warning','Time Deleted');
    }
}
