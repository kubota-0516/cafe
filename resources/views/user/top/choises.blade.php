@extends('layouts.users')
@section('shop_name', '選択画面')

@section('content')
    <div class="container">
        <div class="row">
            <h2>どちらを検索しますか？</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.pudding.add') }}" role="button" class="btn btn-primary">固めプリン</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.toast.add') }}" role="button" class="btn btn-primary">シナモントースト</a>
            </div>
        </div>
    </div>
@endsection