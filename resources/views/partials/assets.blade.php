@php
$favicon =strtok(TwillAppSettings::getGroupDataForSectionAndName('general', 'general')->image('favicon', 'default'), '?');
@endphp

@if($favicon)
<link rel="icon" type="image/x-icon" href="{{ $favicon }}">
@endif

{{-- Loads Inter --}}
@googlefonts

{{-- meta --}}
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta content="width=device-width, initial-scale=1" name="viewport">

@include('partials.scripts.cookie-solution')

{{-- css --}}
@vite('resources/css/app.css')

{{-- fonts --}}
<script src="https://kit.fontawesome.com/cea843e654.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">

{{-- google --}}
@include('partials.scripts.google_tag_manager_head')
@include('partials.scripts.ga')

@include('partials.scripts.matomo')