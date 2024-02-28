<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y0V7aUpIOH3pXxXn9TCeS5qXfddE1yCoeVA3ieh5P0wFegzkE8MKChS/N9eX7KSj" crossorigin="anonymous">
    <title>Document</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=archivo-black:400" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/buy.css') }}">
</head>
<body>
    <header>
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
        <div class="date-box">
            {{-- <p>{{ Auth::menu()->title }}</p> menuのタイトル表示 --}}
            {{-- {{ $menu->title }} --}}
        </div>
        <div class="buylist-box"> 
            <div>
                {{-- <p>{{ Auth::menu()->comment }}</p> menuのコメント表示 --}}
                {{ $menu->comment }}
            </div>
            <h1>⭐️買うものリスト</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            @foreach($buys as $buy)
            <div class="form-check buy-line">
                {{-- 使ったboostrap https://getbootstrap.jp/docs/5.3/forms/checks-radios/ --}}
                        
                <label class="form-check-label buylist-text" for="flexCheckDefault">
                    <span>：完了したらチェックやで</span>
                    <input class="form-check-input" type="checkbox" value="完了確認" id="flexCheckDefault">
                </label >          
                <label for=""><span>⭐️必要具材</span>
                <div class="ingredients dd" id="ingredient_{{ $buy->id }}">{{ $buy->ingredient }}</div>
                </label>
                <label for=""><span>⭐️買う量</span>
                <div class="amount dd" id="amount_{{ $buy->id }}">{{ $buy->amount }}</div>
                </label>
                <label for=""><span>⭐️買う場所</span>
                <div class='wherebuy dd' id="place_{{ $buy->id }}">{{ $buy->place }}</div>
                </label>
                <label for=""><span>⭐️買う人</span>
                <div class='who_buy dd' id="who_buy_{{ $buy->id }}">{{ $buy->who_buy }}</div>
                </label><span>⭐️イメージ画像</span>
                <label for="">
                <img class="food-image" src="{{ asset('storage/img/'.$buy->item_image)}}" alt="画像" >
                </label>
                {{-- Edit Form --}}
                <div id="editForm_{{ $buy->id }}" style="display: none;">
                    <form action="{{ route('buy.update', $buy->id) }}" method="post" >
                        @csrf
                        @method('put')
                        <input type="text" name="edited_ingredient" value="{{ $buy->ingredient }}">
                        <input type="text" name="edited_amount" value="{{ $buy->amount }}">
                        <input type="text" name="edited_place" value="{{ $buy->place }}">
                        <input type="text" name="edited_who_buy" value="{{ $buy->who_buy }}">
                        <button type="submit" class="gg-btn">更新</button>
                    </form>
                </div>
                <div class="btn-area">
                    <div class="destroy-btn gg-btn">
                        <form action="{{ route('buy.destroy', ['id' => $buy->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" value="削除" onclick="return confirm('本当に削除しますか？')">
                                削除する
                            </button>
                        </form>
                    </div style="padding:10px 40px">
                    {{-- Edit Button --}}
                    <div class="destroy-btn gg-btn">
                    <button onclick="toggleEditForm({{ $buy->id }})">編集するで</button>
                    </div style="padding:10px 40px">
                </div>
            </div>  
            @endforeach
                {{-- <div class="form-check"> --}}
                    {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> --}}
                    {{-- <label class="form-check-label" for="flexCheckChecked"> --}}
                    
                        {{ $menu->title }}
                        {{ $menu->comment }}

                    {{-- </label> --}}

                {{-- </div> --}}
                {{-- {{ $buys->links() }}   pagination system --}}        
        </div>

        <form action="{{ route('buy.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="post-box">
                <input type="text" name="ingredient" placeholder="具材名">
                <input type="number" name="menu_id" value="{{ $menu->id }}" hidden>
                <input type="text" name="date" value="{{ $menu->date }}" hidden>
                <input type="text" name="amount" placeholder="必要数量">
                <input type="text" name="place" placeholder="買う場所">
                <input type="text" name="who_buy" placeholder="買って帰る人">
                <input type="file" name="item_image" placeholder="具材イメージ" accept="img/*">
                <button type="submit" class="submit-btn gg-btn add-btn">＋必要具材追加</button>
            </div>
        </form>
        <form action="{{ route('postComment') }}" method="post">
            @csrf
            <div class="post-box">
                <input type="text" name="comment" placeholder="伝言">
                {{-- <input type="number" name="user_id" value="{{ Auth::id() }}" hidden> --}}
                <input type="number" name="menu_id" value="{{ $menu->id }}" hidden>
                <button type="submit" class="submit-btn">comment</button>
                {{-- {{ $menu->id }}
                {{ Auth::id() }} --}}
                {{-- {{ $menu->id }} --}}
            </div>
        </form>
        {{-- <h1>test</h1> --}}
    @foreach($menu->comments as $item)
    <div class="comment">
        <p>{{ $item->comment }}</p>
        <!-- Display other comment attributes as needed -->
    </div>
    @endforeach


        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<script src="https://kit.fontawesome.com/8b26ab2638.js" crossorigin="anonymous"></script>
    </main>
    
    @if ($confirmation = Session::get('confirmation'))
    <script>
        var userConfirmation = confirm("{{ $confirmation }}");
        if (!userConfirmation) {
            // If the user cancels, prevent the form submission or take appropriate action
            // For example: document.getElementById('yourForm').reset();
        }
    </script>
@endif
    <script>
        function toggleEditForm(id) {
            document.getElementById(`ingredient_${id}`).style.display = 'none';
            document.getElementById(`amount_${id}`).style.display = 'none';
            document.getElementById(`place_${id}`).style.display = 'none';
            document.getElementById(`who_buy_${id}`).style.display = 'none';
            document.getElementById(`editForm_${id}`).style.display = 'block';
        }
    
        // function updateBuy(id) {
        //     console.log('Updating buy with ID:', id);
        //     // Implement AJAX or submit the form using JavaScript to update the record
        //     // You may use axios or fetch to send a request to the controller's update method
        //     // Handle the update logic in your BuyController
        //     // After updating, toggle back to displaying the original content
    
        //     // Example using fetch:
        //     fetch(`/buy/{id}`, {
        //         method: 'PUT',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //         },
        //         body: JSON.stringify({
        //             edited_ingredient: document.querySelector(`[name="edited_ingredient"]`).value,
        //             edited_amount: document.querySelector(`[name="edited_amount"]`).value,
        //             edited_place: document.querySelector(`[name="edited_place"]`).value,
        //             edited_who_buy: document.querySelector(`[name="edited_who_buy"]`).value,
        //         })
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         // Update the displayed content with the updated values
        //         document.getElementById(`ingredient_${id}`).innerText = data.ingredient;
        //         document.getElementById(`amount_${id}`).innerText = data.amount;
        //         document.getElementById(`place_${id}`).innerText = data.place;
        //         document.getElementById(`who_buy_${id}`).innerText = data.who_buy;
    
        //         // Toggle back to displaying the original content
        //         document.getElementById(`ingredient_${id}`).style.display = 'block';
        //         document.getElementById(`amount_${id}`).style.display = 'block';
        //         document.getElementById(`place_${id}`).style.display = 'block';
        //         document.getElementById(`who_buy_${id}`).style.display = 'block';
        //         document.getElementById(`editForm_${id}`).style.display = 'none';
        //         console.log('Update successful:', data);
        //     })
        //     .catch(error => console.error('Error:', error));
        // }
    </script>
</body>
</html>