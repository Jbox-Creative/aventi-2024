<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript">
    var googURL = "https://maps.googleapis.com/maps/api/js?key={{ get_field('google_key','option') }}&libraries=places";
  </script>
  <link href="@asset('fonts/poppins-v9-latin-regular.woff2')" rel="preload" as="font" type="font/woff2" crossorigin>
  <link href="@asset('fonts/poppins-v9-latin-500.woff2')" rel="preload" as="font" type="font/woff2" crossorigin>
  <link href="@asset('fonts/poppins-v9-latin-600.woff2')" rel="preload" as="font" type="font/woff2" crossorigin>
  @php wp_head() @endphp
  @if(get_field('head_code','option'))
    {!! get_field('head_code','option') !!}
  @endif
  @if(is_singular('location'))
    @php
      $address  = get_field('address');
      $phone    = get_field('phone');
      $link     = get_the_permalink();
      $image    = get_the_post_thumbnail_url();
    @endphp
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        @if($image)
          "image": "{{ $image }}",
        @endif
        "@id": "{{ $link }}",
        "name": "{{ get_the_title() }}",
        @if($address)
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $address['name'] }}",
            "addressLocality": "{{ $address['state'] }}",
            "addressRegion": "{{ $address['state_short'] }}",
            "postalCode": "{{ $address['post_code'] }}",
            "addressCountry": "{{ $address['country_short'] }}"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": {{ $address['lat'] }},
            "longitude": {{ $address['lng'] }}
          },
        @endif
        "url": "{{ $link }}",
        "priceRange": "$$",
        "telephone": "{{ $phone }}"
      }
    </script>
  @endif
  @if(is_page_template('views/template-faq.blade.php'))
    @php
      $sections = get_field('sections');
    @endphp
    @if ($sections)
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
          @foreach ($sections as $section)
            @foreach ($section['faqs'] as $faq)
              @php
                $question = get_field('question',$faq);
                $answer   = get_field('answer',$faq);
              @endphp
              @if($question && $answer)
                {
                  "@type": "Question",
                  "name": "{!! $question !!}",
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{!! addslashes($answer) !!}"
                  }
                }@if(!$loop->last || !$loop->parent->last),@endif
              @endif
            @endforeach
          @endforeach
        ]
      }
      </script>
    @endif
  @endif
</head>
