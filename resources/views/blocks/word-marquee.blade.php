@if($words)
	<section class="section word-marquee" id="{{ $id }}">
		<div class="word-marquee__inner">
			@foreach($words as $word)
				<div class="word-marquee__word word-marquee__word--{{ $word['size'] }}">{!! $word['word'] !!}</div>
			@endforeach
		</div>
	</section>
@endif