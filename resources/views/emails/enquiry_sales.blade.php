<x-mail::message>
# Hi, {{ $title }}. {{ Str::upper($name) }}

Just to let you know — we've received your Enquiry Request, and it is now being processed.

{{-- <x-mail::button :url="'https://parador-hotels.com'">
Parador Event
</x-mail::button> --}}

Thanks,<br>
Parador Hotels & Resorts
{{-- {{ config('app.name') }} --}}
</x-mail::message>
