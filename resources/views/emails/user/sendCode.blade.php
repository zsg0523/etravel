@component('mail::message')


*** 您本次操作的验证码为：{{ $code }} ***

Thanks,<br>
{{ config('app.name') }}
@endcomponent
