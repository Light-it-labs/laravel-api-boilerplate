@component('mail::message')
Please use the following link to <a href="{{ config('app.client_url') . '/password/reset/' . $token }}">reset your password</a>.
<br><br>
If you did not request this password change please feel free to ignore it.

Regards,
{{ config('app.name') }}

@component('mail::subcopy')
If you’re having trouble clicking the button, copy and paste the URL below
into your web browser: {{ config('app.client_url') . '/password/reset/' . $token }}
@endcomponent

@endcomponent
