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
    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
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
            <p class="day-number">{{ $menu->date }} </p>
            <p class="menu-title">{{ $menu->title }}</p>
            <div class="list-title">
                <p class="list-checkbox">☑︎</p>
                <p class="list-detail">内容</p>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach($buys as $buy)
                <div class="form-check buy-line">
                    {{-- 使ったboostrap https://getbootstrap.jp/docs/5.3/forms/checks-radios/ --}}
                    <div class="list-line">
                        <div>
                            <label class="form-check-label buylist-text" for="flexCheckDefault">
                                <input class="form-check-input" type="checkbox" value="完了確認" id="flexCheckDefault">
                            </label >          
                            <label for="">
                                <span class="list-title-text">必要具材</span>
                                <div class="ingredients dd" id="ingredient_{{ $buy->id }}">{{ $buy->ingredient }}</div>
                            </label>
                            <label for="">
                                <span class="list-title-text">買う量</span>
                                <div class="amount dd" id="amount_{{ $buy->id }}">{{ $buy->amount }}</div>
                            </label>
                            <label for="">
                                <span class="list-title-text">買う場所</span>
                                <div class='wherebuy dd' id="place_{{ $buy->id }}">{{ $buy->place }}</div>
                            </label>
                            <label for="">
                                <span class="list-title-text">買う人</span>
                                <div class='who_buy dd' id="who_buy_{{ $buy->id }}">{{ $buy->who_buy }}</div>
                            </label>
                        </div>
                        {{-- Edit Form --}}
                        <div id="editForm_{{ $buy->id }}" style="display: none;">
                            <form action="{{ route('buy.update', $buy->id) }}" method="post" >
                                @csrf
                                @method('put')
                                <input type="text" name="edited_ingredient" value="{{ $buy->ingredient }}">
                                <input type="text" name="edited_amount" value="{{ $buy->amount }}">
                                <input type="text" name="edited_place" value="{{ $buy->place }}">
                                <input type="text" name="edited_who_buy" value="{{ $buy->who_buy }}">
                                <button type="submit" class="mini-btn">更新</button>
                            </form>
                        </div>
                        <div class="btn-area">
                            <div class="destroy-btn gg-btn">
                                <form action="{{ route('buy.destroy', ['id' => $buy->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="mini-btn" type="submit" value="削除" onclick="return confirm('本当に削除しますか？')">
                                        削除
                                    </button>
                                </form>
                            </div style="padding:10px 40px">
                            {{-- Edit Button --}}
                            <div class="destroy-btn gg-btn">
                                <button class="mini-btn" onclick="toggleEditForm({{ $buy->id }})">編集</button>
                            </div style="padding:10px 40px">
                        </div>
                    </div>
                    <div>
                        <label for="">
                            <img class="food-image" src="{{ asset('storage/img/'.$buy->item_image)}}" alt="画像" >
                        </label>
                    </div>
                </div>  
            @endforeach
        </div>

        <form action="{{ route('buy.store') }}" method="post"  enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="post-box">          
                <input class="list-add add-ing" type="text" name="ingredient" placeholder="具材名" id="ingredientName">
                <input class="list-add" type="number" name="menu_id" value="{{ $menu->id }}" hidden>
                <input class="list-add" type="text" name="date" value="{{ $menu->date }}" hidden>
                <input class="list-add add-amount" type="text" name="amount" placeholder="必要量" id="amount">
                <input class="list-add add-where" type="text" name="place" placeholder="買う場所" id="place">
                <input class="list-add add-who" type="text" name="who_buy" placeholder="買う人" id="who_buy">
                <input class="list-add-file" type="file" name="item_image" id="item_image" placeholder="具材イメージ" accept="img/*">
                <button disabled type="submit" class="submit-btn gg-btn add-btn" id="add_btn">＋必要具材追加</button>
            </div>
        </form>
        <div class="comment-box">
            <p class="comment-title">伝言</p>
            @foreach($menu->comments as $item)
                <div class="comment">
                    <p class="self">{{ $item->comment }}</p>
                </div>
            @endforeach
        </div>
        <form action="{{ route('postComment') }}" method="post">
            @csrf
            <div class="comment-post-box">
                <input type="text" name="comment" placeholder="伝言">
                {{-- <input type="number" name="user_id" value="{{ Auth::id() }}" hidden> --}}
                <input type="number" name="menu_id" value="{{ $menu->id }}" hidden>
                <button class="add-btn" type="submit" class="submit-btn">comment</button>
                {{-- {{ $menu->id }}
                {{ Auth::id() }} --}}
                {{-- {{ $menu->id }} --}}
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


    <div class=""> 
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        <!-- 他の要素の表示 -->
    </div>
    
    <div id="question" style="display: none">
        <p>This ingredient already exists. Are you sure you want to buy more?</p>
        <button onclick="isYes()">yes</button>
        <button>no</button>
    </div>
  
    
    </main>
    {{-- <form id="buyForm" method="post" action="{{ route('buy.store') }}">
        @csrf
        <!-- other form fields... -->
    
        @if ($confirmation = Session::get('confirmation'))
            <script>
                var userConfirmation = confirm("{{ $confirmation }}");
                if (userConfirmation) {
                    // Create a hidden input element and append it to the form
                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'user_confirmation';
                    hiddenInput.value = 'yes';
                    document.getElementById('buyForm').appendChild(hiddenInput);
                }
            </script>
        @endif
    
        <button type="submit">Add Ingredient</button>
    </form> --}}
    

<script src="https://kit.fontawesome.com/8b26ab2638.js" crossorigin="anonymous"></script>
    </main>
    
    @if ($confirmation = Session::get('confirmation'))

        <script>

            const myForm = document.getElementById('myForm')
            const submitBtn = document.getElementById('submitBtn')
            function isYes() {
                const question = document.getElementById('question')

                console.log('fuck')
                question.style.display = 'block'
                submitBtn.type = 'submit';
                myForm.submit()
            }

            function checkData(event) {
                event.preventDefault()
                const ingredientName = document.getElementById('ingredientName').value
                const question = document.getElementById('question')
                $.ajax({
                    type: 'GET',
                    url: "{{ route('ingredient') }}",
                    data: {
                        ingredient: ingredientName
                    },
                    success: function( data ) {
                        console.log(data)
                        if(data == 1) question.style.display = 'block'
                        else isYes()
                    },
                    error: function(xhr, status, error) {
                        // check status && error
                        console.log('error')
                    },
                    });
            }


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
    @endif
    <script>
        const item_image = document.getElementById('item_image')
        const add_btn = document.getElementById('add_btn')
        const ingredientName = document.getElementById('ingredientName')
        const amount = document.getElementById('amount')
        const place = document.getElementById('place')
        const who_buy = document.getElementById('who_buy')

        if(who_buy != null && place != null && amount != null && ingredientName != null){
            add_btn.disabled = false;
        }
        
        // function handleImageChange(event) {
        //     add_btn.disabled = false;
        // }
    </script>
</body>
</html>