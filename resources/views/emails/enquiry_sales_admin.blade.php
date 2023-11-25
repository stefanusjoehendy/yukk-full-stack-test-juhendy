<x-mail::message>
# Hi, Admins

<div>
    <h2>
    A Enquiry from Customer!
    </h2>
    <table class="table detail-table">
        <tr>
            <td>Name</td>
            <td> : </td>
            <td>{{$name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td> : </td>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> : </td>
            <td>{{$phone}}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td> : </td>
            <td>{{date("d M Y", strtotime($event_date))}}</td>
        </tr>        
        <tr>
            <td>Time</td>
            <td> : </td>
            <td>{{$event_time}}</td>
        </tr>        
        <tr>
            <td>Pax</td>
            <td> : </td>
            <td>{{number_format($total_pax)}}</td>
        </tr>
        <tr>
            <td>Budget</td>
            <td> : </td>
            <td>{{number_format($budget, 2, ',', '.')}}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td> : </td>
            <td>{{$special_request}}</td>
        </tr>
    </table>
</div>
<br>
<br>
{{-- <x-mail::button :url="'https://parador-hotels.com'">
Parador Event
</x-mail::button> --}}

Thanks,<br>
Parador Hotels & Resorts
{{-- {{ config('app.name') }} --}}
</x-mail::message>
