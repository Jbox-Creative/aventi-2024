<section class="section team-grid" id="{{ $id }}">
	<div class="row">
		<div class="column">
			<div class="team-grid__inner">
				@if($title)
					<h2 class="like-h4 text-center team-grid__title">{!! $title !!}</h2>
				@endif
				<div class="team-grid__grid">
					@foreach($team_members as $member)
						@php
							$name = get_the_title($member);
							$pos = get_field('position', $member);
							$linked_in = get_field('linkedin_url',$member);
							$image_colour = get_field('colour_pic', $member);
							$image_bw = get_field('bw_pic', $member);
							$gradientVals = get_field('hover_gradient', $member);
							$hasGradient = isset($gradientVals['bottom_colour']) && isset($gradientVals['top_colour']);
							$gradient = $hasGradient ? 'linear-gradient(0deg, '.$gradientVals['bottom_colour'].' 0%, '.$gradientVals['top_colour'].' 100%)' : false;
							$specialties = get_field('specialties', $member);
							$interests = get_field('interests', $member);
							$bio = get_field('bio', $member);
						@endphp
						<div class="team-grid__member" tabindex="-1">
							<div class="team-grid__member__image">
								@if($gradient)
									<div class="team-grid__member__image__gradient" style="background: {{ $gradient }}"></div>
								@endif
								@if($image_colour)
									@include('globals.image',['image'=>$image_colour])
								@endif
								@if($image_bw)
									@include('globals.image',['image'=>$image_bw])
								@endif
							</div>
							<div class="team-grid__member__info">
								<div class="team-grid__member__info__left">
									<span>{!! $name !!}</span>
									@if($pos)
										<span>{!! $pos !!}</span>
									@endif
								</div>
								@if ($linked_in)
									<div class="team-grid__member__info__right">
										<a href="{{ $linked_in }}" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
												<path d="M20.35 0H1.65C0.6875 0 0 0.6875 0 1.65V20.4875C0 21.3125 0.6875 22 1.65 22H20.35C21.175 22 22 21.3125 22 20.35V1.65C22 0.6875 21.3125 0 20.35 0ZM6.4625 18.7H3.3V8.25H6.4625V18.7ZM4.95 6.7375C3.9875 6.7375 3.025 5.9125 3.025 4.95C3.025 4.4 3.1625 3.9875 3.575 3.575C3.9875 3.1625 4.4 3.025 4.95 3.025C5.9125 3.1625 6.7375 3.9875 6.7375 4.95C6.7375 5.9125 5.9125 6.7375 4.95 6.7375ZM18.8375 18.7H15.675V13.475C15.675 12.2375 15.675 10.725 14.025 10.725C12.375 10.725 12.1 12.1 12.1 13.475V18.7H8.6625V8.25H11.6875V9.625C12.375 8.525 13.6125 7.8375 14.85 7.975C18.15 7.975 18.7 10.175 18.7 12.925V18.7H18.8375Z" fill="#151B22"/>
											</svg>
										</a>
									</div>
								@endif
							</div>
							<div class="team-grid__member__modal">
								<div class="team-grid__member__modal__close">
									<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
										<path d="M24.1111 9.88889L16.9999 17M16.9999 17L9.88889 24.111M16.9999 17L24.1111 24.1111M16.9999 17L9.88889 9.88901M33 17C33 25.8366 25.8366 33 17 33C8.16344 33 1 25.8366 1 17C1 8.16344 8.16344 1 17 1C25.8366 1 33 8.16344 33 17Z" stroke="#5E7473"/>
									</svg>
								</div>
								<div class="team-grid__member__modal__inner">
									<div class="team-grid__member__modal__left">
										<div class="team-grid__member__modal__image">
											@if($gradient)
												<div class="team-grid__member__modal__image__gradient" style="background: {{ $gradient }}"></div>
											@endif
											@if($image_colour)
												@include('globals.image',['image'=>$image_colour])
											@endif
										</div>
										@if ($linked_in)
											<div class="team-grid__member__modal__linkedin">
												<a href="{{ $linked_in }}" target="_blank">
													<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
														<path d="M20.35 0H1.65C0.6875 0 0 0.6875 0 1.65V20.4875C0 21.3125 0.6875 22 1.65 22H20.35C21.175 22 22 21.3125 22 20.35V1.65C22 0.6875 21.3125 0 20.35 0ZM6.4625 18.7H3.3V8.25H6.4625V18.7ZM4.95 6.7375C3.9875 6.7375 3.025 5.9125 3.025 4.95C3.025 4.4 3.1625 3.9875 3.575 3.575C3.9875 3.1625 4.4 3.025 4.95 3.025C5.9125 3.1625 6.7375 3.9875 6.7375 4.95C6.7375 5.9125 5.9125 6.7375 4.95 6.7375ZM18.8375 18.7H15.675V13.475C15.675 12.2375 15.675 10.725 14.025 10.725C12.375 10.725 12.1 12.1 12.1 13.475V18.7H8.6625V8.25H11.6875V9.625C12.375 8.525 13.6125 7.8375 14.85 7.975C18.15 7.975 18.7 10.175 18.7 12.925V18.7H18.8375Z" fill="#151B22"/>
													</svg>
												</a>
											</div>
										@endif
										@if(is_array($specialties) && !empty($specialties))
											<div class="team-grid__member__modal__sideItems">
												<span>Specialties</span>
												@foreach($specialties as $item)
													<span>{!! $item['specialty'] !!}</span>
												@endforeach
											</div>
										@endif
										@if(is_array($interests) && !empty($interests))
											<div class="team-grid__member__modal__sideItems">
												<span>Interests</span>
												@foreach($interests as $item)
													<span>{!! $item['interest'] !!}</span>
												@endforeach
											</div>
										@endif
									</div>
									<div class="team-grid__member__modal__right">
										<span>{!! $name !!}</span>
										@if($pos)
											<span>{!! $pos !!}</span>
										@endif
										<div class="team-grid__member__modal__bio">{!! $bio !!}</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="team-grid__modalWrap"></div>
</section>