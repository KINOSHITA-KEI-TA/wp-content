jQuery(document).ready(function($){

  var $window = $(window);

  $("a").bind("focus",function(){if(this.blur)this.blur();});
  $("a.target_blank").attr("target","_blank");

  //category link
  $(document).on('mouseenter', 'a [data-href]', function(){
		var $a = $(this).closest('a');
		$a.attr('data-href', $a.attr('href'));
		if ($(this).attr('data-href')) {
			$a.attr('href', $(this).attr('data-href'));
		}
	}).on('mouseleave', 'a [data-href]', function(){
		var $a = $(this).closest('a');
		$a.attr('href', $a.attr('data-href')).removeAttr('data-href');
	}).on('click', 'a [data-href]', function(){
		var $a = $(this).closest('a');
		if ($a.attr('data-href')) {
			$a.attr('href', $a.attr('data-href'));
		}
		if ($(this).attr('data-href')) {
			location.href = $(this).attr('data-href');
			return false;
		}
	});


  //return top button
  var return_top_button = $('#return_top');
  $('a',return_top_button).click(function() {
    var myHref= $(this).attr("href");
    var myPos = $(myHref).offset().top;
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });
  return_top_button.removeClass('active');
  $window.scroll(function () {
    if ($(this).scrollTop() > 100) {
      return_top_button.addClass('active');
    } else {
      return_top_button.removeClass('active');
    }
  });


  //fixed footer content
  var fixedFooter = $('#fixed_footer_content');
  fixedFooter.removeClass('active');
  $window.scroll(function () {
    if ($(this).scrollTop() > 330) {
      fixedFooter.addClass('active');
    } else {
      fixedFooter.removeClass('active');
    }
  });
  $('#fixed_footer_content .close').click(function() {
    $("#fixed_footer_content").hide();
    return false;
  });


  // comment button
  $("#comment_tab li").click(function() {
    $("#comment_tab li").removeClass('active');
    $(this).addClass("active");
    $(".tab_contents").hide();
    var selected_tab = $(this).find("a").attr("href");
    $(selected_tab).fadeIn();
    return false;
  });


  //custom drop menu widget
  $(".tcdw_custom_drop_menu li:has(ul)").addClass('parent_menu');
  $(".tcdw_custom_drop_menu li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
  }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
  });


  // design select box widget
  $(".design_select_box select").on("click" , function() {
    $(this).closest('.design_select_box').toggleClass("open");
  });
  $(document).mouseup(function (e){
    var container = $(".design_select_box");
    if (container.has(e.target).length === 0) {
      container.removeClass("open");
    }
  });


  //tab post list widget
  $(".tab_post_list_widget").each(function () {
    $('.widget_tab_post_list_button a:first-child',this).addClass('active');
    $('.widget_tab_post_list:first',this).show();
  });
  $('.widget_tab_post_list_button').on('click', 'a', function(){
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    var $tab_list_class = "." + $(this).attr('data-tab');
    $(this).closest('.tab_post_list_widget').find(".widget_tab_post_list").hide();
    $(this).closest('.tab_post_list_widget').find($tab_list_class).show();
    $(this).closest('.tab_post_list_widget').find($tab_list_class).find('ol').slick('setPosition');
    return false;
  });


  // archive list widget
  if ($('.p-dropdown').length) {
    $('.p-dropdown__title').click(function() {
      $(this).toggleClass('is-active');
      $('+ .p-dropdown__list:not(:animated)', this).slideToggle();
    });
  }


  //category widget
  $(".tcd_category_list li:has(ul)").addClass('parent_menu');
  $(".tcd_category_list li.parent_menu > a").parent().prepend("<span class='child_menu_button'></span>");
  $(".tcd_category_list li .child_menu_button").on('click',function() {
     if($(this).parent().hasClass("open")) {
       $(this).parent().removeClass("active");
       $(this).parent().removeClass("open");
       $(this).parent().find('>ul:not(:animated)').slideUp("fast");
       return false;
     } else {
       $(this).parent().addClass("active");
       $(this).parent().addClass("open");
       $(this).parent().find('>ul:not(:animated)').slideDown("fast");
       return false;
     };
  });


  //search widget
  $('.widget_search #searchsubmit').wrap('<div class="submit_button"></div>');
  $('.google_search #searchsubmit').wrap('<div class="submit_button"></div>');


  // header search
  $(document).on('change keyup', 'input#header_search_input', function(){
    if($(this).val() != ""){
      $('#header_search').addClass('active');
    } else {
      $('#header_search').removeClass('active');
    }
  });


  // header hover
  $("#header").addClass("off_hover");
  $("#header").hover(function(){
     $(this).removeClass("off_hover");
  }, function(){
     $(this).addClass("off_hover");
  });


  // quick tag - underline ------------------------------------------
  if ($('.q_underline').length) {
    var gradient_prefix = null;

    $('.q_underline').each(function(){
      var bbc = $(this).css('borderBottomColor');
      if (jQuery.inArray(bbc, ['transparent', 'rgba(0, 0, 0, 0)']) == -1) {
        if (gradient_prefix === null) {
          gradient_prefix = '';
          var ua = navigator.userAgent.toLowerCase();
          if (/webkit/.test(ua)) {
            gradient_prefix = '-webkit-';
          } else if (/firefox/.test(ua)) {
            gradient_prefix = '-moz-';
          } else {
            gradient_prefix = '';
          }
        }
        $(this).css('borderBottomColor', 'transparent');
        if (gradient_prefix) {
          $(this).css('backgroundImage', gradient_prefix+'linear-gradient(left, transparent 50%, '+bbc+ ' 50%)');
        } else {
          $(this).css('backgroundImage', 'linear-gradient(to right, transparent 50%, '+bbc+ ' 50%)');
        }
      }
    });

    $window.on('scroll.q_underline', function(){
      $('.q_underline:not(.is-active)').each(function(){
        var top = $(this).offset().top;
        if ($window.scrollTop() > top - window.innerHeight) {
          $(this).addClass('is-active');
        }
      });
      if (!$('.q_underline:not(.is-active)').length) {
        $window.off('scroll.q_underline');
      }
    });
  }


// responsive ------------------------------------------------------------------------
var mql = window.matchMedia('screen and (min-width: 1251px)');
function checkBreakPoint(mql) {

 if(mql.matches){ //PC

   $("html").removeClass("mobile");
   $("html").addClass("pc");

   $("#menu_button").css("display","none");

   $("#global_menu li:not(.megamenu_parent)").hover(function(){
     if( $(this).hasClass('menu-item-has-children') ){
       $(">ul:not(:animated)",this).slideDown("fast");
       $(this).addClass("active");
       $('#header').addClass("active");
     }
   }, function(){
     if( $(this).hasClass('menu-item-has-children') ){
       $(">ul",this).slideUp("fast");
       $(this).removeClass("active");
       $('#header').removeClass("active");
     }
   });

 } else { //smart phone

   $("html").removeClass("pc");
   $("html").addClass("mobile");

   // perfect scroll
   if ($('#drawer_menu').length) {
     if(! $(body).hasClass('mobile_device') ) {
       new SimpleBar($('#drawer_menu')[0]);
     };
   };
/*
   if ($('.mobile #index_tab_post_list .tab').length) {
     if(! $(body).hasClass('mobile_device') ) {
       new SimpleBar($('.mobile #index_tab_post_list .tab')[0]);
     };
   };
*/

   // drawer menu
   $("#mobile_menu .child_menu_button").remove();
   $('#mobile_menu li > ul').parent().prepend("<span class='child_menu_button'><span class='icon'></span></span>");
   $("#mobile_menu .child_menu_button").on('click',function() {
     if($(this).parent().hasClass("open")) {
       $(this).parent().removeClass("open");
       $(this).parent().find('>ul:not(:animated)').slideUp("fast");
       return false;
     } else {
       $(this).parent().addClass("open");
       $(this).parent().find('>ul:not(:animated)').slideDown("fast");
       return false;
     };
   });

   // drawer menu button
   var menu_button = $('#menu_button');
   menu_button.off();
   menu_button.removeAttr('style');
   menu_button.toggleClass("active",false);

  // open drawer menu
   menu_button.on('click', function(e) {

      e.preventDefault();
      e.stopPropagation();
      $('html').toggleClass('open_menu');

      // fix position for ios
      var topPosition = $window.scrollTop();
      $('body').css({'position':'fixed','top': - topPosition});

      $('#container').one('click', function(e){
        if($('html').hasClass('open_menu')){
          $('html').removeClass('open_menu');

          // clear fix position for ios
          $('body').css({'position':'','top': ''});
          $window.scrollTop(topPosition);

          return false;
        };
      });

   });

 };
};
mql.addListener(checkBreakPoint);
checkBreakPoint(mql);


});