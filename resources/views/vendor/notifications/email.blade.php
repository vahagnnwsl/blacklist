@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@endif


{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@endif


{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Для подтверждения  е-mail  адреса нажмите на кнопку \":actionText\" или пройдите по ссылке ниже  <br>
     [:displayableActionUrl](:actionURL) <br>  Если Вы не регистрировались на нашем сайте, то просто удалите это письмо.",
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
        'displayableActionUrl' => $displayableActionUrl,
    ]
)
@endslot
@endisset
@endcomponent
