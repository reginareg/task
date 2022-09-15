<?php

namespace App\Http\Controllers;

use App\Models\Employee as E;
use App\Models\Company as C;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = match ($request->sort)
        {
            'asc' => E::orderBy('name', 'asc')->get(),
            'desc' => E::orderBy('name', 'desc')->get(),
            default => E::all()
        };
        return view('employee.index', ['employees'=> $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', ['employees'=>E::all(), 'companies'=>C::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new E;
        // $employee ->fill($request->all());
        $employee -> first_name = $request-> first_name;
        $employee -> last_name = $request-> last_name;
        $employee -> company_id = $request-> company_id;
        $employee -> email = $request-> email;
        $employee -> phone = $request-> phone;
        $employee -> age = $request-> age;
        $employee -> salary = $request-> salary;
        $employee->save();
        return redirect()->route('ec_index')->with('success', 'I am proud of you, employee created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(int $employeeId)
    {
        $employee= E::where('id', $employeeId)->first();
        $company=C::where('id', $employee->company->id)->first();
        return view('employee.show', ['employee' => $employee, 'company' => $company]);
    }


    public function edit(E $employee)
    {
        $company = C::all();
        return view('employee.edit', ['employee' => $employee, 'companies' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, E $employee)
    {
        $employee -> first_name = $request-> first_name;
        $employee -> last_name = $request-> last_name;
        $employee -> company_id = $request-> company_id;
        $employee -> email = $request-> email;
        $employee -> phone = $request-> phone;
        $employee -> age = $request-> age;
        $employee -> salary = $request-> salary;
        $employee->save();
        return redirect()->route('ec_index')->with('success', 'I am proud of you, employee created successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(E $employee)
    {
        $employee->delete();

        return redirect()->route('ec_index')->with('deleted', 'Bye bye, I kill you!');
    }
}
