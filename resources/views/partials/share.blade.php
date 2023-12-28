@php
  $url             = isset($url) ? $url : get_the_permalink();
  $title           = isset($title) ? $title : get_the_title();
@endphp

<div class="social-media">
  <a href="https://www.facebook.com/sharer/sharer.php?u={!! rawurlencode($url) !!}" target="_blank" aria-label="Share on Facebook" rel="noopener nofollow">
    <i class="fab fa-facebook-f" aria-hidden="true"></i>
    <span>Facebook</span>
  </a>
  <a href="https://twitter.com/intent/tweet?text={!! rawurlencode($title) !!}%0A{!! rawurlencode($url) !!}" target="_blank" aria-label="Share on Twitter" rel="noopener nofollow">
    <i class="fab fa-twitter" aria-hidden="true"></i>
    <span>Twitter</span>
  </a>
  <a href="https://www.linkedin.com/shareArticle?mini=true&url={!! rawurlencode($url) !!}&title={{ urlencode($title) }}&source={{urlencode('AMJ')}}" aria-label="Share on LinkedIn" rel="noopener nofollow">
    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
    <span>LinkedIn</span>
  </a>
</div>
