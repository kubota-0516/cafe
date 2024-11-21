<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return redirect('admin/pudding/create');
    }

    public function edit()
    {
        return view('admin.pudding.edit');
    }

    public function update()
    {
        return redirect('admin.pudding.edit');
    }
}
