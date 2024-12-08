@extends('layouts.user')
@section('title', '選択画面') {{-- titleタグのyieldに置き換わるのでタブに表示される文字列になる --}} 

@section('content')
<div class="container">
    <div class="row">
        <h2 style="text-align:center">どちらを検索しますか？</h2>
    </div>
    <div style="text-align:center" class="row">
        <div class="col-md-6">
            <a href="{{ route('user.pudding.index') }}" role="button" class="btn btn-primary">固めプリン</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('user.toast.index') }}" role="button" class="btn btn-primary">シナモントースト</a>
        </div>
    </div>
</div>
@endsection