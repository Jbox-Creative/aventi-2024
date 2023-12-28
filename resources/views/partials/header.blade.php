@php
  $logo           = get_field('logo','option'); 
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
          <a href="{{ home_url('/') }}" class="header__logo">
            @include('globals.image',['image'=>$logo])
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
