@extends('layouts.admin')
@section('shop_name', '登録済みカフェの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>カフェ一覧（固めプリン）</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.pudding.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.pudding.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">店名</th>
                                <th width="50%">お店の紹介文</th>
                                <th width="10%">お店のURL</th>
                                <th width="10%">Googlemapのリンク</th>
                                <th width="10%">ペット同伴の可否</th>
                                <th width="10%">予約の可否</th>
                                <th width="10%">お店の住所</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $pudding)
                                <tr>
                                    <th>{{ $pudding->id }}</th>
                                    <td>{{ Str::limit($pudding->shop_name, 100) }}</td>
                                    <td>{{ Str::limit($pudding->shop_introduction, 200) }}</td>
                                    <td>{{ Str::limit($pudding->officialsite, 100) }}</td>
                                    <td>{{ Str::limit($pudding->googlemaplink, 100) }}</td>
                                    <td>{{ Str::limit($pudding->pets_allowed, 100) }}</td>
                                    <td>{{ Str::limit($pudding->reservations_allowed, 100) }}</td>
                                    <td>{{ Str::limit($pudding->shop_address, 100) }}</td>

                                        <div>
                                            <a href="{{ route('admin.pudding.edit', ['id' => $pudding->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.pudding.delete', ['id' => $pudding->id]) }}">削除</a>
                                        </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection