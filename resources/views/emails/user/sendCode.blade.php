@component('mail::message')


您本次操作的驗證碼為：{{ $code }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
