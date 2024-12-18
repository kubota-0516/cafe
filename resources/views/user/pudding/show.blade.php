@extends('layouts.user')
@section('title', '店舗情報') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
        <hr color="#c0c0c0">
            <div class="posts col-md-8 mx-auto mt-3">
                    <div class="post">
                        <div class="image .container-md text-right mt-4">
                                @if ($post->image_path) {{-- あれば表示する --}}
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                        </div><br>
                        <ul>
                            <div class="alert alert-light" role="alert">
                                <p>おすすめポイント</p>
                            </div>
                            <div class="text">
                                <div class="shop_introduction">
                                    {{ Str::limit($post->shop_introduction, 150) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" role="alert">
                                <p>公式ホームページ</p>
                            </div>
                            <div class="text">                                   
                                <div class="shop_introduction">
                                    <a href="{{ Str::limit($post->officialsite, 100) }}">{{ Str::limit($post->officialsite, 100) }}</a>
                                </div>
                            </div><br>
                            <div class="alert alert-light" role="alert">
                                <p>ペット同伴の可否</p>
                            </div>
                            <div class="text">                                    
                                <div class="shop_introduction">
                                    {{ Str::limit($post->pets_allowed, 20) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" role="alert">
                                <p>予約の可否</p>
                            </div>
                            <div class="text">                                  
                                <div class="shop_introduction">
                                    {{ Str::limit($post->reservations_allowed, 20) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" role="alert">
                                <p>住所</p>
                            </div>
                            <div class="text">    
                                <div class="shop_introduction">
                                    {{ Str::limit($post->shop_address, 100) }}
                                </div>
                            </div>
                        </ul>
                    </div>
                    <hr color="#c0c0c0">
            </div>
    {{-- 1. 親フォームタグを作成して、遷移先を指定するか、aタグで囲んだものがリンクになるのでそれで指定するか --}}
    {{-- 2. ボタンタグを使用して、遷移先を指定する --}}
    <form action="pudding">
        <button class="btn btn-outline-warning" type="submit"><i class="fas fa-redo"></i>カフェ一覧へ戻る</button>
    </form>
    <a href="{{ route('user.toast.index') }}">
        <button>カフェの一覧に戻る</button>
    </a>
</div>
@endsection