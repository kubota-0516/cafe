@extends('layouts.admin')
@section('shop_name', 'カフェの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>カフェ編集</h2>
                <form action="{{ route('admin.toast.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="shop_name">店名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop_name" value="{{ $toast_form->shop_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="shop_introduction">お店の紹介文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="shop_introduction" rows="5">{{ $toast_form->shop_introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="officialsite">お店のURL</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="officialsite" rows="1">{{ $toast_form->officialsite }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="googlemaplink">Googlemapのリンク</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="googlemaplink" rows="1">{{ $toast_form->googlemaplink }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="pets_allowed">ペット同伴の可否</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="pets_allowed" rows="1">{{ $toast_form->pets_allowed }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="reservations_allowed">予約の可否</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="reservations_allowed" rows="1">{{ $toast_form->reservations_allowed }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="shop_address">お店の住所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="shop_address" rows="1">{{ $toast_form->shop_address }}</textarea>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $toast_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $toast_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($toast_form->histories != null)
                                @foreach ($toast_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection