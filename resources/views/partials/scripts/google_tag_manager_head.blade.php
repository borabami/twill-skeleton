@php
$google_tag_manager_head = TwillAppSettings::get('google.google.google_tag_manager_head');
@endphp
@if ($google_tag_manager_head != '')
{!! $google_tag_manager_head !!}
@endif