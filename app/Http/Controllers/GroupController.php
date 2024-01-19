<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;


class GroupController extends Controller
{
    public function index(Group $group)
    {
        $user = auth()->user();
        $my_group = $user->groups;
        return view('groups.index')->with(['my_groups' => $my_group, 'groups' => $group->get()]);
    }
    
    public function create(Request $request, Group $group)
    {
        $input = $request['group'];
        $group->fill($input)->save();
        return redirect('/group');
    }
    
    public function add(Request $request)
    { 
        $user=auth()->user();
        $user->groups()->syncWithoutDetaching($request->group_id);
        return redirect('/group');
    }
    
    public function delete(Group $group)
    {
        $group->delete();
        return redirect('/group');
    }
}

