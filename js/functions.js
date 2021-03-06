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
	if($(".reply-content #reply-form").length == 0) {
		$parent = $(event.target).parent().parent();
		var prevHtml = $parent.html();
		if($parent.children(".reply-form").length == 0) {
			$parent.append(
				"<form action='/blog/reply' id='reply-form' method='POST' class='reply-form' style='margin-top: 5px;'\
					onsubmit='$(\"#body-div\").val($(\"#edit-div\").text());'>\
					<div id='edit-div' class='div-textarea' contenteditable='true'></div>\
					<input type='hidden' name='blog_id' value='" + blog_id + "'/> \
					<input type='hidden' name='replyee_id' value='" + replyee_id + "' />\
					<input type='hidden' name='comment_id' value='" + comment_id + "'/>\
					<input type='hidden' name='body' value='' id='body-div'/>\
					<input type='submit' style='margin-top: 8px;' name='comment_reply' value='submit' />\
				</form>\
				<button id='reply-cancel' style='position:relative;top:8px;left:-10px; float: right'>Cancel</button>");
			$("#reply-cancel").click(function(){
				$parent.html(prevHtml);
			});
		}
	}
}	

function showReplyCommentForm(event, replyee_id, comment_id, blog_id) {
	if($(".reply-content #reply-form").length == 0) {
		var $parent = $(event.target).parent().parent();
		var prevHtml = $parent.html();
		if($parent.children(".reply-form").length == 0) {
			$parent.append(
				"<form action='/blog/reply' id='reply-form' method='POST' class='reply-form' style='margin-top: 5px;'\
					 onsubmit='$(\"#body-div\").val($(\"#edit-div\").text());'>\
					<div id='edit-div' class='div-textarea' contenteditable='true'></div>\
					<input type='hidden' name='blog_id' value='" + blog_id + "'/> \
					<input type='hidden' name='replyee_id' value='" + replyee_id + "' />\
					<input type='hidden' name='comment_id' value='" + comment_id + "'/>\
					<input type='hidden' name='body' value='' id='body-div'/>\
					<input type='submit' style='margin: 8px 0px;' name='comment_reply' value='submit' />\
				</form>\
				<button id='reply-cancel' style='position:relative;top:8px;left:-10px; float: right'>Cancel</button>");
			$("#reply-cancel").click(function(){
				$parent.html(prevHtml);
			});
		}
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
function toogleNewsSelect(event, name) {
	var getParameters = getRequest();
	var selectElement = event.target;
	var value = selectElement.options[selectElement.selectedIndex].value;
	getParameters[name] = value;
	var redirectURI = "/news/?";
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
function toggleNewsDesc(event) {
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
	var redirectURI = "/news/?";
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
	if($("body #delete-popup").length == 0) {
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
}
function likeOrUnlike(event, blog_id, like, cur_count) {
	// since it's ajax, like parameter above can not only depend on what template rendered
	// why? if user like, and then try to unlike, even though the UI changed, making it looks like he is "unliking",
	// However, the page didn't refreshed, which means this like parameter passed by template didn't changed! like is still true!
	// we have to temporarily rely on UI logic to determine if the user is "liking" or "unliking"...though it's not very safe..
	// optimal solution: start another ajax before to check the real time "liked" situation in database.
	var $target = $(event.target);
	like = $target.attr('class') == "icon-thumbs-up";
	cur_count = parseInt($target.parent().children("div").text().trim());
	$.ajax({
		type: "POST",
		url: "/blog/like",
		data: {blogId: blog_id,
			   isLike: like,
			   curCount: cur_count},
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success: function(response) {
			var responseObj = JSON.parse(response);
			if(responseObj['success']) {
				if(like) {
					var $iLikeButton = $target;
					$iLikeButton.toggleClass("icon-thumbs-up");
					$iLikeButton.toggleClass("icon-thumbs-up-alt");
					$iLikeButton.css("color","#1cbbb4");
					$target.parent().children("div").text(cur_count+1);
				} else {
					var $iLikeButton = $target;
					$iLikeButton.toggleClass("icon-thumbs-up-alt");
					$iLikeButton.toggleClass("icon-thumbs-up");
					$iLikeButton.css("color","#adadad");
					$target.parent().children("div").text(cur_count-1);
				}
				$("#message > div").text(responseObj['message']);
				msgAnimate();
			} else {
				$("#message").removeClass("alert-success");
				$("#message").addClass("alert-danger");
				$("#message > div").removeClass("alert-success");
				$("#message > div").addClass("alert-danger");
				$("#message > div").text(responseObj['message']);
				msgAnimate();
				
			}
		},
		error : function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
	});
}
function likeOrUnlikeNews(event, news_id, like, cur_count) {
	// since it's ajax, like parameter above can not only depend on what template rendered
	// why? if user like, and then try to unlike, even though the UI changed, making it looks like he is "unliking",
	// However, the page didn't refreshed, which means this like parameter passed by template didn't changed! like is still true!
	// we have to temporarily rely on UI logic to determine if the user is "liking" or "unliking"...though it's not very safe..
	// optimal solution: start another ajax before to check the real time "liked" situation in database.
	var $target = $(event.target);
	like = $target.attr('class') == "icon-thumbs-up";
	cur_count = parseInt($target.parent().children("div").text().trim());
	console.log(like);
	console.log(cur_count);
	$.ajax({
		type: "POST",
		url: "/news/like",
		data: {newsId: news_id,
			   isLike: like,
			   curCount: cur_count},
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		success: function(response) {
			var responseObj = JSON.parse(response);
			if(responseObj['success']) {
				if(like) {
					var $iLikeButton = $target;
					$iLikeButton.toggleClass("icon-thumbs-up");
					$iLikeButton.toggleClass("icon-thumbs-up-alt");
					$iLikeButton.css("color","#1cbbb4");
					$target.parent().children("div").text(cur_count+1);
				} else {
					var $iLikeButton = $target;
					$iLikeButton.toggleClass("icon-thumbs-up-alt");
					$iLikeButton.toggleClass("icon-thumbs-up");
					$iLikeButton.css("color","#adadad");
					$target.parent().children("div").text(cur_count-1);
				}
				$("#message > div").text(responseObj['message']);
				msgAnimate();
			} else {
				$("#message").removeClass("alert-success");
				$("#message").addClass("alert-danger");
				$("#message > div").removeClass("alert-success");
				$("#message > div").addClass("alert-danger");
				$("#message > div").text(responseObj['message']);
				msgAnimate();
				
			}
		},
		error : function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
	});
}
function editReply(event,reply_id, cur_body, blog_id) {
	if($(".reply-body #edit-form").length == 0) {
		var target = $(event.target);
		var replyBody = target.parents(".reply-content").children(".reply-body"); 
		var prevText = replyBody.html();
		replyBody.html("<form method='POST' id='edit-form' action='/blog/reply' onsubmit='processBlogReplyEdit()'>\
							<div id='edit-div' class='div-textarea' contenteditable='true' name='body' >"+ cur_body +"</div>\
							<input id='hidden-body' type='hidden' name='body' value=''>\
							<input type='hidden' name='blog_id' value='"+ blog_id +"'>\
							<input type='hidden' name='id' value='"+reply_id+"'>\
							<input style='margin-top:10px;'type='submit' name='reply-edit' value='Save'>\
						</form>\
						<button id='reply-cancel' style='position: relative;\
									top: -26px;\
									left: 57px;'>\
								cancel</button>");
		$("#reply-cancel").click(function() {
			replyBody.html(prevText);
		});
	}	
}
function processBlogReplyEdit() {
	$("#hidden-body").val($("#edit-div").text());
}
function deleteReply(reply_id, blog_id) {
	if($('body #delete-popup').length == 0) {
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
						<form method='POST' action='/blog/reply' style='width: 100%'>\
							<div style='margin-top: 40px; font-size: 18px'>Are you sure you want to delete this reply?</div>\
							<input type='hidden' name='blog_id' value='"+blog_id+"'>\
							<input type='hidden' name='id' value='"+reply_id+"'>\
							<div style='position: absolute; width: 100%; bottom: 40px;'>\
								<div style='text-align: left'>\
									<input style='background-color: red;\
												border:1px solid black;\
												border-radius: 2px;\
												color: whitesmoke;\
												margin-left: 50px;'\
											type='submit' name='delete-reply' value='Yes'>\
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
}
function processTags() {
	var temp = [];
	$("form input[type='checkbox'][name='tag']").each(
		function() {
			if($(this).is(':checked')) {
				temp.push($(this).val());
			} 
		}
	);
	var returnStr = "";
	returnStr = temp.join(",")
	return returnStr;
}
function processFormSubmit() {
	$("form input[name='tags'][type='hidden']").val(processTags());
	document.getElementById('editor').value=window.editor.getData();
}


