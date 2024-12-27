@extends('layouts.usershow')
@section('title', '店舗情報') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
    <hr color="#c0c0c0">
    <h3>お店の詳細</h3>
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
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->shop_introduction, 1500) }}
                            </div>
                        </div><br>
                        <div class="alert alert-light" role="alert">
                            <p>公式ホームページ</p>
                        </div>
                        <div class="text">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->officialsite, 1500) }}
                            </div>
                        </div><br>
                        <div class="alert alert-light" role="alert">
                            <p>ペット同伴の可否</p>
                        </div>
                        <div class="text">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->pets_allowed, 1500) }}
                            </div>
                        </div><br>
                        <div class="alert alert-light" role="alert">
                            <p>予約の可否</p>
                        </div>
                        <div class="text">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->reservations_allowed, 1500) }}
                            </div>
                        </div><br>
                        <div class="alert alert-light" role="alert">
                            <p>住所</p>
                        </div>
                        <div class="text">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->shop_address, 1500) }}
                            </div>
                        </div>

                    </div>
                </div>
                <hr color="#c0c0c0">
</div>
@endsection