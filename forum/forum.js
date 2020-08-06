function addImageUpload(event) {
    event.preventDefault();
    if($(".file-container").length < 5) {
        $("#file-upload").append(
            "<div class='file-container'>\
                <input type='file' name='img' accept='image/*'>\
            </div>");
        var num = $(".file-container").length;
        var last = $($(".file-container")[num - 1]);
        last.children("input[type='file']").on("change", function(e) {
            var curFileContainer = $(e.target).parent(); 
            var cancelNum = curFileContainer.children(".icon-button").length;
            if (cancelNum == 0) {
                curFileContainer.append(
                    "<button class='icon-button'>\
                        <i class='icon-cancel'></i>\
                    </button>");
                var cancelButton = curFileContainer.children(".icon-button");
                cancelButton.click(function() {
                    curFileContainer.remove();
                    var count = countUploadImages();
                    $("#counter").html(count);
                });
            }
            var count = countUploadImages();
            $("#counter").html(count);
        });
    }
}
$(".file-container input[type='file']").on("change", function(e) {
    var curFileContainer = $(e.target).parent(); 
    var cancelNum = curFileContainer.children(".icon-button").length;
    if (cancelNum == 0) {
        curFileContainer.append(
            "<button class='icon-button'>\
                <i class='icon-cancel'></i>\
            </button>");
        var cancelButton = curFileContainer.children(".icon-button");
        cancelButton.click(function() {
            curFileContainer.remove();
            var count = countUploadImages();
            $("#counter").html(count);
        });
    } 
    var count = countUploadImages();
    $("#counter").html(count);
});
function countUploadImages() {
    var count = 0;
    $("input[name='img'][type='file']").each(function() {
        if($(this).val() != "") {
            count++;
        }
    });
    return count;
}
function nameFileInputs() {
    var counter = 0;
    $("input[name='img'][type='file']").each(function() {
        if($(this).val() != "") {
            $(this).attr("name", "img-" + counter);
            counter++;
        }
    });
    $("#create_form").append("<input type='hidden' name='counter' value='"+counter+"'>");
}
function toogleSelect(event, name) {
	var getParameters = getRequest();
	var selectElement = event.target;
	var value = selectElement.options[selectElement.selectedIndex].value;
	getParameters[name] = value;
	var redirectURI = "/forum/?";
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
function toggleForumDesc(event) {
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
	var redirectURI = "/forum/?";
	for(let key in getParameters) {
		if (key != "p") {
			redirectURI += (key + "=" + getParameters[key] + "&");
		}
	}
	redirectURI += "p=1";
	console.log(redirectURI);
	window.location.href=redirectURI;
}
function likeOrUnlikeTopic(event, topic_id, like, cur_count) {
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
		url: "/forum/like",
		data: {topicId: topic_id,
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
				msgAnimate(responseObj['message']);
			} else {
				msgAnimate(responseObj['message'], false);	
			}
		},
		error : function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
	});
}