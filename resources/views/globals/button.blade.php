@php
  $btn_text_arr = explode(' ', $button['button_text']);
  $last_word = array_pop($btn_text_arr);
  $button_text = $button['button_style'] == 'arrow' ? implode(' ',$btn_text_arr) : $button['button_text'];
@endphp

@if(isset($pseudoButton) && $pseudoButton)
  <span class="aventi-btn aventi-btn--{{ $button['button_style'] }}"><span class="link-inner">{!! $button_text !!} @if( $button['button_style'] == 'arrow' )<span class="link-end">{{ $last_word }} →</span>@endif</span></span>
@else
  @if ($button['button_text'] && $button['button_link'])
    <a class="aventi-btn aventi-btn--{{ $button['button_style'] }}" @if(isset($button['open_url_in_new_tab']) && $button['open_url_in_new_tab']) target="_blank" rel="nofollow" @endif href="{{ $button['button_link'] }}"><span class="link-inner">{!! $button_text !!} @if( $button['button_style'] == 'arrow' )<span class="link-end">{{ $last_word }} →</span>@endif</span></a>
  @endif
@endif

