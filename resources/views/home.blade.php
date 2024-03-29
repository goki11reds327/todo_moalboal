@extends('layouts.head')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="flex-food">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>{{ __('You are logged in! ') }}</span>
                    <br><br>
                    <span>{{ __('After a few seconds,') }}</span>
                    <span>{{ __('it will transition to the menu list page!') }}</span>
                    <img src="{{ asset('/img/food-bag.png') }}" alt="" class="food-bag">
                </div>
    </div>
</div>
@endsection

<script>
    setTimeout(function() {
        window.location.href = "{{ route('menu.index') }}"; // 5秒後にメニュー一覧ページにリダイレクト
    }, 1500); // 5000ミリ秒 = 5秒
</script>
