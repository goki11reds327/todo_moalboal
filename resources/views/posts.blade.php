<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/posts.css">
</head>
<body>
    <header>
        <div class="self_image"><img src="" alt=""></div>

    </header>

    <main>
        <!-- 日付入力欄 -->
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
        </div>

        <!-- 写真投稿欄 -->
        <div>
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
        </div>

        <!-- コメント記入欄 -->
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
        </div>

         <!-- Addボタン -->
         <div>
            <button id="addButton">Add</button>
        </div>
    </main>