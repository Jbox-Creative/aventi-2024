@php
  $logo               = get_field('logo_inverse','option');
  $footer_cta_text    = get_field('footer_cta_text','option');
  $footer_cta_button  = get_field('footer_cta_button','option');
  $menu               = wp_nav_menu([ 'theme_location' => 'footer_navigation', 'echo' => false ]);
  $social_media       = get_field('social_media','option');
  $utility_links      = get_field('utility_links','option');
  $copyright_text     = get_field('copyright_text','option');
@endphp

<footer class="footer">
  <div class="row">
    <div class="column">
      <div class="footer__inner">
        <a href="{{ home_url('/') }}" class="footer__logo">
          @include('globals.image',['image'=>$logo])
        </a>
        <div class="footer__middle">
          <div class="footer__cta">
            @if($footer_cta_text) 
              <p>{!! $footer_cta_text !!}</p>
            @endif
            @if($footer_cta_button)
              @include('globals.button',['button'=>$footer_cta_button])
            @endif
          </div>
          <div class="footer__menus">
            {!! $menu !!}
          </div>
        </div>
        <div class="footer__bot">
          @if($social_media)
            <div class="footer__social">
              @foreach($social_media as $link)
                <a href="{{ $link['link'] }}" target="_blank" aria-label="Aventi Social Media - Go to {{ $link['link'] }}">
                  @include('globals.image',['image'=>$link['image']])
                </a>
              @endforeach
            </div>
          @endif
          @if($utility_links)
            <div class="footer__utility-links">
              @foreach($utility_links as $link)
                <a href="{{ $link['link'] }}">{!! $link['text'] !!}</a>
              @endforeach          
            </div>
          @endif
          <div class="footer__copyright">&copy; {{ date('Y') }} {!! $copyright_text !!}</div>
        </div>
      </div>
    </div>
  </div>
</footer>
