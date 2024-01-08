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
							@foreach($testimonials as $key=>$slide)
								<div class="testimonial-carousel__slide @if($key == 0) active @endif">
									@if($slide['author_image'])
										<div class="testimonial-carousel__slide__image">
											@include('globals.image',['image'=>$slide['author_image']])
										</div>
									@endif
									@if($slide['quote'])
										<div class="testimonial-carousel__slide__content">
											<svg width="39" height="26" viewBox="0 0 39 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path id="icon_Quote" fill-rule="evenodd" clip-rule="evenodd" d="M15.4455 0L9.26733 11.8993H17.3762V26H0V11.8993L6.17822 0H15.4455ZM37.0693 0L30.8911 11.8993H39V26H21.6238V11.8993L27.802 0H37.0693Z" fill="#151B22"/>
											</svg>
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
						<div class="testimonial-carousel__pagination">
							@foreach($testimonials as $key=>$slide)
								<button @if($key==0) class="active" @endif></button>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>
@endif