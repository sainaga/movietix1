$(document).ready(function(){
	$(".dashboard section .card img").hover(function(){ //filter: blur(0px) brightness(0.5) grayscale(0%);
	    $(this).css({"filter":"blur(0px) brightness(0.5) grayscale(0%)","transition":"1s"}); 
	    $('.dashboard section .card-title').css({"color":"white","opacity":"1"}); 
	    }, function(){
	    	$(this).css({"filter":"blur(0px) brightness(1) grayscale(0%)","transition":"1s"});
	     $('.dashboard section .card-title').css({"color":"gray","opacity":"0.8"}); 
	});
	$(".dashboard section .card-title").hover(function(){
	//    $('.dashboard section img').css({"filter":" blur(0px) brightness(0.5) grayscale(0%)","transition":"1s"});
	     $('.dashboard section .card-title').css({"color":"white","opacity":"1"});
	    }, function(){
	  //   $('.dashboard section img').css({"filter":" blur(0px) brightness(1) grayscale(0%)","transition":"1s"});
	});

	$('.question').on("click", function() {
		//alert('awesome');
		$(this).siblings().toggle();
	});
});