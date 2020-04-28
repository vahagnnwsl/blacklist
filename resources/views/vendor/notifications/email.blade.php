@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else

@endif
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
@else
    {{ ' ' }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
     "Для подтверждения  е-mail  адреса нажмите на кнопку \":actionText\" \n или пройдите по ссылке ниже",
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
        'displayableActionUrl' => $displayableActionUrl,
    ],
    'Если Вы не регистрировались на нашем сайте, то просто удалите это письмо: [:displayableActionUrl](:actionURL)'
)q
@endslot
@endisset
@endcomponent
