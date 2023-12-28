<section @if ($anchor_id) id="{{ $anchor_id }}" @endif class="section
    text-image text-image--{{ $layout }} text-image--num-{{ $numbering ? 'true' : 'false' }}">
    <div class="row">
        <div class="column">
            <div class="text-image__inner">
                <div class="text-image__left">
                    <div class="text-image__left-container">
                        @if ($icon)
                            <div class="text-image__icon">
                                @include('globals.image',['image'=>$icon])
                            </div>
                            <br><br>
                        @endif
                        @if ($title)
                            <h2>{!! $title !!}</h2>
                        @endif
                        @if ($intro)
                            {!! $intro !!}
                        @endif
                        @if ($learn_more_button)
                            <br><br>
                            @include('globals.button',['button'=>$learn_more_button])
                        @endif
                    </div>
                </div>
                <div class="text-image__right">
                    <div class="text-image__image">
                        @if ($img)
                            @include('globals.image',['image'=>$img])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
