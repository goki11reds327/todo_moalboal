<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <header>
        <div class="self_image"><img src="" alt=""></div>
        <div class="display_btn">
            <a href="#" class="btn btn-gradient" onclick="showDiv(1)"><span>１日</span></a>
            <a href="#" class="btn btn-gradient" onclick="showDiv(3)"><span>３日</span></a>
            <a href="#" class="btn btn-gradient" onclick="showDiv(7)"><span>１週間</span></a>
        </div>
    </header>

    <main>
        <div id="app" class="container">
            <div class="item monday">
                <p>月曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>
        
            <div class="item tuesday">
                <p>火曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>
        
            <div class="item wednesday">
                <p>水曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>

            <div class="item thursday">
                <p>木曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>

            <div class="item friday">
                <p>金曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>

            <div class="item saturday">
                <p>土曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>

            <div class="item sunday">
                <p>日曜日の買い物
                    <img src="{{ asset('pexels-clem-onojeghuo-175753.jpg') }}" alt="画像">
                </p>
            </div>

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