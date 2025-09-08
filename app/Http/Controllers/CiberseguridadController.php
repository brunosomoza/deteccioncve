<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiberseguridadController extends Controller
{
    public function index()
    {
        return view('dashboards.ciberseguridad');
    }
}
