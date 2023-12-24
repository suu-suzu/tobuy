<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tobuy;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        return view('tobuys/index')->with(['tobuys' => $tobuy->get()]);
    }
}
