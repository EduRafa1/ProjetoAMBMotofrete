$(function(){
		var open = true;
		var windowSize = $(window)[0].innerWidth;
		if (windowSize <= 768) {
			open = false;
	}
	$('i.bars').click(function(){
		if (open == true) {
			$('div.menu').animate({'width':'0','padding':'0'});
			$('header').animate({'width':'100%','left':'0'});
			$('main').animate({'width':'100%','left':'0'});
			open = false;
		}else if (open == false){
			$('div.menu').animate({'width':'250px','padding':'0'});
			$('header').animate({'left':'250px'}).css('width','calc(100% - 250px)');
			$('main').animate({'left':'250px'}).css('width','calc(100% - 250px)');
			open = true
		}
	})
})