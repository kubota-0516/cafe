<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pudding;

class PuddingController extends Controller
{
    public function index(Request $request)
    {
        $shops = Pudding::all(); //データーベースからプリンのお店の情報をすべて取得する

        return view('user.pudding.list', [
            'posts' => $shops,
            'route_name' => 'user.pudding.show',
        ]);
    }

    public function show(Request $request, $id)
    {
        //dd($id); ddは何者かわかるもの
        $shop = Pudding::find($id);
        //dd($shop);
        
        return view('user.pudding.show', ['post' => $shop]); //一つの情報を表示したいからindexのreturnとは違う
    }
}
