@component('mail::message')
# Reset your password

This link will expire in 1h, if you

@component('mail::button', ['url' => env('MIX_APP_URL') . '/#/reset-password/' . $token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
