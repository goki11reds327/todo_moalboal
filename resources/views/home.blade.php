@extends('layouts.head')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="">
                <div class="center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>{{ __('You are logged in!') }}</span>
                    <img src="{{ asset('/img/food-bag.png') }}" alt="" class="food-bag">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
