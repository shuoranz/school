<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 

//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/course_detail.php');

//Assign Variables to template object
if (!isset($_GET["cid"]) || empty($_GET["cid"])) {
	//redirect
	echo "no cid, TODO: redirect";
} else {
	$courseId = (int)$_GET["cid"];
}


	$cur_course = $course->getCourseById($courseId);

    $cur_course['reply_num'] = $course->getCourseReplyCount($courseId);
    $cur_date = $cur_course['create_date'];
    $ymd = preg_split("/[\s]+/", $cur_date)[0];
	$hms = preg_split("/[\s]+/", $cur_date)[1];
	$y = preg_split("/-/", $ymd)[0];
	$mo = preg_split("/-/", $ymd)[1];
	$d = preg_split("/-/", $ymd)[2];
	$h = preg_split("/:/", $hms)[0];
	$m = preg_split("/:/", $hms)[1];
	if (strcmp($ymd, date("Y-m-d") )==0) {
		$cur_course['create_date'] = $h . ":" . $m;
	} else if (strcmp($y, date("Y") )== 0) {
		$cur_course['create_date'] = $mo . "-" . $d;
	} else {
		$cur_course['create_date'] = $ymd;
	}
    $comments = $course->getCommentsByCourse_id($courseId);
    
    for($i = 0; $i < count($comments); $i++) {
        $comments[$i]['replies'] = array();
        $replies = $course->getAllRepliesUnderCourseComment($courseId, $comments[$i]['id']);
        for($j = 0; $j < count($replies); $j++) {
            $comments[$i]['replies'][] = array();
            foreach($replies[$j] as $key=>$value) {
                $comments[$i]['replies'][$j][$key] = $value;
            }
        }
    }

$template->comments = $comments;
$template->course = $cur_course;
$template->videos = $course->getCourseVideosByCourseId($courseId);

//Display template
echo $template;

?>