<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 

//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/course_video.php');

//Assign Variables to template object
if (!isset($_GET["vid"]) || empty($_GET["vid"])) {
	//redirect
	echo "no vid, TODO: redirect";
} else {
	$videoId = (int)$_GET["vid"];
}




	$cur_video = $course->getVideoById($videoId);

    $cur_video['reply_num'] = $course->getVideoReplyCount($videoId);
    $cur_date = $cur_video['create_date'];
    $ymd = preg_split("/[\s]+/", $cur_date)[0];
	$hms = preg_split("/[\s]+/", $cur_date)[1];
	$y = preg_split("/-/", $ymd)[0];
	$mo = preg_split("/-/", $ymd)[1];
	$d = preg_split("/-/", $ymd)[2];
	$h = preg_split("/:/", $hms)[0];
	$m = preg_split("/:/", $hms)[1];
	if (strcmp($ymd, date("Y-m-d") )==0) {
		$cur_video['create_date'] = $h . ":" . $m;
	} else if (strcmp($y, date("Y") )== 0) {
		$cur_video['create_date'] = $mo . "-" . $d;
	} else {
		$cur_video['create_date'] = $ymd;
	}
    $comments = $course->getCommentsByVideo_id($videoId);
    
    for($i = 0; $i < count($comments); $i++) {
        $comments[$i]['replies'] = array();
        $replies = $course->getAllRepliesUnderVideoComment($videoId, $comments[$i]['id']);
        for($j = 0; $j < count($replies); $j++) {
            $comments[$i]['replies'][] = array();
            foreach($replies[$j] as $key=>$value) {
                $comments[$i]['replies'][$j][$key] = $value;
            }
        }
    }
$template->comments = $comments;
$template->video = $cur_video;
$template->course = $course->getCourseById($template->video["course_id"]);
	
	
//Display template
echo $template;

?>