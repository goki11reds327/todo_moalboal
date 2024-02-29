<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/buy.css') }}">
</head>
<body>
            
    @foreach($comments as $comment)
    <div class="tweet-box">
        <a href="{{ route('comment', [$comment->user->id])}}"><img src="{{ asset('storage/images/'.$comment->user->image) }}" alt=""></a>
        <div>{{ $comment->comment }}</div>
        <div class="destroy_btn">
            @if($comment->user_id == Auth::user()->id)
            <form action="{{ route('destroyComment', [$comment->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除">
            </form>
            @endif
        </div>
    </div>
    @endforeach
    {{-- {{ $comments->links() }} --}}

    <form action="{{ route('comment') }}" method="post">
        @csrf
        <div class="post-box">
            <input type="text" name="comment" placeholder="伝言">
            <button type="submit" class="submit-btn">comment</button>
        </div>
    </form>
</body>
</html>
