<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y0V7aUpIOH3pXxXn9TCeS5qXfddE1yCoeVA3ieh5P0wFegzkE8MKChS/N9eX7KSj" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/buy.css') }}">
</head>
<body>
    <header>
        <div class="buttons-top">
            <button class="refrigerator-button">冷蔵庫</button>
            <button class="top-button">top</button>
        </div>
        <div class="menu-bottom">
            <div>{{ Auth::user()->name }} さん</div>
            <div class="self_image"><img src="{{ asset('storage/img/' . Auth::user()->user_image) }}" alt=""></div>
            {{-- <div class="display_btn">
                <a href="#" class="btn btn-gradient" onclick="showDiv(1)"><span>１日</span></a>
                <a href="#" class="btn btn-gradient" onclick="showDiv(3)"><span>３日</span></a>
                <a href="#" class="btn btn-gradient" onclick="showDiv(7)"><span>１週間</span></a>
            </div> --}}
        </div>
    </header>
    <main>
        <div class="date-box">
            {{-- <p>{{ Auth::menu()->title }}</p> menuのタイトル表示 --}}
        </div>
        <div class="buylist-box"> 
            <div>
                {{-- <p>{{ Auth::menu()->comment }}</p> menuのコメント表示 --}}
            </div>
            <p>rrr</p>
            @foreach($buys as $buy)
            <div class="form-check buy-line">
                 {{-- 使ったboostrap https://getbootstrap.jp/docs/5.3/forms/checks-radios/ --}}
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label buylist-text" for="flexCheckDefault"></label>
                        <div class="ingredients">必要具材：{{ $buy->ingredient }}</div>
                        <div class="amount">必要数量：{{ $buy->amount }}</div>
                        <div class='wherebuy'>購入予定場所：{{ $buy->place }}</div>
                        <div class='who_buy'>買って帰る人：{{ $buy->who_buy }}</div>
                        <img src="{{ asset('storage/img/'.$buy->item_image)}}" alt="画像" >
                        {{-- <div class="destroy-btn">
                            <form action="{{ route('destroy', [$buy->id]) }}" method="post">
                            @csrf
                            <input type="submit" value="削除">
                            </form>
                        </div style="padding:10px 40px"> --}}
            </div>
            @endforeach
                <div class="form-check">
                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> --}}
                    {{-- <label class="form-check-label" for="flexCheckChecked"> --}}
                    カレー
                    {{-- </label> --}}
                </div>
                {{-- {{ $buys->links() }}   pagination system --}}
        

        <form action="{{ route('buy.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="post-box">
                <input type="text" name="ingredient" placeholder="具材名">
                <input type="text" name="amount" placeholder="必要数量">
                <input type="text" name="place" placeholder="買う場所">
                <input type="text" name="who_buy" placeholder="買って帰る人">
                <input type="file" name="item_image" placeholder="具材イメージ" accept="img/*">
                <button type="submit" class="submit-btn">必要具材追加</button>
            </div>
        </form>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    </main>
</body>
</html>