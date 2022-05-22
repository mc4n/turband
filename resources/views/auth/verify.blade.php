@extends('layouts.app')

@section('title', 'Email Doğrulama - Turband')
@section('subtitle', 'Email Doğrulama')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adresini doğrula') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir doğrulama linki email adresinize gönderilmiştir..') }}
                        </div>
                    @endif

                    {{ __('Evvela doğrulama linki için lütfen email adresinizi kontrol ediniz..') }}
                    {{ __('email ulaşmadı ise') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('başka bir tane almak için tıklayın') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
