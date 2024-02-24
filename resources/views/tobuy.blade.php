<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y0V7aUpIOH3pXxXn9TCeS5qXfddE1yCoeVA3ieh5P0wFegzkE8MKChS/N9eX7KSj" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/tobuy.css') }}">
</head>
<body>
    <header>
        <div class="buttons-top">
            <button class="refrigerator-button">冷蔵庫</button>
            <button class="top-button">top</button>
        </div>
        <div class="menu-bottom">
            <div>{{ Auth::user()->name }} さん</div>
            <div class="self_image"><img src="{{ asset('storage/img/' . $user-> user_image) }}" alt=""></div>
            <div class="display_btn">
                <a href="#" class="btn btn-gradient" onclick="showDiv(1)"><span>１日</span></a>
                <a href="#" class="btn btn-gradient" onclick="showDiv(3)"><span>３日</span></a>
                <a href="#" class="btn btn-gradient" onclick="showDiv(7)"><span>１週間</span></a>
            </div>
            </div>
        </div>
    </header>
    <main>
        <div class="date-box">
            <p>{{ Auth::menu()->title }}</p> {{-- menuのタイトル表示 --}}
        </div>
        <div class="tobuylist-box"> 
            <div>
                <p>{{ Auth::menu()->comment }}</p> {{-- menuのコメント表示 --}}
            </div>
            @foreach($toBuys as $toBuy)
            <div class="form-check">
                 {{-- 使ったboostrap https://getbootstrap.jp/docs/5.3/forms/checks-radios/ --}}
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label tobuylist-text" for="flexCheckDefault">
                        <div class="ingredients">{{ $toBuy->ingredient }}</div>
                        <div class="amount">{{ $toBuy->amount }}</div>
                        <div class='wherebuy'>{{ $toBuy->place }}</div>
                        <div class="mb-3 whobuy">{{-- 使ったboostrap https://bootstrap-guide.com/forms/select --}}
                                <label for="exampleFormSelect1" class="form-label"></label>
                                <select class="form-select" id="exampleFormSelect1">
                                    <option selected>誰</option>
                                    <option value="1">父</option>
                                    <option value="2">母</option>
                                    <option value="3">姉</option>
                                </select>
                                </label>
                        </div>
                        <div class="destroy-btn">
                            <form action="{{ route('destroy', [$toBuy->id]) }}" method="post">
                            @csrf
                            <input type="submit" value="削除">
                            </form>
                        </div style="padding:10px 40px">
                @endforeach
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                    カレー
                    </label>
                </div>
                {{ $toBuys->links() }}   {{-- pagination system --}}
        </div>

        <form action="/tobuy" method="post">
            @csrf
            <div class="post-box">
                <input type="text" name="ingredient" placeholder="具材名">
                <input type="text" name="amount" placeholder="必要数量">
                <input type="text" name="place" placeholder="買う場所">
                <button type="submit" class="submit-btn">必要具材追加</button>
            </div>
        </form>

    </main>
</body>
</html>