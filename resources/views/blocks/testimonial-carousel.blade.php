@if($title || $testimonials)
	<section class="section testimonial-carousel">
		<div class="row">
			<div class="column">
				<div class="testimonial-carousel__inner">
					@if($title)
						<h2 class="testimonial-carousel__title like-h4">{!! $title !!}</h2>
					@endif
					@if($testimonials)
						<div class="testimonial-carousel__slides">
							@foreach($testimonials as $slide)
								<div class="testimonial-carousel__slide">
									@if($slide['author_image'])
										<div class="testimonial-carousel__slide__image">
											@include('globals.image',['image'=>$slide['author_image']])
										</div>
									@endif
									@if($slide['quote'])
										<div class="testimonial-carousel__slide__content">
											<p class="testimonial-carousel__slide__content__quote">{!! $slide['quote'] !!}</p>
											@if($slide['author'])
												<div class="testimonial-carousel__slide__content__author">{!! $slide['author'] !!}</div>
											@endif
											@if($slide['author_byline'])
												<div class="testimonial-carousel__slide__content__byline">{!! $slide['author_byline'] !!}</div>
											@endif
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