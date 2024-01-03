<section class="section text-image" id="{{ $id }}">
    <div class="row">
        <div class="column">
            <div class="text-image__inner text-image__inner--{{ $layout }}">
                <div class="text-image__left">
                    @if ($title)
                        <h2 class="like-h3 text-image__title">{!! $title !!}</h2>
                    @endif
                    @if ($intro)
                        <div class="text-image__text">
                            {!! $intro !!}
                        </div>
                    @endif
                    @if ($learn_more_button)
                        <div class="text-image__btn">
                            @include('globals.button',['button'=>$learn_more_button])
                        </div>
                    @endif
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
