@component('mail::message')

# Hi , {{$email}}
You are receiving this email because we received a password reset request for your account.
Please click below button to reset your password 


@component('mail::button', ['url' => 'http://127.0.0.1:8000/en/reset/'.$token])
استعاده كلمة المرور

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

