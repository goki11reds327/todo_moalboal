<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit - To Buy List </title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/posts.css">
</head>
<body>
    <header>
        {{-- <div class="self_image"><img src="{{ asset('storage/img/' . $user-> user_image) }}" alt=""></div> --}}
    </header>

<main>
    <form action="{{ route('menu.update',$menu->id) }}" method="POST">
        @csrf
        @method('put')
        <!-- 日付入力欄 -->
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" value="{{ $menu->date }}" name="date">
        </div>

        <!-- 料理名入力欄 -->
        <div>
            <label for="title">Menu:</label>
            <input type="title" id="title" value="{{ $menu->title }}" name="title">
        </div>

        <!-- 写真投稿欄 -->
        <div>
            <label for="pre_image">Photo:</label>
            <img src="{{ asset('storage/img/'.$menu->pre_image)}}" alt="画像" >
            <input type="file" id="pre_image" name="pre_image" value="{{ $menu->pre_image }}" accept="image/*">
        </div>

        <!-- コメント記入欄 -->
        <div>
            <label for="content">Comment:</label>
            <textarea id="content" name="content" rows="4" cols="50">{{ $menu ->content }}</textarea>
        </div>

        <!-- updateボタン -->
        <div>
            <button id="addButton">update</button>
        </div>        
    </form>
</main>