<?php

namespace App\Http\Controllers\Api;

use App\Company as C;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource as CR;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // public function index()
    // {
    //     $companies = C::select('id', 'name', 'email', 'website')->get();
    //     return CR::collection($companies);
    // }

    // public function show(C $company )
    // {
    //     return new CR($company);
    // }
}
