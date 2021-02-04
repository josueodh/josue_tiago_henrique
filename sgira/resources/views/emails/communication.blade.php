@component('mail::message')
{!! $data['message'] !!}

Att. {{ $teacher->name }}<br>
@endcomponent
