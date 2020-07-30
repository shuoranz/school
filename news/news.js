function newsReply(event, replyee_id, news_id) {
    if($("#reply-form").length == 0) {
        var target = $(event.target);
        var singlePost = target.parent().parent().parent();
        var html = singlePost.html();
        singlePost.append(
            "<div><form action='/news/reply' id='reply-form' method='POST' style='margin-top: 5px;'\
                        onsubmit='$(\"#body-div\").val($(\"#edit-div\").text());'>\
                        <div id='edit-div' class='div-textarea' contenteditable='true'></div>\
                        <input type='hidden' name='news_id' value='" + news_id + "'/> \
                        <input type='hidden' name='replyee_id' value='" + replyee_id + "' />\
                        <input type='hidden' name='body' value='' id='body-div'/>\
                        <input type='hidden' name='comment_id' value='-1' />\
                        <input type='submit' style='margin-top: 8px;' name='comment_reply' value='submit' />\
                    </form>\
                    <button id='reply-cancel' style='position:relative;top:-26px;left:70px;'>Cancel</button></div>"
        );
        $("#reply-cancel").click(function(){
            singlePost.html(html);
        });
    }
}
function deleteNews(news_id) {
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
						<form method='POST' action='/news/delete/?id=" + news_id +"' style='width: 100%'>\
							<div style='margin-top: 40px; font-size: 18px'>Are you sure you want to delete this news?</div>\
							<input type='hidden' name='news_id' value='"+news_id+"'>\
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