@component('mail::message')
    # Email Verification

    Hi {{ $user->name }}, klik tombol dibawah ini untuk memverifikasi email.

    @component('mail::button', ['url' => route('auth.verify-email', $user->email_verify_token->token)])
        Verifikasi Email
    @endcomponent

    Terima Kasih,<br>
    {{ config('app.name') }}
@endcomponent
