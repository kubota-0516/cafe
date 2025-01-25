@extends('layouts.userindex')
@section('title', 'シナモントーストのお店一覧') {{-- titleは一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
  <div class="container text-center">
    <hr color="#c0c0c0">
    <div class="center-block">
      <h2>シナモントーストのお店一覧</h2>
      <div class="posts mx-auto">
        @foreach($posts as $post) {{-- $postsはcontrollerから送られたトーストの情報一覧 --}}
          <div class="post">
            <div class="text-right mt-3">
              @if ($post->image_path) {{-- あれば表示する --}}
              <img class="image" src="{{ asset('storage/image/' . $post->image_path) }}">
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
  </div>
@endsection