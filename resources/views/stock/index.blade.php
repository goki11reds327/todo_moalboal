<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- stylesheet --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=archivo-black:400" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <header>
        {{-- <div class="self_image"><img src="{{ asset('storage/img/' . $user-> user_image) }}" alt=""></div> --}}
        {{-- <div class="display_btn">
            <a href="#" class="btn btn-gradient" onclick="showDiv(1)"><span>１日</span></a>
            <a href="#" class="btn btn-gradient" onclick="showDiv(3)"><span>３日</span></a>
            <a href="#" class="btn btn-gradient" onclick="showDiv(7)"><span>１週間</span></a>
        </div>
        <div class="new_post_btn">
            <a href="/stock/create" class="btn-gradient new-btn"><span>dexter</span></a>
        </div> --}}
    </header>

    <main>
        <div id="app" class="container">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>           
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>       
              </div>
            @endif
           
            <div class="stock_title">
                <p class="box title">
                    冷蔵庫のあまりものリスト
                </p>
            </div>
         
            <div class="item">
               
                <p class="box">
                    ★肉・魚・卵など
                </p>
                @foreach($stocks as $stock)
                    @if($stock->is_meat) 
                    <form method="POST" action="{{ route('stock.destroy', $stock->id) }}">
                        @method('delete')
                        @csrf
                        <div class="stock-item" id="stock-item-{{ $stock->id }}">
                        <div class="item-content"> 
                            <p class='text-center'>
                                <button onclick="deleteStockItem('{{ $stock->id }}')">×</button>
                                {{ $stock->あまりもの }}
                            </p>
                        </div>
                        </div>
                    </form>
                    @endif
                @endforeach
                   
                <div class="new_post_btn">
                                            
                </div>
                    
            </div>
        
            <div class="item">
                <p class="box">
                    ★野菜・果物など
                </p>
                @foreach($stocks as $stock)
                 @if($stock->is_fruit) 
                 <form method="POST" action="{{ route('stock.destroy',$stock->id) }}">
                    @method('delete')
                    @csrf
                    <div class="item-content" id="stock-item-{{ $stock->id }}"> 
                        <div class="item-content"> 
                        <p class='text-center'>
                            <button onclick="deleteStockItem('{{ $stock->id }}')">×</button>
                            {{ $stock->あまりもの }}</p>
                      </div>
                    
                </div>
              </form>    
                     @endif
                    @endforeach
                
               
              <div class="new_post_btn">
                <form action="{{ route('stock.store') }}" method="POST" id="form">
                    @csrf
                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h5 class="modal-title" id="staticBackdropLabel">Ingredient</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div>
                                        <label for="title">あまりもの:</label>
                                        <input type="title" id="title" name="title">
                                    </div>
                                    <div>
                                        <label for="category">Category:</label>
                                        <select name="category" id="category">
                                            <option value="1">meat/fish/egg</option>
                                            <option value="2">fruits and vegetables</option>
                                        </select>
                                    </div>     
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="submit()">Add</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        <div class=itembutton>
            <button type="button" class="box btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ＋アイテムの追加
            </button>
        </div>

        
    
        <script>
            function submit() {
                const form = document.getElementById('form')
                form.submit()
            }

            function addNewItem(category) {
                const inputId = category + 'Input';
                const newItem = document.getElementById(inputId).value;
                
                if (newItem.trim() !== '') {
                    const newItemElement = document.createElement('p');
                    newItemElement.textContent = newItem;
    
                    const categoryDiv = document.querySelector('.' + category);
                    categoryDiv.appendChild(newItemElement);
    
                    document.getElementById(inputId).value = ''; // 入力欄をクリア
                }
            }
            function submit() {
                const form = document.getElementById('form');
                form.submit();
            }

            // 追加: 投稿を削除する関数
            function deleteStockItem(stockItemId) {
                fetch('/stocks/' + stockItemId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('ネットワークの応答が正常でありません');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('投稿が正常に削除されました:', data);
                    document.getElementById('stock-item-' + stockItemId).remove();
                })
                .catch(error => {
                    console.error('投稿の削除エラー:', error);
                });
            }
        </script>
        

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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