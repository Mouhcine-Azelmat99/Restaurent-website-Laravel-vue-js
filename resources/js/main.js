
$("#login_show").click(function(){
	$("#login_form").show();
	$("#register_form").hide();
	$("#list_login").addClass("active");
	$("#list_register").removeClass("active");
});
$("#register_show").click(function(){
	$("#login_form").hide();
	$("#register_form").show();
	$("#list_login").removeClass("active");
	$("#list_register").addClass("active");
});
$("#search_show").click(function(){
	$("#search").fadeIn("slow");
	$("#search_hide").fadeIn();
	$(this).hide();
  });
$("#search_hide").click(function(){
	$("#search").fadeOut("slow");
	$("#search_show").fadeIn();
	$(this).hide();
  });
$("#show").click(function(){
	$("#hide").fadeIn("slow");
	$(this).hide();
  });
  $("#hide").click(function(){
	  $("#show").fadeIn("slow");
	  $(this).hide();
	});
  
// $(document).ready(function() {
//     $("#trend_menu").owlCarousel({
//         itemsDesktop:[1199,3],
//         itemsDesktopSmall:[980,2],
//         itemsMobile : [600,1],
//         navigation:true,
//         navigationText:["",""],
//         pagination:true,
//         autoPlay:true,
// 		autoplayHoverPause: true,
// 		items: 3,
// 		loop: true,
// 		center: false,
// 		mouseDrag: false,
// 		margin: 0,
// 		stagePadding: 0,
// 		merge: false,
// 		mergeFit: true,
// 		autoWidth: false,
// 		startPosition: 0,
//         touchDrag: true,
//         mouseDrag: true,
// 		responsive: {
// 			0: {
// 				items: 1
// 				// nav: true
// 			},
// 			480: {
// 				items: 1,
// 				nav: false
// 			},
// 			768: {
// 				items: 2,
// 				// nav: true,
// 				loop: false
// 			},
// 			992: {
// 				items: 4,
// 				// nav: true,
// 				loop: false
// 			}
// 		},
// 		responsiveRefreshRate: 200,
// 		responsiveBaseElement: window,
//     });
// });

// $(document).ready(function() {
//     $("#testmonial").owlCarousel({
//         // itemsDesktop:[1199,3],
//         // itemsDesktopSmall:[980,2],
//         // itemsMobile : [600,1],
//         navigation:true,
//         navigationText:["",""],
//         pagination:true,
//         autoPlay:true,
// 		autoplayTimeout:1000,
// 		autoplayHoverPause: true,
// 		loop: true,
// 		center: false,
// 		mouseDrag: false,
// 		margin: 0,
// 		stagePadding: 0,
// 		merge: false,
// 		mergeFit: true,
// 		autoWidth: true,
// 		startPosition: 0,
//         touchDrag: true,
//         mouseDrag: true,
// 		dots:true,
// 		dotsEach:true,
// 		// responsive: {
// 		// 	0: {
// 		// 		items: 1
// 		// 		// nav: true
// 		// 	},
// 		// 	480: {
// 		// 		items: 1,
// 		// 		nav: false
// 		// 	},
// 		// 	768: {
// 		// 		items: 2,
// 		// 		// nav: true,
// 		// 		loop: false
// 		// 	},
// 		// 	992: {
// 		// 		items: 4,
// 		// 		// nav: true,
// 		// 		loop: false
// 		// 	}
// 		// },
// 		// responsiveRefreshRate: 200,
// 		// responsiveBaseElement: window,
//     });
// });