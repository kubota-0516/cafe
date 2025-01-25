<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Toast;

class ToastController extends Controller
{
    public function index(Request $request)
    {   
        $shops = Toast::all(); //データーベースからトーストのお店の情報をすべて取得する

        return view('user.toast.list', [
            'posts' => $shops,
            'route_name' => 'user.toast.show',
        ]);
     }
 

public function show(Request $request, $id)
    {
    //dd($id); ddは何者かわかるもの
    $shop = Toast::find($id);
    //dd($shop);

    return view('user.toast.show', ['post' => $shop]); //一つの情報を表示したいからindexのreturnとは違う
    }
}
