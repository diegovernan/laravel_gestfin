@component('mail::message')

Obrigado por se registrar! Por favor, confirme seu e-mail no botão abaixo.

@component('mail::button', ['url' => $url])
Confirmar e-mail
@endcomponent


Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent