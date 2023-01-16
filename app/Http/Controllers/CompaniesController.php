<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompaniesController extends Controller
{
    public function list()
    {
        return view('companies.list', [
            'companies' => Company::all()
        ]);
    }

    public function addForm()
    {
        return view('companies.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $company = new Company();
        $company->name = $attributes['name'];
        $company->address = $attributes['address'];
        $company->save();
        return redirect('/console/companies/list')->with('message', 'Company has been added.');
    }

    public function delete(Company $company)
    {
        $company->delete();

        return redirect('/console/companies/list')->with('message', 'Company has been deleted!');
    }

    public function editForm(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    public function edit(Company $company)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $company->name = $attributes['name'];
        $company->address = $attributes['address'];
        $company->save();

        return redirect('/console/companies/list')->with('message', 'Company successfully updated');
    }
}
