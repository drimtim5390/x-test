<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function index(){
        $companies = Company::paginate(10);
        return view('companies.index',compact('companies'));
    }
    public function create(){
        return view('companies.create');
    }
    public function store(CompanyStoreRequest $request){
        $validated = $request->validated();

        $company = Company::create($validated);

        $uploadedFile = $request->file('logo');
        if($uploadedFile!=null) {
            $filename = $company->id . '.' . $uploadedFile->getClientOriginalExtension();

            $path = Storage::disk('local')->putFileAs(
                'public/img/companies',
                $uploadedFile,
                $filename
            );

            $company->update([
                'logo_path' => '/storage/img/companies/' . $filename
            ]);
        }
        return redirect('/companies');
    }

    public function edit($id){
        $company = Company::findOrFail($id);
        return view ('companies.edit',compact('company'));
    }

    public function update(CompanyStoreRequest $request, $id){
        $validated = $request->validated();

        $company = Company::findOrFail($id);
        $company->update($validated);
        $string = substr($company->logo_path,'8');
        $string = 'public'.$string;
        $uploadedFile = $request->file('logo');
        if($uploadedFile!=null){
            $filename = $company->id.'.'.$uploadedFile->getClientOriginalExtension();
            try{
                    Storage::disk('local')->delete($string);
            }catch (\Exception $e){

            }

            Storage::disk('local')->putFileAs(
                'public/img/companies',
                $uploadedFile,
                $filename
            );

            $company->update([
                'logo_path'=>'/storage/img/companies/'.$filename
            ]);
        }
        return redirect('/companies');
    }

    public function delete($id){
        $company = Company::findOrFail($id);
        foreach ($company->employees as $employee) {
            Employee::destroy($employee->id);
        }
        $string = substr($company->logo_path,'8');
        $string = 'public'.$string;
        try{
            Storage::disk('local')->delete($string);
        }catch (\Exception $e){

        }
        Company::destroy($company->id);
        return redirect('/companies');
    }

}
