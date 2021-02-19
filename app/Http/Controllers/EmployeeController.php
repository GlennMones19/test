<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['department', 'city', 'state', 'country'])->get();
        $i = 1;
        return view('employee_management.employee', compact(['employees', 'i']));
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
            'u_lastname' => 'required',
            'u_firstname' => 'required',
            'u_middlename' => 'required',
            'u_address' => 'required',
            'u_zip' => 'required',
            'u_birthdate' => 'required',
            'u_date_hired' => 'required',
        ]);
        $data = [

            'lastname' => $request->u_lastname,
            'firstname' => $request->u_firstname,
            'middlename' => $request->u_middlename,
            'address' => $request->u_address,
            'zip' => $request->u_zip,
            'birthdate_date' => $request->u_birthdate,
            'date_hired' => $request->u_date_hired
        ];
        $employee = Employee::create($data);
      
        return back()->with('success', 'Employee created successfully.');
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
    public function edit(Employee $employee)
    {
        return view('employee_management.edit_employee', compact('employee'));
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
            'u_lastname' => 'required',
            'u_firstname' => 'required',
            'u_middlename' => 'required',
            'u_address' => 'required',
            'u_zip' => 'required',
            'u_birthdate' => 'required',
            'u_date_hired' => 'required',
        ]);
        $data = [

            'lastname' => $request->u_lastname,
            'firstname' => $request->u_firstname,
            'middlename' => $request->u_middlename,
            'address' => $request->u_address,
            'zip' => $request->u_zip,
            'birthdate_date' => $request->u_birthdate,
            'date_hired' => $request->u_date_hired
        ];
        Employee::where('id', $id)->update($data);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->state_search;
        $employees = Employee::with(['department' => function($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%');
        },
        'state' => function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        },
        'city' => function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        },
        'country' => function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }])->where('lastname', 'like', '%' . $search . '%')
            ->orWhere('firstname', 'like', '%' . $search . '%')
            ->orWhere('middlename', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('zip', 'like', '%' . $search . '%')
            ->orWhere('birthdate_date', 'like', '%' . $search . '%')
            ->orWhere('date_hired', 'like', '%' . $search . '%')
            ->get();
        $i = 1;
        return view('.state', compact(['states', 'i']));
    }
}
