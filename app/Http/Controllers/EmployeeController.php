<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Asegúrate de que esta línea esté presente
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('stores.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('stores.employees.create');
    }

    public function show($employee)
    {
        return view('stores.employees.show', compact('employee'));
    }
}
