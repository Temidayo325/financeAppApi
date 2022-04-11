@component('mail::message')
# Verify your account

Almost there {{ $name }} !<br>
You need to verify your email address to continue to ExpenseX. Your verification code to use is {{ $code }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
