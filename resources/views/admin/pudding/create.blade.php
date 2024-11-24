{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'cafeの新規作成'を埋め込む --}}
@section('title', 'cafeの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>cafe新規作成</h2>
                <form action="{{ route('admin.pudding.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">お店の紹介文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="shop_introduction" rows="5">{{ old('shop_introduction') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">お店のURL</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="officialsite" rows="1">{{ old('officialsite') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Googlemapのリンク</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="googlemaplink" rows="1">{{ old('googlemaplink') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ペット同伴の可否</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="pets_allowed" rows="1">{{ old('pets_allowed') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">予約の可否</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="reservations_allowed" rows="1">{{ old('reservations_allowed') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">住所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="shop_address" rows="1">{{ old('shop_address') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection