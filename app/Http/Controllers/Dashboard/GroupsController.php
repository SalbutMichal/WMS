<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index(){
        return view('dashboard.roles_and_groups.groups_list');
    }
}
