@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Addresse bestätigen') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Sie erhalten in Kürze eine E-Mail.') }}
                        </div>
                    @endif

                    {{ __('Bitte sehen Sie in Ihrem Postfach nach.') }}
                    {{ __('Ansonsten -') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Starten Sie eine neue Anfrage') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
