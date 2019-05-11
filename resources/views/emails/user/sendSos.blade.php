@component('mail::message')


{{ $user->name }} 正在发起紧急求助，联系电话 {{ $user->phone }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
