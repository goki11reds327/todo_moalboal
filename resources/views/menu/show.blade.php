<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- stylesheet --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=archivo-black:400" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
</head>
<body>
    <header>
        {{-- <div class="self_image"><img src="{{ asset('storage/img/' . $user-> user_image) }}" alt=""></div> --}}
        <div class="display_btn">
            <span class="profile">
                <a href="{{ route('show', Auth::user()->user_image) }}" ><img class="self_image" src="{{ asset('storage/img/' . Auth::user()->user_image) }}" alt=""></a>
                {{-- <div id="username">{{ Auth::user()->name }} さん</div> --}}
            </span>
            <a href="{{ route('menu.index') }}" class="btn">menu</a>
            <a href="{{ route('stock.index') }}" class="btn">冷蔵庫</a>
        </div>
    </header>

    <main>
        <div id="app" class="container">
            <div class="item monday">
                <div class="box">
                    <p class="day-number">{{ $menu->date }} </p>
                    <p class="day-title">{{ $menu->title }}</p>
                    <img src="{{ asset('storage/img/'.$menu->pre_image)}}" alt="画像" >
                </div>
                <div class="content">
                    <p class="comment-title">comment</p>
                    {{ $menu->content }}
                </div>
            </div>
            <div class="show-btns">
            <a href="{{ route('menu.edit',$menu ->id) }}" class="show-btn"><span>編集する</span></a>
            <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="show-btn" onclick="return confirm('本当に削除しますか？')">
                    <span>削除する</span>
                </button>
            </form>
            <a href="{{ route('menu.index',$menu->id) }}" class="show-btn"><span>一覧へ戻る</span></a>
            </div>
        </div>
    </main>
</body>
</html>