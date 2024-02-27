@extends('layouts.head')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="flex">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>{{ __('You are logged in! After a few seconds, it will transition to the menu list page') }}</span>
                    <img src="{{ asset('/img/food-bag.png') }}" alt="" class="food-bag">
                </div>
    </div>
</div>
@endsection

<script>
    setTimeout(function() {
        window.location.href = "{{ route('menu.index') }}"; // 5秒後にメニュー一覧ページにリダイレクト
    }, 5000); // 5000ミリ秒 = 5秒
</script>
