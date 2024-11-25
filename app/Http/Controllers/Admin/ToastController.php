<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToastController extends Controller
{
    public function add()
    {
        return view('admin.pudding.create');
    }

    public function edit(Request $request)
    {
        // Pudding Modelからデータを取得する
        $pudding = Pudding::find($request->id);
        if (empty($pudding)) {
            abort(404);
        }
        return view('admin.pudding.edit', ['pudding_form' => $pudding]);
    }
}