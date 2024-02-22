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
        <div class="new_post_btn">
            <a href="/posts" class="btn btn-gradient"><span>新規投稿</span></a>
        </div>
    </header>

    <main>
        <div id="app" class="container">
            <div class="item monday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item tuesday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item wednesday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item thursday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item thursday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item friday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item saturday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
            </div>
            <div class="item sunday">
                <a href="#">
                    <img src="{{ asset('img/pexels-cats-coming-674574.jpg') }}" alt="画像">
                    <p>○月△日（□）カレー</p>
                </a>
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