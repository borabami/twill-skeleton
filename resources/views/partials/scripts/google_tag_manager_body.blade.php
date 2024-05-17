@php
$google_tag_manager_body = TwillAppSettings::get('google.google.google_tag_manager_body');
@endphp
@if ($google_tag_manager_body != '')
{!! $google_tag_manager_body !!}
@endif