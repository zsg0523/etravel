@component('mail::message')
# Introduction

Welcome !.

@component('mail::button', ['url' => 'http://etravel.test'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
