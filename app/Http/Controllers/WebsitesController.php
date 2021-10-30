<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Websites;

class WebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Websites::all();
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
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);

        $request = Controller::sanitize($request->all());
        return Websites::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Websites::find($id);
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
        $website = Websites::find($id);
        $request = Controller::sanitize($request->all());
        $website->update($request);
        return $website;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Websites::destroy($id);
    }

    public function search($searchTerm)
    {
        // search for the name, school or code
        // if ABC123 is in the database, searching for BC12 will return ABC123 because of the percent characters (%)
        return Websites::where('title', 'like', '%' . $searchTerm . '%')->orWhere('description', 'like', '%' . $searchTerm . '%')->get();
    }
}