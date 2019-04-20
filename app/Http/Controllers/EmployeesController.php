<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::paginate(10);
        return view('employees.index',compact('employees'));
    }
    public function create(){
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }
    public function store(EmployeeStoreRequest $request){
        $validated = $request->validated();
        Employee::create($validated);
        return redirect('/employees');
    }
    public function edit($id){
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('employees.edit',compact('employee','companies'));
    }
    public function update(EmployeeStoreRequest $request,$id){
        $validated = $request->validated();
        $employee = Employee::findOrFail($id);
        $employee->update($validated);
        return redirect('/employees');
    }
    public function delete($id){
        Employee::destroy($id);
        return redirect('/employees');
    }
}
