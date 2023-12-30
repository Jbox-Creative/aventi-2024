@php
  $logo           = get_field('logo','option'); 
  $logo_inverse   = get_field('logo_inverse','option');
  $menu           = wp_nav_menu([ 'theme_location' => 'header_navigation', 'echo' => false ]);
  $search_icon    = get_field('search_icon','option');
  $search_form    = get_search_form([ 'echo' => false ]);
  $header_button  = get_field('header_button','option');
@endphp

<header class="header">
  <div class="row">
    <div class="column">
      <div class="header__inner">
        @if($logo)
          <a href="{{ home_url('/') }}" class="header__logo" aria-label="Go to Home page">
            @include('globals.image',['image'=>$logo])
            @if($logo_inverse)
              @include('globals.image',['image'=>$logo_inverse])
            @endif
          </a>
        @endif
        @if($menu)
          <div class="header__menu">
            {!! $menu !!}
          </div>
        @endif
        <div class="header__aside">
          <div class="header__search">
            @if($search_icon)
              <div class="header__search__trigger">
                @include('globals.image',['image'=>$search_icon])
              </div>
              <div class="header__search__input">
                {!! $search_form !!}
              </div>
            @endif
          </div>
          <button class="header__menu-toggle" aria-label="Expand Navigation Menu" aria-expanded="false">
            <span class="top"></span>
            <span class="mid"></span>
            <span class="bottom"></span>
          </button>
          @if($header_button)
            <div class="header__button">
              @include('globals.button',['button'=>$header_button])
            </div>
          @endif
        </div>
      </div>      
    </div>
  </div>
</header>
