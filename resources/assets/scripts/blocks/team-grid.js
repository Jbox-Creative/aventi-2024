export default () => {
	$('.team-grid__member').on('mouseenter',function(){
		$(this).addClass('hover');
	}).on('mouseleave',function(){
		$(this).removeClass('hover');
	}).on('click',function(e){
		if ($(e.target).hasClass('team-grid__member__modal') || $(e.target).closest('.team-grid__member__modal').length) {
			// clicked inside modal
			if ($(e.target).hasClass('team-grid__member__modal__close') || $(e.target).closest('.team-grid__member__modal__close').length) {
				$('.team-grid__modalWrap').fadeOut();
				$('.team-grid__member__modal:visible').fadeOut();
			}
		} else {
			// activate modal
			$(this).addClass('active');
			$(this).find('.team-grid__member__modal').fadeIn();
			$(this).closest('.team-grid').find('.team-grid__modalWrap').fadeIn();
		}
	});

	$('.team-grid__modalWrap').on('click',function(){
		$(this).fadeOut();
		$('.team-grid__member.active').removeClass('active');
		$('.team-grid__member__modal:visible').fadeOut();
	})
}