<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function dashboard()
    {
        return view('root.dashboard');
    }
}
