<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Jobs::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'workplace' => 'required|string',
            'title' => 'required|string',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        if (Controller::dateCheck($request) == 1) {
            return response(["error" => "date"], 422);
        };

        $request = Controller::sanitize($request->all());
        return Jobs::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Jobs::find($id);
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
        $job = Jobs::find($id);

        if (Controller::dateCheck($request) == 1) {
            return response(["error" => "date"], 422);
        };
        
        $request = Controller::sanitize($request->all());
        $job->update($request);
        return $job;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Jobs::destroy($id);
    }
    public function search($searchTerm)
    {
        // search for the name, school or code
        // if ABC123 is in the database, searching for BC12 will return ABC123 because of the percent characters (%)
        return Jobs::where('workplace', 'like', '%' . $searchTerm . '%')->orWhere('title', 'like', '%' . $searchTerm . '%')->get();
    }
}
