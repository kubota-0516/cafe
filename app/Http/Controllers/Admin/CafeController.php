<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    //
    public function add()
    {
        return view('admin.cafe.create');
    }
    
    public function create()
    {
        return redirect('admin/////create');
    }

    public function edit()
    {
        return view('admin.cafe.edit');
    }

    public function update()
    {
        return redirect('admin.cafe.edit');
    }
}
