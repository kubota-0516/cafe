@extends('layouts.user')
@section('title', '固めプリンのお店一覧') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
  <hr color="#c0c0c0">
  <div class="center-block">
    <div class="posts mx-auto mt-3">
      @foreach($posts as $post) {{-- $postsはcontrollerから送られたトーストの情報一覧 --}}
        <div class="post">
          <div class="image text-right mt-4">
            @if ($post->image_path) {{-- あれば表示する --}}
            <img src="{{ asset('storage/image/' . $post->image_path) }}">
            @endif
          </div>
            <div>
              <a href="{{ route('user.toast.show', ['id' => $post->id]) }}">{{$post->shop_name}}</a>
            </div>
          <div class="shop_introduction mt-3">
            {{ Str::limit($post->shop_introduction, 1500) }}
          </div>
        </div>
        <hr color="#c0c0c0">
      @endforeach 
    </div>
  </div>
  <form action="top/choises">
    <button class="btn btn-dark" type="submit"><i class="fas fa-redo"></i>トップページに戻る</button>
</div>
@endsection