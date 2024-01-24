<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;


class GroupController extends Controller
{
    public function index(Group $group)
    {
        $user = auth()->user();
        $my_group = Group::whereHas('users', function ($q){
            $q->where('application', 1)->where('user_id', auth()->id());
        })->get();
        return view('groups.index')->with(['my_groups' => $my_group, 'groups' => $group->get()]);
    }
    
    public function create(Request $request, Group $group)
    {
        $input = $request['group'];
        $group->fill($input)->save();
        $group->users()->syncWithoutDetaching([auth()->id() => ['application' => 1]]);
        return redirect('/group');
    }
    
    public function add(Request $request)
    { 
        $user = auth()->user();
        $user->groups()->syncWithoutDetaching([$request->group_id => ['application' => 0]]);
        return redirect('/group');
    }
    
    public function delete(Group $group)
    {
        $group->delete();
        return redirect('/group');
    }
    
    public function leave(Group $group)
    {
        auth()->user()->groups()->detach($group);
        return redirect('/group');
    }
    
    public function permission(User $user, Group $group)
    {
        $user->groups()->syncWithoutDetaching([$group->id => ['application' => 1]]);
        return redirect('/chat/' . $group->id);
    }
    
     public function reject(User $user, Group $group)
    {
        $user->groups()->detach($group->id);
        return redirect('/chat/' . $group->id);
    }
}

