@extends('layouts.user')
@section('title', '店舗情報') {{-- 一行で終わるもの --}}

@section('content') {{-- 穴埋めする内容が複数ある場合があるので@endで終わる --}}
<div class="container text-center">
    <hr color="#c0c0c0">
    <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div class="post">
                    <div class="image col-md-6 text-right mt-4">
                        @if ($post->image_path) {{-- あれば表示する --}}
                            <img src="{{ asset('storage/image/' . $post->image_path) }}">
                        @endif
                    </div>
                    <div class="row">
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->shop_introduction, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->officialsite, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->googlemaplink, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->pets_allowed, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->reservations_allowed, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->shop_address, 1500) }}
                            </div>
                        </div>
                        <div class="text col-md-6">
                            <div class="shop_introduction mt-3">
                                {{ Str::limit($post->image_path, 1500) }}
                            </div>
                        </div>

                    </div>
                </div>
                <hr color="#c0c0c0">
            </div>
    </div>
    <a href="{{ route('user.toast.index') }}">
        <button>カフェの一覧に戻る</button>
    </a>
</div>
@endsection