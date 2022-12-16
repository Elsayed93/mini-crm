<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Companies\StoreRequest;
use App\Http\Requests\Companies\UpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('dashboard.companies.index');
    }


    public function data()
    {
        $model = Company::query()->latest();

        return DataTables::eloquent($model)
            ->addIndexColumn()
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
        return view('dashboard.companies.create');
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
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::putFile('public/companies', $request->file('logo'));
        } else {
            $data['logo'] = 'company.png';
        }

        Company::create($data);
        return redirect()->route('dashboard.companies.index')->with('success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company  $company
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Company $company)
    {
        return view('dashboard.companies.show', compact('company'));
    }

    public function companyEmployeesData(Request $request)
    {
        $companyEmployees = Employee::where('company_id', $request->company_id);

        return DataTables::eloquent($companyEmployees)
            ->addIndexColumn()
            ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {
        return view('dashboard.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Routing\Redirector 
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            Storage::delete($company->logo);
            $data['logo'] = Storage::putFile('public/companies', $request->file('logo'));
        }

        $company->update($data);
        return redirect()->route('dashboard.companies.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Company $company)
    {
        if ($company->logo != 'company.png') {
            Storage::delete($company->logo);
        }

        $company->delete();

        return redirect()->route('dashboard.companies.index')->with('success', 'Data Deleted Successfully');
    }
}
