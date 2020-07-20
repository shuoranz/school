// MENU  UPDATED V 1.5=============== //
if ( $(window).width() > 767) {     
   jQuery('ul.sf-menu').superfish({
			animation: {opacity:'show'},
		animationOut: {opacity:'hide'}
		});
}
else {		
		jQuery('ul.sf-menu').superfish({
		animation: {opacity:'visible'},
		animationOut: {opacity:'visible'}
		});
}

// HOVER IMAGE MAGNIFY V.1.5========= //
    //Set opacity on each span to 0%
    $(".photo_icon").css({'opacity':'0'});

	$('.picture a').hover(
		function() {
			$(this).find('.photo_icon').stop().fadeTo(800, 1);
		},
		function() {
			$(this).find('.photo_icon').stop().fadeTo(800, 0);
		}
	)

// STICKY NAV V.1.5========= //    
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('nav').addClass("sticky");
    }
    else{
        $('nav').removeClass("sticky");
    }
});

	
// MENU MOBILE ==========//
// Collpsable menu mobile and tablets
$('#mobnav-btn').click(
function () {
    $('.sf-menu').slideToggle(400)("xactive");
});

$('.mobnav-subarrow').click(
function () {
    $(this).parent().toggleClass("xpopdrop");
});



// SCROLL TO TOP ===============================================================================
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},500);
	});	
	
});

if( window.innerWidth < 770 ) {
	$("button.forward, button.backword").click(function() {
  $("html, body").animate({ scrollTop: 115 }, "slow");
  return false;
});
}

if( window.innerWidth < 500 ) {
	$("button.forward, button.backword").click(function() {
  $("html, body").animate({ scrollTop: 245 }, "slow");
  return false;
});
}
if( window.innerWidth < 340 ) {
	$("button.forward, button.backword").click(function() {
  $("html, body").animate({ scrollTop: 280 }, "slow");
  return false;
});
}

<!-- Toggle -->			
	$('.togglehandle').click(function()
	{
		$(this).toggleClass('active')
		$(this).next('.toggledata').slideToggle()
	});

// alert close 
	$('.clostalert').click(function()
	{
	$(this).parent('.alert').fadeOut ()
	});	
	
<!-- Tooltip -->	
$('.tooltip-1').tooltip({html:true});

<!-- Accrodian -->	
	var $acdata = $('.accrodian-data'),
		$acclick = $('.accrodian-trigger');

	$acdata.hide();
	$acclick.first().addClass('active').next().show();	
	
	$acclick.on('click', function(e) {
		if( $(this).next().is(':hidden') ) {
			$acclick.removeClass('active').next().slideUp(300);
			$(this).toggleClass('active').next().slideDown(300);
		}
		e.preventDefault();
	});
	
 $('.po-markup > .po-link').popover({
    trigger: 'hover',
    html: true,  // must have if HTML is contained in popover

    // get the title and conent
    title: function() {
      return $(this).parent().find('.po-title').html();
    },
    content: function() {
      return $(this).parent().find('.po-body').html();
    },

    container: 'body',
    placement: 'top'

  });
  //accordion	
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('icon-plus icon-minus');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
$('#accordion').on('hidden.bs.collapse', function () {
})
<!-- testimonial carousel -->	
$(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 6000,
  });
});

//Pace holder
$('input, textarea').placeholder();

function showReplyForm(event, replyee_id, comment_id, blog_id) {
	$parent = $(event.target).parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/blog/reply' method='POST' class='reply-form' style='margin-top: 5px;'>\
				<textarea rows='8' cols='100' name='body'></textarea>\
				<input type='hidden' name='blog_id' value='" + blog_id + "'/> \
				<input type='hidden' name='replyee_id' value='" + replyee_id + "' />\
				<input type='hidden' name='comment_id' value='" + comment_id + "'/>\
				<input type='submit' style='margin-top: 5px;' name='comment_reply' value='提交' />\
			</form>");
	}
}	

