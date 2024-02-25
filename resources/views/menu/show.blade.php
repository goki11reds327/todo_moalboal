<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <header>
        {{-- <div class="self_image"><img src="{{ asset('storage/img/' . $user-> user_image) }}" alt=""></div> --}}
    </header>

    <main>
        <div id="app" class="container">
            <div class="item monday">
                <a href="#">
                    <p>{{ $menu->date }} {{ $menu->title }}</p>
                    <img src="{{ asset('storage/img/'.$menu->pre_image)}}" alt="画像">
                </a>
                <div class="content">{{ $menu->content }}</div>
            </div>
            <a href="{{ route('menu.edit',$menu ->id) }}" class="btn btn-gradient"><span>編集する</span></a>
            <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-gradient" onclick="return confirm('本当に削除しますか？')">
                    <span>削除する</span>
                </button>
            </form>
        </div>
    </main>
</body>
</html>