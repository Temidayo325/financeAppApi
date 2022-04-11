@component('mail::message')
# Forgot password

Seems you forgot your password. use this code to verify that it is indeed you who initiated this process<br>
And if you are not the one who initiated this process, kindly send us a mail to freeze all processes for a while

Thanks,<br>
{{ config('app.name') }}
@endcomponent
