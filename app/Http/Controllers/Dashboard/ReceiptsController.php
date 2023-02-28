<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    public function index(){
        return view('dashboard.receipts.index');
    }
}
