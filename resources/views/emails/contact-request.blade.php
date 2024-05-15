@component('mail::message')

{{ __('Hi,')}}

{{ __('A new contact form request has been registered') }}

<x-mail::panel>
    <ul>
        @foreach($form_data as $key => $value)
        <li><strong>{{ ucwords(str_replace('-', ' ', $key)) }}:</strong> {{ $value }}</li>
        @endforeach
    </ul>
</x-mail::panel>

@endcomponent