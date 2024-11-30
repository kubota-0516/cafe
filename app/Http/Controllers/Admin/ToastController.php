<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;

use App\Models\Toast;

class ToastController extends Controller
{
    public function add()
    {
        return view('admin.toast.create');
    }

    public function create(Request $request)
    {
         // Validationを行う
         $this->validate($request, Tasto::$rules);

         $toast = new toast;
         $form = $request->all();
 
         // フォームから画像が送信されてきたら、保存して、$toast->image_path に画像のパスを保存する
         if (isset($form['image'])) {
             $path = $request->file('image')->store('public/image');
             $toast->image_path = basename($path);
         } else {
             $toast->image_path = null;
         }
 
         // フォームから送信されてきた_tokenを削除する
         unset($form['_token']);
         // フォームから送信されてきたimageを削除する
         unset($form['image']);
 
         // データベースに保存する
         $toast->fill($form);
         $toast->save();
         // 追記ここまで
         // admin/toast/createにリダイレクトする  
        return redirect('admin/toast');
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = toast::query();

        if(!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%")
                ->orWhere('shop_introduction', 'LIKE', "%{$keyword}%");
        }

        $toasts = $query->get();

        return view('admin.toast.index', compact('keyword', 'toasts')); //59の変数と同じにする
        
    }

    public function edit(Request $request)
    {
        // toast Modelからデータを取得する
        $toast = toast::find($request->id);
        if (empty($toast)) {
            abort(404);
        }
        return view('admin.toast.edit', ['toast_form' => $toast]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Toast::$rules);
        // Toast Modelからデータを取得する
        $toast = Toast::find($request->id);
        // 送信されてきたフォームデータを格納する
        $toast_form = $request->all();

        if ($request->remove == 'true') {
            $toast_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $toast_form['image_path'] = basename($path);
        } else {
            $toast_form['image_path'] = $toast->image_path;
        }
        
        unset($toast_form['image']);
        unset($toast_form['remove']);
        unset($toast_form['_token']);
        
        // 該当するデータを上書きして保存する
        $toast->fill($toast_form)->save();

        $history = new History();              //toastにはなくてもいい？消してもいい
        $history->toast_id = $toast->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/toast');
    }

    public function delete(Request $request)
    {
        // 該当するtoast Modelを取得
        $toast = Toast::find($request->id);

        // 削除する
        $toast->delete();

        return redirect('admin/toast/');
    }
}
