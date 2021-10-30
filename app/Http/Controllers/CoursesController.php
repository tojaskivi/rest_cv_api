<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Facade\FlareClient\Http\Response;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Courses::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // make sure the input is correctly formatted
        $request->validate([
            'name' => 'required|string',
            'school' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);


        if (Controller::dateCheck($request) == 1) {
            return response(["error" => "date"], 422);
        };

        $request = Controller::sanitize($request->all());
        return Courses::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Courses::find($id);
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
        $course = Courses::find($id);

        if (Controller::dateCheck($request) == 1) {
            return response(["error" => "date"], 422);
        };

        $request = Controller::sanitize($request->all());
        $course->update($request);
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Courses::destroy($id);
    }

    public function search($searchTerm)
    {
        // search for the name, school or code
        // if ABC123 is in the database, searching for BC12 will return ABC123 because of the percent characters (%)
        return Courses::where('name', 'like', '%' . $searchTerm . '%')->orWhere('school', 'like', '%' . $searchTerm . '%')->get();
    }
}
