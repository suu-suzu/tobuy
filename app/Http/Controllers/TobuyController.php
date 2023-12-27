<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tobuy;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        return view('tobuys.index')->with(['tobuys' => $tobuy->get()]);
    }
    
    public function show(Tobuy $tobuy)
    {
        return view('tobuys.show')->with(['tobuy' => $tobuy]);
    }
    
    public function create()
    {
        return view('tobuys.create');
    }
    
    public function store(Request $request, Tobuy $tobuy)
    {
        $input = $request['tobuy'];
        $tobuy = new Tobuy();
        $tobuy->group_id = 1;
        $tobuy->fill($input);
        $tobuy->save();
        return redirect('/');
    }
    
    public function edit(Tobuy $tobuy)
    {
        return view('tobuys.edit')->with(['tobuy' => $tobuy]);
    }
    
    public function update(Request $request, Tobuy $tobuy)
    {
        $input_tobuy = $request['tobuy'];
        $tobuy->fill($input_tobuy)->save();
        
        return redirect('/');
    }
    
    public function delete(Tobuy $tobuy)
    {
        $tobuy->delete();
        return redirect('/');
    }
}
