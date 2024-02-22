<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/foraday.css') }}">
</head>
<body>
    <header>
        <div class="buttons-top">
            <button class="refrigerator-button">冷蔵庫</button>
            <button class="top-button">top</button>
        </div>
        <div class="menu-bottom">
            <img src="#" alt="user写真" class="user-photo">
            <div class="buttons-bottom">
                <button class="button">３日間</button>
                <button class="button">１週間</button>
                <button class="button">履歴</button>
            </div>
        </div>
    </header>
    <main>
        <div class="date-box">
            <p>2月20日（火）の献立</p>
        </div>
        <div class="tobuylist-box"> 
            <div>
                <p>カレー</p>
            </div>
            <div class="form-check">
                 {{-- 使ったboostrap https://getbootstrap.jp/docs/5.3/forms/checks-radios/ --}}
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label tobuylist-text" for="flexCheckDefault">
                    <div class="ingredients">玉ねぎ</div>
                    <div class="amount">1こ</div>
                    <div class="mb-3 whobuy">{{-- 使ったboostrap https://bootstrap-guide.com/forms/select --}}
                            <label for="exampleFormSelect1" class="form-label"></label>
                            <select class="form-select" id="exampleFormSelect1">
                                <option selected>誰</option>
                                <option value="1">父</option>
                                <option value="2">母</option>
                                <option value="3">姉</option>
                        </select>
                    </div>
            
                    <div class="mb-3 whereshops">{{-- 使ったboostrap https://bootstrap-guide.com/forms/select --}}
                        <label for="exampleFormSelect1" class="form-label"></label>
                        <select class="form-select" id="exampleFormSelect1">
                            <option selected>店</option>
                            <option value="1">〇〇スーパー</option>
                            <option value="2">××商店</option>
                            <option value="3">△△店</option>
                    </select>
                        </div>
                    </div>
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  カレー
                </label>
              </div>
        </div>

    </main>
</body>
</html>