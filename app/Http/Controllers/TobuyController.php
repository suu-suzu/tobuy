<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tobuy;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\TobuyRequest;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        return view('tobuys.index')->with(['tobuys' => $tobuy->getMyGroupTobuy()]);
    }
    
    public function show(Tobuy $tobuy)
    {
        $tobuys = Tobuy::with('group')->get();
        return view('tobuys.show')->with(['tobuy' => $tobuy]);
    }
    
    public function create(Group $group)
    {
        $user = auth()->user();
        $my_group = $user->groups;
        $my_group = Group::whereHas('users', function ($q){
            $q->where('application', 1)->where('user_id', auth()->id());
        })->get();
        return view('tobuys.create')->with(['my_groups' =>$my_group, 'groups' => $group->get()]);
    }
    
    public function store(TobuyRequest $request, Tobuy $tobuy)
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
        $user = auth()->user();
        $my_group = $user->groups;
        $user = auth()->user();
        $my_group = Group::whereHas('users', function ($q){
            $q->where('application', 1)->where('user_id', auth()->id());
        })->get();
        return view('tobuys.edit')->with(['my_groups' =>$my_group, 'tobuy' => $tobuy, 'groups' => $group->get()]);
    }
    
    public function update(TobuyRequest $request, Tobuy $tobuy)
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
    
    public function group_by(Group $group)
    {
        return view('tobuys.group')->with(['tobuys' => $group->getByGroup()]);
    }

}
