<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('state')->get();
        $i = 1;
        return view('system_management.city', compact(['cities', 'i']));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'c_name' => 'required'
        ]);
        $data = [
            'state_id' => 2,
            'name' => $request->c_name
        ];
        $city = City::create($data);
      
        return back()->with('success', 'City created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('system_management.edit_city', compact('city'));
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
        $validate = $request->validate([
            'u_name' => 'required'
        ]);
        $data = [

            'name' => $request->u_name,
        ];
        City::where('id', $id)->update($data);

        return redirect()->route('city.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::where('id', $id)->delete();
        return redirect()->route('city.index')->with('success', 'City deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->state_search;
        $cities = City::with(['state' => function($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%');
        }])->where('name', 'like', '%' . $search . '%')->get();
        $i = 1;
        return view('system_management.city', compact(['cities', 'i']));
    }
}
