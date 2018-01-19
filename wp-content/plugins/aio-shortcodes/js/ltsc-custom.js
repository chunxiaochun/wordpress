(function($) {

//Hide (Collapse) the toggle containers on load
	$(".ltt-toggler.closed .ltt-toggle-container").hide(); 
    $(".ltt-toggler.open .ltt-toggle-container").show();
    $(".ltt-toggler.open .ltt-trigger").addClass("active");

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$(".ltt-trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		return false; //Prevent the browser jump to the link anchor
	});
    
    
    /*slideshow*/
/* blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, none, scrollUp, scrollDown, scrollLeft, scrollRight, scrollHorz, scrollVert, shuffle, slideX, slideY, toss, turnUp, turnDown, turnLeft, turnRight, uncover, wipe, zoom */

$('#slideshow').cycle({
    fx:     'fade',
    next:   '#next', 
    prev:   '#prev'
});


})(jQuery);