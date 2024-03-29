@extends('layouts.head')

@section('content')


<div class="empty">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        <div class="card-header">・{{ __('Register') }}・</div>
        @csrf
        <div class="row mb-3">
            <label for="name" class="">{{ __('Name') }}</label>
            <div class="">
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="">{{ __('Email Address') }}</label>
            <div class="">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="user_image" class="">{{ __('プロフィール画像') }} <span class="small">（サイズは1024kbyteまで）</span></label>
            <div class="">
                <input id="user_image" type="file" class="@error('user_image') is-invalid @enderror" name="user_image">
                @error('user_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="">{{ __('Password') }}</label>
            <div class="">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
            <div class="">
                <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="flex">
            <div class="row">
                <button type="submit" class="push">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

