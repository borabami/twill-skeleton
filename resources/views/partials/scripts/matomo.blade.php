@php
$site_id = TwillAppSettings::get('matomo.matomo.site_id');
$host =TwillAppSettings::get('matomo.matomo.host');
@endphp
@if ($site_id != null && $host != null)
<!--Start settings.iubenda.matomo Code-->
<script>
    var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//{{$host}}/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '{{$site_id}}']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End settings.iubenda.matomo Code -->
@endif