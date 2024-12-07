@extends('layouts.user')
@section('title', '固めプリンのお店一覧') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                 @foreach($posts as $post) {{-- $postsはcontrollerから送られたトーストの情報一覧 --}}
                    <div class="post">
                        <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path) {{-- あれば表示する --}}
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                        </div>
                          <div class="row">
                            <div class="text col-md-6">
                                <div>
                                  <a href="{{ route('user.toast.show', ['id' => $post->id]) }}">{{$post->shop_name}}</a>
                                </div>
                              
                                  
                                </div>
                                <div class="shop_introduction mt-3">
                                    {{ Str::limit($post->shop_introduction, 1500) }}
                                </div>
                            </div>
                          </div>
                      </div>
                    <hr color="#c0c0c0">
                  @endforeach 
            </div>
          </div>
      <input type="submit" class="btn btn-primary" value="トップページに戻る">
</div>
@endsection