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

         $news = new Pudding;
         $form = $request->all();
 
         // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
         if (isset($form['image'])) {
             $path = $request->file('image')->store('public/image');
             $news->image_path = basename($path);
         } else {
             $news->image_path = null;
         }
 
         // フォームから送信されてきた_tokenを削除する
         unset($form['_token']);
         // フォームから送信されてきたimageを削除する
         unset($form['image']);
 
         // データベースに保存する
         $news->fill($form);
         $news->save();
         // 追記ここまで
         // admin/news/createにリダイレクトする  
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
