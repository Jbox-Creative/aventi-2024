@if($title || $cards)
	<section class="section numbered-cards">
		<div class="row">
			<div class="column">
				<div class="numbered-cards__inner">
					@if($title)
						<h2 class="numbered-cards__title">
							{!! $title !!}
							@if($add_arrow)
								<span class="numbered-cards__arrow">↓</span>
							@endif
						</h2>
					@endif
					@if($cards)
						<div class="numbered-cards__grid">
							@foreach($cards as $card)
								<div class="numbered-cards__item">
									@if($card['title'])
										<h3 class="numbered-cards__item__title like-h5">{!! $card['title'] !!}</h3>
									@endif
									@if($card['text'])
										<div class="numbered-cards__item__text">{!! $card['text'] !!}</div>
									@endif
									@if($card['cta'])
										<div class="numbered-cards__item__cta">
											@include('globals.button',['button'=>$card['cta']])
										</div>
									@endif
								</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>
@endif