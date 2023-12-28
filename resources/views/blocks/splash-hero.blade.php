<section class="section splash-hero splash-hero--{{ $layout }}">
  <div class="row">
    <div class="column">
      @if ($title || $text)
        <div class="splash-hero__content">
          @if ($title)
            <h1>{!! $title !!}</h1>
          @endif
          @if (isset($subtitle) && $subtitle)
            <h2 class="like-h4">{!! $subtitle !!}</h2>
          @endif
          @if ($text)
            <p>{!! $text !!}</p>
          @endif
          @if($links)
            <div class="splash-hero__list">
              @foreach($links as $key=>$item)
                <div class="splash-hero__item">
                  @include('globals.button',['button'=>$item['sh_link']])
                </div>
              @endforeach
            </div>
          @endif
          @if ($big_text)
            <h3 class="like-h4 splash-hero__big-text">{!! $big_text !!}</h3>
          @endif
          @if ($stats)
            <div class="splash-hero__stats">
              @foreach($stats as $key=>$item)
                <span>
                  <h4 class="splash-hero__stats-number">{{ $item['sh_stats_number'] }}</h4>
                  <h4 class="splash-hero__stats-heading">{{ $item['sh_stats_heading'] }}</h4>
                </span>
              @endforeach
            </div>
          @endif
          @if($layout == 'locations')
            <div class="template-locations__searchWrap">
              <label class="show-for-sr" for="location-finder">Location</label>
              <input class="template-locations__search" type="text" name="location-finder" id="location-finder" @if($placeholder)placeholder="{{ $placeholder }}"@endif>
              <i class="fas fa-arrow-right"></i>
            </div>
          @endif
        </div>
      @endif
    </div>
  </div>
  @if($image)
    <div class="splash-hero__image">
      @include('globals.image',['image'=>$image, 'classes'=> 'no-lazy', 'lazy'=>false, 'priority'=>'high'])
    </div>
  @endif
  @if (isset($locDetails) && is_array($locDetails))
    <div class="splash-hero__loc">
      <div class="row">
        <div class="column">
          <div class="splash-hero__loc__inner">
            <div class="splash-hero__loc__hours">
              @if($locDetails['hours'])
                <h2 class="like-h4">{{ __('Hours of Operation','aventi') }}</h2>
                @foreach($locDetails['hours'] as $time)
                  <p>
                    <span>{{ $time['label'] }}</span>
                    <span>{{ $time['value'] }}</span>
                  </p>
                @endforeach
              @endif
            </div>
            <div class="splash-hero__loc__info">
              <h2 class="like-h4">{{ __('Contact Info','aventi') }}</h2>
              @if($locDetails['address'])
                <p>{{ $locDetails['address']['address'] }}</p>
              @endif
              @if($locDetails['phone'] || $locDetails['email'])
                <p>
                  @if($locDetails['phone'])
                    <span><i class="fas fa-phone"></i> <a href="tel:{{ $locDetails['phone'] }}">{{ $locDetails['phone'] }}</a></span>
                  @endif
                  @if($locDetails['email'])
                    <span><i class="fas fa-envelope"></i> <a href="mailto:{{ $locDetails['email'] }}" target="_blank">{{ $locDetails['email'] }}</a></span>
                  @endif
                </p>
              @endif
            </div>
            <div class="splash-hero__loc__map">
              <div class="marker" data-lat="{{ $locDetails['address']['lat'] }}" data-lng="{{ $locDetails['address']['lng'] }}"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</section>
