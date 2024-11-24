<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;

use App\Models\Pudding;

class PuddingController extends Controller
{
    //
    public function add()
    {
        return view('admin.pudding.create');
    }
    
    public function create(Request $request)
    {
         // Validationを行う
         $this->validate($request, Pudding::$rules);

         $pudding = new Pudding;
         $form = $request->all();
 
         // フォームから画像が送信されてきたら、保存して、$pudding->image_path に画像のパスを保存する
         if (isset($form['image'])) {
             $path = $request->file('image')->store('public/image');
             $pudding->image_path = basename($path);
         } else {
             $pudding->image_path = null;
         }
 
         // フォームから送信されてきた_tokenを削除する
         unset($form['_token']);
         // フォームから送信されてきたimageを削除する
         unset($form['image']);
 
         // データベースに保存する
         $pudding->fill($form);
         $pudding->save();
         // 追記ここまで
         // admin/pudding/createにリダイレクトする  
        return redirect('admin/pudding/index');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != null) {
            // 検索されたら検索結果を取得する
            $posts = Pudding::where('shop_name', $cond_title)->get(); //titleをshop_nameに変更した
        } else {
            // それ以外はすべての店名を取得する
            $posts = Pudding::all();
        }
        return view('admin.pudding.index', ['posts' => $posts, 'cond_title' => $cond_title]);
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

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Pudding::$rules);
        // Puddig Modelからデータを取得する
        $pudding = Pudding::find($request->id);
        // 送信されてきたフォームデータを格納する
        $pudding_form = $request->all();

        if ($request->remove == 'true') {
            $pudding_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $pudding_form['image_path'] = basename($path);
        } else {
            $pudding_form['image_path'] = $pudding->image_path;
        }
        
        unset($pudding_form['image']);
        unset($pudding_form['remove']);
        unset($pudding_form['_token']);
        
        // 該当するデータを上書きして保存する
        $pudding->fill($pudding_form)->save();

        $history = new History();
        $history->pudding_id = $pudding->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/pudding');
    }

    public function delete(Request $request)
    {
        // 該当するpudding Modelを取得
        $pudding = Pudding::find($request->id);

        // 削除する
        $pudding->delete();

        return redirect('admin/pudding/');
    }
}
