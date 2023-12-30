@if($title || $text || $cta)
	<section class="section cta-block @if($footer_block) cta-block--footer @endif">
		<div class="row">
			<div class="column">
				<div class="cta-block__inner">
					@if($title)
						<h2 class="like-h3 cta-block__title">{!! $title !!}</h2>
					@endif
					@if($text)
						<div class="cta-block__text text-med">{!! $text !!}</div>
					@endif
					@if($cta)
						<div class="cta-block__cta">
							@include('globals.button',['button'=>$cta])
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>
@endif