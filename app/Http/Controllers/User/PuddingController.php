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
        // $keyword = $request->input('keyword');
        // $query = pudding::query();

        // if(!empty($keyword)) {
        //     $query->where('shop_name', 'LIKE', "%{$keyword}%")
        //         ->orWhere('shop_introduction', 'LIKE', "%{$keyword}%");
        // }

        // $puddings = $query->get();
        $shops = Pudding::all(); //データーベースからプリンのお店の情報をすべて取得する

        return view('user.pudding.index', ['posts' => $shops]);  //bladeに送り込むときにpostsのキーワードでプリンの情報を送る
    }

    public function show(Request $request, $id){
        //dd($id); ddは何者かわかるもの
        $shop = Pudding::find($id); //$shopなので32行目と同じ
        //dd($shop);
        return view('user.pudding.show', ['post' => $shop]); //一つの情報を表示したいからindexのreturnとは違う
    }
}
