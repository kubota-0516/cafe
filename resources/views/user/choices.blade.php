@extends('layouts.admin') <!-- adminでいい？ -->
@section('shop_name', '選択画面')

@section('content')
    <div class="container">
        <div class="row">
            <h2>どちらを検索しますか？</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                       
                        <tbody>
                            @foreach($posts as $pudding)
                                <tr>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.pudding.index') }}">プリン</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($posts as $toast)
                                <tr>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.toast.index') }}">トースト</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection