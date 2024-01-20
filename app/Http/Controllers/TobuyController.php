<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tobuy;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        $groupids = [];
        foreach(Auth::user()->groups as $group)
        {
            $groupids[] = $group->id;
        }
        $tobuys = Tobuy::orderBy('deadline', 'asc')->with('group')->whereIn('group_id', $groupids)->paginate(5);
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
        return redirect('/index');
    }
    
    public function edit(Tobuy $tobuy, Group $group)
    {
        return view('tobuys.edit')->with(['tobuy' => $tobuy, 'groups' => $group->get]);
    }
    
    public function update(Request $request, Tobuy $tobuy)
    {
        $input_tobuy = $request['tobuy'];
        $tobuy->fill($input_tobuy)->save();
        return redirect('/index');
    }
    
    public function delete(Tobuy $tobuy)
    {
        $tobuy->delete();
        return redirect('/index');
    }
    
    // public function group(Tobuy $tobuy)
    // {
    //     $groups=auth()->user()->groups;
    //     return view('tobuys.group',compact('groups'));

    // }
    
    public function group_by(Group $group)
    {
        return view('tobuys.group')->with(['tobuys' => $group->getByGroup()]);
    }

}
