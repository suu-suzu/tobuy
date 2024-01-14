<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tobuy;
use App\Models\Group;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        $tobuys = Tobuy::orderBy('deadline', 'asc')->with('group')->paginate(5);
        return view('tobuys.index',compact('tobuys'));

    }
    
    public function show(Tobuy $tobuy)
    {
        $tobuys = Tobuy::with('group')->get();
        return view('tobuys.show')->with(['tobuy' => $tobuy]);
    }
    
    public function create(Group $group)
    {
        return view('tobuys.create')->with(['groups' => $group->get()]);
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
    
    public function group(Tobuy $tobuy)
    {
        $groups=auth()->user()->groups;
        return view('tobuys.group',compact('groups'));

    }

}
