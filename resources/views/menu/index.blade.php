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
        <div class="display_btn">
            <a href="{{ route('show', Auth::user()->user_image) }}" class="profile">
                <div class="self_image"><img src="{{ asset('storage/img/' . Auth::user()->user_image) }}" alt=""></div>
                {{-- <div id="username">{{ Auth::user()->name }} さん</div> --}}
            </a>
            <a href="#" class="btn btn-1day" onclick="showDiv(1)"><span>１日</span></a>
            <a href="#" class="btn btn-3days" onclick="showDiv(3)"><span>３日</span></a>
            <a href="#" class="btn btn-7days" onclick="showDiv(7)"><span>１週間</span></a>
        </div>
        <a href="{{ route('stock.index') }}"><img src="{{ asset('/img/refriger.png') }}" alt="冷蔵庫" class="refrigerator"></a>
        <div class="new_post_btn">
            <a href="/menu/create" class="btn-gradient new-btn"><span>新規作成</span></a>
        </div>
    </header>

    <main>
        <div id="app" class="container">
            @foreach($menus as $menu)
                    <div class="item monday">
                        <a href="" class="box">
                            <p class="day-number">{{ $menu->date }} </p>
                            <p class="day-title">{{ $menu->title }}</p>
                            <img src="{{ asset('storage/img/'.$menu->pre_image)}}" alt="画像"  class="menu-img">
                        </a>
                        <div class="content">
                            <p class="comment-title">comment</p>
                            {{ $menu->content }}
                        </div>
                        <div class="detail">
                        <a href="{{ route('buy.index',$menu->id) }}" class="change-btn"><span>ToBuyリストへ</span></a>
                        <a href="{{ route('menu.show',$menu->id) }}" class="change-btn"><span>編集・削除</span></a>
                        </div>
                    </div>
            @endforeach

            {{ $menus->links() }}
        </div>
    </main>

    <script>
        function showDiv(days) {
            var allItems = document.querySelectorAll('.item');
            allItems.forEach(function(item, index) {
                if (index < days) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }
    </script>

    
</body>
</html>