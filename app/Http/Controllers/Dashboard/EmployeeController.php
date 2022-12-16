<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\StoreRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('dashboard.employees.index');
    }


    public function data()
    {
        $model = Employee::query()->latest();

        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('company', function ($model) {
                $employeeCompany = Company::select('id', 'name')->where('id', $model->company_id)->first();

                return ['company_id' => $employeeCompany->id, 'company_name' => $employeeCompany->name];
            })
            ->addColumn('actions', 'dashboard.includes._actions')
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->get();
        return view('dashboard.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Routing\Redirector 
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Employee::create($data);

        return redirect()->route('dashboard.employees.index')->with('success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Employee $employee)
    {
        $companies = Company::select('id', 'name')->get();

        return view('dashboard.employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Routing\Redirector 
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->update($data);

        return redirect()->route('dashboard.employees.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('dashboard.employees.index')->with('success', 'Data Deleted Successfully');
    }
}
