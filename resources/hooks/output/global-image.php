<?php
if ( !function_exists('global_image') ) :

function global_image($image, $priority = false) {
  if (is_array($image) && isset($image['image']) && $image['image']):
    $image1x  = $image['image'] ? $image['image']['url'] : '';
    $imageAlt = $image['image'] ? $image['image']['alt'] : '';
    $isLazy   = is_admin() ? false : $image['lazy_load'];
    $lazyAttr = $isLazy ? 'lazy' : 'auto';
    $classes  = $isLazy ? 'class="lazyload"' : '';
    $retina   = $image['retina_version'];
    $image2x  = $retina ? ($image['image_2x'] ? $image['image_2x']['url'] : '') : '';
    $src_set  = $isLazy ? ' data-srcset="' : ' srcset="';
    $priority = isset($prio) ? $prio : false;
    $prio     = $priority ? 'fetchpriority="high" ' : '';
    ?>

  <img
    <?php 
    echo $prio;
    echo $classes;
    echo $isLazy ? ' data-' : '';
    echo 'src="'.$image1x.'"'.
    ' alt="'.$imageAlt.'"'.
    ' loading="'.$lazyAttr.'"';
    echo $retina == 1 ? $src_set.($image1x != '' ? $image1x.' 1x,' : '').($image2x != '' ? $image2x . ' 2x' : '').'"' : ''; ?>
  >

<?php
  endif;
}

endif;