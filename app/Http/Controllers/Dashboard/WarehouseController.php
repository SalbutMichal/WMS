<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $warehouses = Warehouse::get();
        return view('dashboard.warehouse.index', compact('warehouses'));
    }
    public function create(){
        return view('dashboard.warehouse.create');
    }
    public function store(Request $request){
        // dd($request->all());
        Warehouse::create($request->all());
        return view('dashboard.warehouse.create');
    }
    public function edit($id){
        $warehouse = Warehouse::findOrFail($id);
        return view('dashboard.warehouse.edit', compact('warehouse'));
    }
    public function update(Request $request, $id){
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->name = $request->name;
        $warehouse->city = $request->city;
        $warehouse->street = $request->street;
        $warehouse->zip_code = $request->zip_code;
        $warehouse->type = $request->type;
        $warehouse->save();
        return view('dashboard.warehouse.edit', compact('warehouse'));
    }
}
