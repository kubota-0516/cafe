<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TopController extends Controller
{
    public function index(Request $request)
    {
        return view('user.top.choises'); 
    
    }
}
