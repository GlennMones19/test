<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $i = 1;
        return view('user_management.user', compact(['users', 'i']));
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
            'c_username' => 'required',
            'c_lastname' => 'required',
            'c_firstname' => 'required',
            'c_emailaddress' => 'required|email',
            'c_password' => 'required',
        ]);
        $data = [
            'username' => $request->c_username,
            'lastname' => $request->c_lastname,
            'firstname' => $request->c_firstname,
            'email' => $request->c_emailaddress,
            'password' => Hash::make($request->c_password),
        ];
        $user = User::create($data);
      
        return back()->with('success', 'User created successfully.');
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
    public function edit(User $user)
    {
        return view('user_management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $validate = $request->validate([
            'u_username' => 'required',
            'u_lastname' => 'required',
            'u_firstname' => 'required',
            'u_emailaddress' => 'required|email'
        ]);
        $data = [
            'username' => $request->u_username,
            'lastname' => $request->u_lastname,
            'firstname' => $request->u_firstname,
            'email' => $request->u_emailaddress,
        ];
        User::where('id', $id)->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request) 
    {
        $search = $request->user_search;
        $users = User::where('username', 'like', '%'.$search.'%')
            ->orWhere('lastname', 'like', '%'.$search.'%')
            ->orWhere('firstname', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->get();
        $i = 1;
        return view('user_management.user', compact(['users', 'i']));
        
    }
}
