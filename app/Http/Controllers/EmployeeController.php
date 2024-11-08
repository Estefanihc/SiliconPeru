<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
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

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'hire_date' => 'required|date',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:employees',
            'user_id' => 'required|exists:users,id|unique:employees',
        ]);

        // Crear el nuevo empleado
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'hire_date' => $request->hire_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
        ]);

        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Employee $employee)
    {
        return view('stores.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Pasar la variable $users junto con el empleado a la vista
        return view('stores.employees.edit', compact('employee', 'users'));
    }

    // Método para actualizar un empleado
    public function update(Request $request, Employee $employee)
    {
        // Validar los datos del formulario
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'hire_date' => 'required|date',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:employees,email,' . $employee->id,
            'user_id' => 'required|exists:users,id|unique:employees,user_id,' . $employee->id,
        ]);

        // Actualizar la información del empleado
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'hire_date' => $request->hire_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
        ]);

        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    // Método para eliminar un empleado
    public function destroy(Employee $employee)
    {
        // Eliminar el empleado
        $employee->delete();

        // Redirigir a la lista de empleados con un mensaje de éxito
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
