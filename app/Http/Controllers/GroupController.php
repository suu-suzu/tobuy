<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;


class GroupController extends Controller
{
    public function index(Group $group)
    {
        return view('tobuys.group')->with(['groups' => $group->get()]);
    }
    
    public function show(Group $group)
    {
        return view('groups.index')->with(['tobuys' => $group->getByGroup()]);
    }
    
    public function create(Request $request, Group $group)
    {
        $input = $request['group'];
        $group->fill($input)->save();
        return redirect('/group');
    }
}
