@component('mail::message')
# Email verification.

Welcome to our Platform.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
