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