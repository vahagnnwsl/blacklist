@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">ВНИМАНИЕ</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                        Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.
                        Если вы не получили письмо,
                        <a href="{{ route('verification.resend') }}">нажмите здесь,</a> чтобы запросить другое.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
