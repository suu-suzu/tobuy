<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;


class GroupController extends Controller
{
    public function index(Group $group)
    {
        return view('groups.index')->with(['tobuys' => $group->getByGroup()]);
    }
}
