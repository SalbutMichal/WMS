<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return view('dashboard.employees.index');
    }
    public function create(){
        return view('dashboard.employees.create');
    }
}
