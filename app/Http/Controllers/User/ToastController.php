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
         // $puddings = $query->get();
         $shops = Toast::all(); //データーベースからトーストのお店の情報をすべて取得する

         return view('user.toast.index', ['posts' => $shops]);  //bladeに送り込むときにpostsのキーワードでトーストの情報を送る
     }
 

public function show(Request $request, $id){
    //dd($id); ddは何者かわかるもの
    $shop = Toast::find($id); //$shopなので32行目と同じ
    //dd($shop);
    return view('user.toast.show', ['post' => $shop]); //一つの情報を表示したいからindexのreturnとは違う
    }
}