function showReplyCommentForm(event, replyee_id, comment_id, blog_id) {
	$parent = $(event.target).parent().parent();
	if($parent.children(".reply-form").length == 0) {
		$parent.append(
			"<form action='/blog/reply' method='POST' class='reply-form' style='margin-top: 5px;'>\
				<textarea rows='8' cols='100' name='body'></textarea>\
				<input type='hidden' name='blog_id' value='" + blog_id + "'/> \
				<input type='hidden' name='replyee_id' value='" + replyee_id + "' />\
				<input type='hidden' name='comment_id' value='" + comment_id + "'/>\
				<input type='submit' style='margin: 8px 0px;' name='comment_reply' value='提交' />\
			</form>");
	}
}
function toogleBlogSelect(event, name) {
	var getParameters = getRequest();
	var selectElement = event.target;
	var value = selectElement.options[selectElement.selectedIndex].value;
	getParameters[name] = value;
	var redirectURI = "/blog/?";
	var isDefault = selectElement.options[selectElement.selectedIndex].getAttribute('id') == "default";
	for(let key in getParameters) {
		if (key == name) {
			if(!isDefault) {
				redirectURI += (name + "=" + value + "&");
			}
		} else if (key != "p") {
			redirectURI += (key + "=" + getParameters[key] + "&");
		}
	}
	redirectURI += "p=1";
	window.location.href=redirectURI;
}
function toggleDesc(event) {
	var getParameters = getRequest();
	var desc = !("desc" in getParameters);
	console.log("before: desc " + desc);
	desc = !desc;
	if(!desc) {
		console.log("now asc")
		getParameters["desc"] = "0";
	} else {
		console.log("now desc")
		delete(getParameters["desc"]);
		console.log(getParameters);
	}
	var redirectURI = "/blog/?";
	for(let key in getParameters) {
		if (key != "p") {
			redirectURI += (key + "=" + getParameters[key] + "&");
		}
	}
	redirectURI += "p=1";
	console.log(redirectURI);
	window.location.href=redirectURI;
}
function getRequest() {
	var args = new Object();
	var query = location.search.substring(1);
	var pairs = query.split("&"); // Break at ampersand
	for (var i = 0; i < pairs.length; i++) {
		var pos = pairs[i].indexOf('=');
		if (pos == -1) continue;
		var argname = pairs[i].substring(0, pos);
		var value = pairs[i].substring(pos + 1);
		value = decodeURIComponent(value);
		args[argname] = value;
	}
	return args;
}
function deleteBlog(blog_id) {
	var popup = "<div id='delete-popup' style='position: fixed; \
											   width: 400px; \
											   height: 250px; \
											   background-color: #eaeaea;\
											   top:50%;\
											   left:50%;\
											   box-shadow: 0px 2px 8px 0px rgba(74,74,74,0.81);\
											   border-radius: 10px;\
											   transform: translate(-50%, -50%);\
											   z-index: 5;\
											   text-align: center'>\
					<form method='POST' action='/blog/delete/?id=" + blog_id +"' style='width: 100%'>\
						<div style='margin-top: 40px; font-size: 18px'>Are you sure you want to delete this blog?</div>\
						<input type='hidden' name='blog_id' value='"+blog_id+"'>\
						<div style='position: absolute; width: 100%; bottom: 40px;'>\
							<div style='text-align: left'>\
								<input style='background-color: red;\
											   border:1px solid black;\
											   border-radius: 2px;\
											   color: whitesmoke;\
											   margin-left: 50px;'\
										type='submit' name='delete-post' value='Yes'>\
							</div>\
						</div>\
					</form>\
					<button id='close-popup' style='position: absolute; bottom: 40px; right: 50px;'> No </button>\
				 </div>";
	$('body').append(popup);
	$("#close-popup").click(function(event) {
		event.preventDefault();
		$('#delete-popup').remove();
	});
}


