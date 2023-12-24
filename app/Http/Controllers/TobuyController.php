<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illiminate\Http\Tobuy;

class TobuyController extends Controller
{
    public function index(Tobuy $tobuy)
    {
        return $tobuy->get();
    }
}
