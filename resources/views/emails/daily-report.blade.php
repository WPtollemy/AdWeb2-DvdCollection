@component('mail::message')
# Introduction

Here are the todays new user count and dvd count.

New User Count:  {{ $dailyUsers }}<br>
Dvd Count:  {{ $dailyDvds }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
