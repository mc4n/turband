@extends('layouts.app')

@section('title', 'Email Dogrulama - Turban')
@section('subtitle', 'Email Dogrulama')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adresini dogrula') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir dogrulama link email adresinize gonderilmistir..') }}
                        </div>
                    @endif

                    {{ __('Evvela dogrulama linki icin lutfen email adresinizi kontrol ediniz..') }}
                    {{ __('email ulasmadi ise') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('baska bir tane almak icin tiklayin') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
