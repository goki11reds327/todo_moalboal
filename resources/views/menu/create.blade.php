<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/posts.css">
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
        <form action="{{ route('menu.store') }}" method="POST"  enctype="multipart/form-data">
            <p>New To Buy List</p>
            @csrf
            <!-- 日付入力欄 -->
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>

            <!-- 料理名入力欄 -->
            <div>
                <label for="title">Menu:</label>
                <input type="title" id="title" name="title">
            </div>

            <!-- 写真投稿欄 -->
            <div>
                <label for="pre_image">Photo:</label>
                <input type="file" id="pre_image" name="pre_image" accept="img/*">
            </div>

            <!-- コメント記入欄 -->
            <div>
                <label for="content">Comment:</label>
                <textarea id="content" name="content" rows="4" cols="50"></textarea>
            </div>

            <!-- Addボタン -->
            <div class="add-button">
                <button id="addButton">Add</button>
            </div>
            
        </form>
    </main>
</body>