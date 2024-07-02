@if (settings('seo.index', App\Enums\StatusEnum::Active->value) == App\Enums\StatusEnum::Passive->value)
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endif
@if (settings('seo.open_graph', App\Enums\StatusEnum::Active->value) != App\Enums\StatusEnum::Passive->value)
    <meta property="og:title" content="@yield('title', settings('general.title'))">
    <meta property="og:description" content="@yield('description', settings('general.description'))">
    <meta property="og:image" content="@yield('ogimage', $themeAsset->cover)">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ settings('general.title') }}">
    <meta property="og:type" content="website">
@endif
@if (settings('seo.twitter_card', App\Enums\StatusEnum::Active->value) != App\Enums\StatusEnum::Passive->value)
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', settings('general.title'))">
    <meta name="twitter:description" content="@yield('description', settings('general.description'))">
    <meta name="twitter:image" content="@yield('ogimage', $themeAsset->cover)">
@endif
@if (settings('seo.schema', App\Enums\StatusEnum::Active->value) != App\Enums\StatusEnum::Passive->value)
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{{ env("APP_URL") }}",
            "logo": "{{ $themeAsset->logo_dark }}",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "{{ settings("contact.phone") }}",
                "contactType": "customer service"
            }]
    }
    </script>
@endif
