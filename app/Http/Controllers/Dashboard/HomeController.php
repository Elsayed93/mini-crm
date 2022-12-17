<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        $companiesCount = Company::count();
        $employeesCount = Employee::count();

        return view('dashboard.home', compact('companiesCount', 'employeesCount'));
    }
}
