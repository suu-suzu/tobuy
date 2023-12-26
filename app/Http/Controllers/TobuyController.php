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
}
