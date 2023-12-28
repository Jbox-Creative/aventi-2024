@php
  $btn_text_arr = explode(' ', $button['button_text']);
  $last_word = array_pop($btn_text_arr);
  $button_text = $button['button_style'] == 'arrow' ? implode(' ',$btn_text_arr) : $button['button_text'];
@endphp

@if(isset($pseudoButton) && $pseudoButton)
  <span class="aventi-btn aventi-btn--{{ $button['button_style'] }}">{!! $button_text !!} @if( $button['button_style'] == 'arrow' )<span class="link-end">{{ $last_word }} <i class="fas fa-arrow-right"></i></span>@endif</span>
@else
  @if ($button['button_text'] && $button['button_link'])
    <a class="aventi-btn aventi-btn--{{ $button['button_style'] }}" @if(isset($button['open_url_in_new_tab']) && $button['open_url_in_new_tab']) target="_blank" rel="nofollow" @endif href="{{ $button['button_link'] }}">{!! $button_text !!} @if( $button['button_style'] == 'arrow' )<span class="link-end">{{ $last_word }} <i class="fas fa-arrow-right"></i></span>@endif</a>
  @endif
@endif

