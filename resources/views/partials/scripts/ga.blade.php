@php
$ga_id = TwillAppSettings::get('google.google.analytics_id');
@endphp
@if ($ga_id != null)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga_id  }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '{{ $ga_id }}');
</script>
@endif