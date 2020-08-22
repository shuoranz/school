function showStatusDropDown(event, table, id) {
    var target = $(event.target);
    var statusSpan = $(target.parent(".status").addBack()[0]);
    var status = statusSpan.text().trim();
    if(statusSpan.children(".db-right-popup").length == 0) {
        if($(".db-right-popup").length > 0) {
            var arrowIcon = $(".db-right-popup").parent().children("i");
            $(".db-right-popup").remove();
            arrowIcon.toggleClass("icon-left-dir");
            arrowIcon.toggleClass("icon-right-dir");
        }
        statusSpan.append(
            "<div class='db-right-popup'>\
            </div>");
        var rightPopup = statusSpan.children(".db-right-popup");
        var publishedOptions = ["revoke", "edit", "delete"];
        var pendingOptions = ["publish", "edit", "delete", "top"];
        var deletedOptions = ["restore"];
        var studentOptions = ["delete"];
		var teacherOptions = ["delete", "upgradeTeacher"];
		var superTeacherOptions =  ["delete", "downgradeTeacher"];
		var adminOptions = ["delete", "upgradeAdmin"];
		var adminPlusOptions =  ["delete", "downgradeAdmin"];
		var newDemoOption = ["delete", "invited"];
        var allowedOptions = {
            "pending": pendingOptions,
            "published": publishedOptions,
            "deleted" : deletedOptions,
            "student": studentOptions,
            "student(guest)": studentOptions,
			"teacher": teacherOptions,
            "teacher(guest)": teacherOptions,
			"teacher(super)": superTeacherOptions,
			"admin": adminOptions,
			"adminPlus":adminPlusOptions,
			"new": newDemoOption
        };
        var optionsToHtml = {
            "publish" : "<div onclick='publish(\""+ table + "\", " + id + ")'>Publish</div>",
            "revoke" : "<div onclick='revoke(\"" + table + "\"," + id + ")'>Revoke</div>",
            "edit" : "<div onclick='edit(\"" + table + "\"," + id + ")'>Edit</div>",
            "delete": "<div onclick='remove(\"" + table + "\"," + id + ")'>Delete</div>",
            "top": "<div onclick='top(\"" + table + "\"," + id + ")'>Top</div>",
            "restore" : "<div onclick='restore(\"" + table + "\"," + id + ")'>Restore</div>",
			"upgradeTeacher" : "<div onclick='gradeTeacher(\"" + table + "\"," + id + ", \"teacher(super)\")'>Upgrade Teacher</div>",
			"downgradeTeacher" : "<div onclick='gradeTeacher(\"" + table + "\"," + id + ", \"teacher\")'>Downgrade Teacher</div>",
			"upgradeAdmin" : "<div onclick='gradeAdmin(\"" + table + "\"," + id + ", \"adminPlus\")'>Upgrade Admin</div>",
			"downgradeAdmin" : "<div onclick='gradeAdmin(\"" + table + "\"," + id + ", \"admin\")'>Downgrade Admin</div>",
			"invited" : "<div onclick='updateDemoUser(\"" + table + "\"," + id + ", \"invited\")'>invite</div>"
        };
        if(status in allowedOptions) {
            var all_options = allowedOptions[status];
            for(var i in all_options) {
                var option = all_options[i];
                if(option in optionsToHtml) {
                    rightPopup.append(optionsToHtml[option]);
                }
            }
        }
        var arrowIcon = statusSpan.children("i");
        arrowIcon.toggleClass("icon-right-dir");
        arrowIcon.toggleClass("icon-left-dir");
        $(document).click(function(e) {
            var tgt = $(e.target);
            if(tgt.closest(".status").length == 0 && tgt.closest(".db-right-popup").length == 0) {
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
            }
        });
    } else {
        statusSpan.children(".db-right-popup").remove();
        var arrowIcon = statusSpan.children("i");
        arrowIcon.toggleClass("icon-left-dir");
        arrowIcon.toggleClass("icon-right-dir");
    }
}
function publish(table, id) {
   $.ajax({
       type: "POST",
       url: "/dashboard/controller",
       data: {
           table: table,
           id: id,
           action: "publish"
       },
       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
       success: function(response) {
           var responseObj = JSON.parse(response);
           var statusTxtSelector = "#status-"+id;
           if($(statusTxtSelector).length == 1) {
                $(statusTxtSelector).text("published");
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
           }
           msgAnimate(responseObj['message']);
       },
       error: function(e) {
           console.log(e.status);
           console.log(e.responseText);
       }
   });
}
function revoke(table, id) {
    $.ajax({
        type: "POST",
        url: "/dashboard/controller",
        data: {
            table: table,
            id: id,
            action: "revoke"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function(response) {
            var responseObj = JSON.parse(response);
            var statusTxtSelector = "#status-"+id;
            if($(statusTxtSelector).length == 1) {
                 $(statusTxtSelector).text("pending");
                 var arrowIcon = $(".db-right-popup").parent().children("i");
                 $(".db-right-popup").remove();
                 arrowIcon.toggleClass("icon-left-dir");
                 arrowIcon.toggleClass("icon-right-dir");
            }
            msgAnimate(responseObj['message']);
        },
        error: function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
    });
}
function edit(table, id) {
    if(table == "blog" || table == "forum" || table == "news"){
		location.href = "/"+table+"/edit/?id=" + id;
	} else if (table == "course_video") {
		$("#edit_video_title").val($("#video_"+id+" td:nth-child(2) a").html());
		$("#edit_vimeo_id").val($("#video_"+id+" td:nth-child(3) span").html());
		$("#edit_video_description").val($("#video_"+id+" td:nth-child(4) span").html());
		$("#edit_video_id").val(id);
		$('#editVideoDivBtn').trigger('click');
	} else if (table == "course") {
		$("#edit_course_title").val($("#course_"+id+" td:nth-child(2) a").html());
		$("#edit_course_description").val($("#course_"+id+" td:nth-child(5) span").html());
		$("#edit_course_id").val(id);
		$('#editCourseDivBtn').trigger('click');
	}
}
function restore(table, id) {
    $.ajax({
        type: "POST",
        url: "/dashboard/controller",
        data: {
            table: table,
            id: id,
            action: "restore"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function(response) {
            var responseObj = JSON.parse(response);
            var statusTxtSelector = "#status-"+id;
            if($(statusTxtSelector).length == 1) {
                 $(statusTxtSelector).text(table=="users" ? $("#hidden-role-"+id).text() : "pending");
                 var arrowIcon = $(".db-right-popup").parent().children("i");
                 $(".db-right-popup").remove();
                 arrowIcon.toggleClass("icon-left-dir");
                 arrowIcon.toggleClass("icon-right-dir");
            }
            msgAnimate(responseObj['message']);
        },
        error: function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
    });
}
function remove(table, id) {
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
						<div style='width: 100%'>\
							<div style='margin-top: 40px; font-size: 18px'>Are you sure you want to delete this " + table + "?</div>\
							<div style='position: absolute; width: 100%; bottom: 40px;'>\
								<div style='text-align: left'>\
									<button style='background-color: red;\
												border:1px solid black;\
												border-radius: 2px;\
												color: whitesmoke;\
                                                margin-left: 50px;'\
                                                id='delete-confirm'\
											 >Yes</button>\
								</div>\
							</div>\
						</div>\
						<button id='close-popup' style='position: absolute; bottom: 40px; right: 50px;'> No </button>\
					</div>";
        $('body').append(popup);
        $("#delete-confirm").click(function() {
            $.ajax({
                type: "POST",
                url: "/dashboard/controller",
                data: {
                    table: table,
                    id: id,
                    action: "delete"
                },
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(response) {
                    var responseObj = JSON.parse(response);
                    var statusTxtSelector = "#status-"+id;
                    if($(statusTxtSelector).length == 1) {
                         $(statusTxtSelector).text("deleted");
                         var arrowIcon = $(".db-right-popup").parent().children("i");
                         $(".db-right-popup").remove();
                         $("#delete-popup").remove();
                         arrowIcon.toggleClass("icon-left-dir");
                         arrowIcon.toggleClass("icon-right-dir");
                    }
                    msgAnimate(responseObj['message']);
                },
                error: function(e) {
                    console.log(e.status);
                    console.log(e.responseText);
                }
            });
        });
		$("#close-popup").click(function(event) {
			event.preventDefault();
			$('#delete-popup').remove();
		});
	}
}
function showStatusDropDownCategory(event, table, id) {
    var target = $(event.target);
    var statusSpan = $(target.parent(".status").addBack()[0]);
    var status = statusSpan.text().trim();
    if(statusSpan.children(".db-right-popup").length == 0) {
        if($(".db-right-popup").length > 0) {
            var arrowIcon = $(".db-right-popup").parent().children("i");
            $(".db-right-popup").remove();
            arrowIcon.toggleClass("icon-left-dir");
            arrowIcon.toggleClass("icon-right-dir");
        }
        statusSpan.append(
            "<div class='db-right-popup'>\
            </div>");
        var rightPopup = statusSpan.children(".db-right-popup");
        //var publishedOptions = ["revoke", "edit", "delete"];
        //var pendingOptions = ["publish", "edit", "delete"];
		var publishedOptions = ["revoke", "delete"];
        var pendingOptions = ["publish", "delete"];
        var deletedOptions = ["restore"];
        var studentOptions = ["delete"];
        var allowedOptions = {
            "pending": pendingOptions,
            "published": publishedOptions,
            "deleted" : deletedOptions,
            "student": studentOptions,
            "student(guest)": studentOptions,
        };
        var optionsToHtml = {
            "publish" : "<div onclick='publishCategory(\""+ table + "\", " + id + ")'>Publish</div>",
            "revoke" : "<div onclick='revokeCategory(\"" + table + "\"," + id + ")'>Revoke</div>",
            "edit" : "<div onclick='editCategory(\"" + table + "\"," + id + ")'>Edit</div>",
            "delete": "<div onclick='removeCategory(\"" + table + "\"," + id + ")'>Delete</div>",
            "top": "<div onclick='top(\"" + table + "\"," + id + ")'>Top</div>",
            "restore" : "<div onclick='restoreCategory(\"" + table + "\"," + id + ")'>Restore</div>"
        };
        if(status in allowedOptions) {
            var all_options = allowedOptions[status];
            for(var i in all_options) {
                var option = all_options[i];
                if(option in optionsToHtml) {
                    rightPopup.append(optionsToHtml[option]);
                }
            }
        }
        var arrowIcon = statusSpan.children("i");
        arrowIcon.toggleClass("icon-right-dir");
        arrowIcon.toggleClass("icon-left-dir");
        $(document).click(function(e) {
            var tgt = $(e.target);
            if(tgt.closest(".status").length == 0 && tgt.closest(".db-right-popup").length == 0) {
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
            }
        });
    } else {
        statusSpan.children(".db-right-popup").remove();
        var arrowIcon = statusSpan.children("i");
        arrowIcon.toggleClass("icon-left-dir");
        arrowIcon.toggleClass("icon-right-dir");
    }
}
function publishCategory(table, id) {
   $.ajax({
       type: "POST",
       url: "/dashboard/controller",
       data: {
           table: table,
           id: id,
		   eventid: 2,
           action: "update_category"
       },
       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
       success: function(response) {
           var responseObj = JSON.parse(response);
           var statusTxtSelector = "#status-"+id;
           if($(statusTxtSelector).length == 1) {
                $(statusTxtSelector).text("published");
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
           }
           msgAnimate(responseObj['message']);
       },
       error: function(e) {
           console.log(e.status);
           console.log(e.responseText);
       }
   });
}
function revokeCategory(table, id) {
    $.ajax({
        type: "POST",
        url: "/dashboard/controller",
        data: {
            table: table,
            id: id,
			eventid: 0,
            action: "update_category"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function(response) {
            var responseObj = JSON.parse(response);
            var statusTxtSelector = "#status-"+id;
            if($(statusTxtSelector).length == 1) {
                 $(statusTxtSelector).text("pending");
                 var arrowIcon = $(".db-right-popup").parent().children("i");
                 $(".db-right-popup").remove();
                 arrowIcon.toggleClass("icon-left-dir");
                 arrowIcon.toggleClass("icon-right-dir");
            }
            msgAnimate(responseObj['message']);
        },
        error: function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
    });
}
function editCategory(table, id) {
	
}
function restoreCategory(table, id) {
    $.ajax({
        type: "POST",
        url: "/dashboard/controller",
        data: {
            table: table,
            id: id,
			eventid: 0,
            action: "update_category"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        success: function(response) {
            var responseObj = JSON.parse(response);
            var statusTxtSelector = "#status-"+id;
            if($(statusTxtSelector).length == 1) {
                 $(statusTxtSelector).text(table=="users" ? $("#hidden-role-"+id).text() : "pending");
                 var arrowIcon = $(".db-right-popup").parent().children("i");
                 $(".db-right-popup").remove();
                 arrowIcon.toggleClass("icon-left-dir");
                 arrowIcon.toggleClass("icon-right-dir");
            }
            msgAnimate(responseObj['message']);
        },
        error: function(e) {
            console.log(e.status);
            console.log(e.responseText);
        }
    });
}
function removeCategory(table, id) {
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
						<div style='width: 100%'>\
							<div style='margin-top: 40px; font-size: 18px'>Are you sure you want to delete this " + table + "?</div>\
							<div style='position: absolute; width: 100%; bottom: 40px;'>\
								<div style='text-align: left'>\
									<button style='background-color: red;\
												border:1px solid black;\
												border-radius: 2px;\
												color: whitesmoke;\
                                                margin-left: 50px;'\
                                                id='delete-confirm'\
											 >Yes</button>\
								</div>\
							</div>\
						</div>\
						<button id='close-popup' style='position: absolute; bottom: 40px; right: 50px;'> No </button>\
					</div>";
        $('body').append(popup);
        $("#delete-confirm").click(function() {
            $.ajax({
                type: "POST",
                url: "/dashboard/controller",
                data: {
                    table: table,
                    id: id,
					eventid: 1,
                    action: "update_category"
                },
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(response) {
                    var responseObj = JSON.parse(response);
                    var statusTxtSelector = "#status-"+id;
                    if($(statusTxtSelector).length == 1) {
                         $(statusTxtSelector).text("deleted");
                         var arrowIcon = $(".db-right-popup").parent().children("i");
                         $(".db-right-popup").remove();
                         $("#delete-popup").remove();
                         arrowIcon.toggleClass("icon-left-dir");
                         arrowIcon.toggleClass("icon-right-dir");
                    }
                    msgAnimate(responseObj['message']);
                },
                error: function(e) {
                    console.log(e.status);
                    console.log(e.responseText);
                }
            });
        });
		$("#close-popup").click(function(event) {
			event.preventDefault();
			$('#delete-popup').remove();
		});
	}
}
function gradeTeacher(table, id, newRole) {
   $.ajax({
       type: "POST",
       url: "/dashboard/controller",
       data: {
           table: table,
           id: id,
		   role: newRole,
           action: "grade_teacher"
       },
       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
       success: function(response) {
           var responseObj = JSON.parse(response);
           var statusTxtSelector = "#status-"+id;
           if($(statusTxtSelector).length == 1) {
                $(statusTxtSelector).text(newRole);
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
           }
           msgAnimate(responseObj['message']);
       },
       error: function(e) {
           console.log(e.status);
           console.log(e.responseText);
       }
   });
}
function gradeAdmin(table, id, newRole) {
   $.ajax({
       type: "POST",
       url: "/dashboard/controller",
       data: {
           table: table,
           id: id,
		   role: newRole,
           action: "grade_admin"
       },
       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
       success: function(response) {
           var responseObj = JSON.parse(response);
           var statusTxtSelector = "#status-"+id;
           if($(statusTxtSelector).length == 1) {
                $(statusTxtSelector).text(newRole);
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
           }
           msgAnimate(responseObj['message']);
       },
       error: function(e) {
           console.log(e.status);
           console.log(e.responseText);
       }
   });
}
function updateDemoUser(table, id, newRole) {
	$.ajax({
       type: "POST",
       url: "/dashboard/controller",
       data: {
           table: table,
           id: id,
		   role: newRole,
           action: "update_demo_user"
       },
       contentType: "application/x-www-form-urlencoded; charset=UTF-8",
       success: function(response) {
           var responseObj = JSON.parse(response);
           var statusTxtSelector = "#status-"+id;
           if($(statusTxtSelector).length == 1) {
                $(statusTxtSelector).text(newRole);
                var arrowIcon = $(".db-right-popup").parent().children("i");
                $(".db-right-popup").remove();
                arrowIcon.toggleClass("icon-left-dir");
                arrowIcon.toggleClass("icon-right-dir");
           }
           msgAnimate(responseObj['message']);
       },
       error: function(e) {
           console.log(e.status);
           console.log(e.responseText);
       }
   });
}