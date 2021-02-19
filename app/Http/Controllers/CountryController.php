<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $i = 1;
        return view('system_management.country', compact(['countries', 'i']));
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
            'c_country_code' => 'required',
            'c_name' => 'required',
        ]);
        $data = [
            'country_code' => $request->c_country_code,
            'name' => $request->c_name,
        ];
        $country = Country::create($data);
      
        return back()->with('success', 'Country created successfully.');
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
    public function edit(Country $country)
    {
        return view('system_management.edit_country', compact('country'));
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
            'u_country_code' => 'required',
            'u_name' => 'required'
        ]);
        $data = [
            'country_code' => $request->u_country_code,
            'name' => $request->u_name,
        ];
        Country::where('id', $id)->update($data);

        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::where('id', $id)->delete();
        return redirect()->route('country.index')->with('success', 'Country deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->country_search;
        $countries = Country::where('country_code', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->get();
        $i = 1;
        return view('system_management.country', compact(['countries', 'i']));
    }
}
