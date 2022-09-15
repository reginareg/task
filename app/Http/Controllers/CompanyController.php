<?php

namespace App\Http\Controllers;

use App\Models\Company as C;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = match ($request->sort)
        {
            'asc' => C::orderBy('name', 'asc')->get(),
            'desc' => C::orderBy('name', 'desc')->get(),
            default => C::all()
        };
        return view('company.index', ['companies'=> $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create', ['companies'=>C::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new C;
        $company -> name = $request-> name;
        $company -> email = $request->email;
        $company -> website = $request->website;
        $company->save();
        return redirect()->route('cc_index')->with('success', 'I am proud of you, company created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(int $companyId)
    {
        $company= C::where('id', $companyId)->first();
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(int $companyId)
    {
        $company= C::where('id', $companyId)->first();
        return view('company.edit', [
            'company' => $company,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, C $company)
    {
            $company->name = $request->name;
            $company -> email = $request->email;
            $company -> website = $request->website;
            $company->save();
            
            return redirect()->route('cc_index')->with('success', 'Great, You are the best!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(C $company)
    {
      
        if (!$company->employee->count()) {
            $company->delete();
            return redirect()->route('cc_index')->with('deleted', 'Bye bye, I kill you!');
        }
        return redirect()->back()->with('deleted', 'This company can not be killed!');
    }
}
