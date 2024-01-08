export default () => {
	const swipeThreshold = 20;

	$('.testimonial-carousel').each(function(){
		const slides = $(this).find('.testimonial-carousel__slide');

		// handle swiping
		let touchstartX = 0;
		let touchendX = 0;

		slides.on('touchstart',function(e){
			touchstartX = e.screenX || e.changedTouches[0].screenX;
		});

		slides.on('touchend',function(e){
			touchendX = e.screenX || e.changedTouches[0].screenX;
			const swipeDiff = Math.abs(touchstartX - touchendX);
			if (swipeDiff > swipeThreshold) {
				const carousel = $(this).closest('.testimonial-carousel');
				const currIndex = carousel.find('button.active').prevAll().length;
				const maxIndex = carousel.find('button').length - 1;
				let newIndex = currIndex;

				if (touchendX < touchstartX) {
					newIndex++;
					if(newIndex > maxIndex) {
						newIndex = 0;
					}
				}
				if (touchendX > touchstartX) {
					newIndex--;
					if(newIndex < 0) {
						newIndex = maxIndex;
					}
				}
				goToSlide(carousel,newIndex);
			}
		})
	});

	$('.testimonial-carousel__pagination button').on('click',function(){
		const index = $(this).prevAll().length;
		goToSlide($(this).closest('.testimonial-carousel'), index);
	});

	function goToSlide(carousel,index) {
		const slides = carousel.find('.testimonial-carousel__slide');

		// update active pagination
		carousel.find('.testimonial-carousel__pagination button').eq(index).addClass('active').siblings().removeClass('active');

		// update active slide
		slides.removeClass('active').eq(index).addClass('active');

		// update slide position
		slides.css('transform','translateX(-'+(index*100)+'%)');		
	}
}