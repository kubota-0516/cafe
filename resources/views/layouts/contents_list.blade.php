<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel fixed-top">
                <div class="justify-content-end">
                    <a href="top/choises" class="btn btn-outline-warning"><i class="fas fa-redo"></i>トップページに戻る</a>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                <div class="container text-center">
                    <hr color="#c0c0c0">
                    <div class="center-block">
                        <h2>@yield('title')</h2>
                            <div class="posts mx-auto">
                                @foreach($posts as $post) {{-- $postsはcontrollerから送られた商品の情報一覧 --}}
                                    <div class="post">
                                        <div class="text-right mt-3">
                                            @if ($post->image_path) {{-- あれば表示する --}}
                                                <img class="image" src="{{ asset('storage/image/' . $post->image_path) }}">
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route($route_name, ['id' => $post->id]) }}">{{$post->shop_name}}</a>
                                        </div>
                                        <div class="shop_introduction mt-3">
                                            {{ Str::limit($post->shop_introduction, 1500) }}
                                        </div>
                                    </div>
                                    <hr color="#c0c0c0">
                                @endforeach
                            </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>