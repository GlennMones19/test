<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::with('country')->get();
        $i = 1;
        return view('system_management.state', compact(['states', 'i']));
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
            'country_id' => rand(1, 249),
            'name' => $request->c_name
        ];
        $state = State::create($data);
      
        return back()->with('success', 'State created successfully.');
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
    public function edit(State $state)
    {
        return view('system_management.edit_state', compact('state'));
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
        State::where('id', $id)->update($data);

        return redirect()->route('state.index')->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        State::where('id', $id)->delete();
        return redirect()->route('state.index')->with('success', 'State deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->state_search;
        $states = State::with(['country' => function($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%');
        }])->where('name', 'like', '%' . $search . '%')->get();
        $i = 1;
        return view('system_management.state', compact(['states', 'i']));
    }
}
