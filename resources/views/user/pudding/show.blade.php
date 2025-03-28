@extends('layouts.usershow')
@section('title', '店舗情報') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
        <hr color="#c0c0c0">
        <h3>お店の詳細</h3>
            <div class="posts col-md-8 mx-auto mt-3">
                    <div class="post">
                        <div class=".container-md text-right mt-4">
                                @if ($post->image_path) {{-- あれば表示する --}}
                                    <img class="image" src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                        </div><br>
                        <ul>
                            <div class="alert alert-light" style="height: 53px;">
                                <p>おすすめポイント</p>
                            </div>
                            <div class="text">
                                <div class="shop_introduction">
                                    {{ Str::limit($post->shop_introduction, 1000) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" style="height: 53px;">
                                <p>公式ホームページ</p>
                            </div>
                            <div class="text">                                   
                                <div class="shop_introduction">
                                    <a href="{{ Str::limit($post->officialsite, 1000) }}">{{ Str::limit($post->officialsite, 1000) }}</a>
                                </div>
                            </div><br>
                            <div class="alert alert-light" style="height: 53px;">
                                <p>ペット同伴の可否</p>
                            </div>
                            <div class="text">                                    
                                <div class="shop_introduction">
                                    {{ Str::limit($post->pets_allowed, 100) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" style="height: 53px;">
                                <p>予約の可否</p>
                            </div>
                            <div class="text">                                  
                                <div class="shop_introduction">
                                    {{ Str::limit($post->reservations_allowed, 100) }}
                                </div>
                            </div><br>
                            <div class="alert alert-light" style="height: 53px;">
                                <p>住所</p>
                            </div>
                            <div class="text">    
                                <div class="shop_introduction">
                                    {{ Str::limit($post->shop_address, 1000) }}
                                </div>
                            </div>
                        </ul>
                    </div>
                    <hr color="#c0c0c0">
            </div>
</div>
@endsection