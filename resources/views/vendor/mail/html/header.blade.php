@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{-- {{ $slot }} --}}
{{-- <img src="https://sales.parador-hotels.com/favicon.ico" class="logo" alt="Logo Parador"> --}}
<img src="{{ env('MAIL_HEADER_LOGO')}}" class="logo" alt="Logo Parador">
@endif
</a>
</td>
</tr>
