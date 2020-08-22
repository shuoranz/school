<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isStudentOrAbove()) {
    redirect("/forum", "Please request a demo to view forum topic", "error");
}
//Create Topic Object
$topic = new TopicModel;

//Get Category id from url
$topic_id = $_GET['id'];

//Process Reply message
if(isset($_POST['do_reply'])){
    //Create Data Array
    $data=array();
    $data['topic_id'] = $topic_id;
    $data['body'] = $_POST['body'];
    $data['user_id'] = getUser()['user_id'];
    
    //Create Validator Object
    $validate = new Validator;
    //Required Fields
    $field_array = array('body');
    
    if($validate->isRequired($field_array)){
        if($topic->reply($data)){
            redirect('topic.php?id='.$topic_id,'Your reply has been posted','success');
        } else {
            redirect('topic.php?id='.$topic_id,'Reply not posted. Something went wrong','error');
        }
    } else {
        redirect('topic.php?id='.$topic_id,'Reply not posted. Message must not be empty','error');
    }
}

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/forum_thread.php');
    $cur_topic = $topic->getTopic($topic_id);
    //echo $cur_topic['status'];
    //echo $cur_topic['imgs'];
    $topic->addOneTopicViewCount($topic_id, $cur_topic['view_count']+1);
    $cur_topic['reply_num'] = $topic->getTopicReplyCount($topic_id);
    $cur_date = $cur_topic['create_date'];
    $ymd = preg_split("/[\s]+/", $cur_date)[0];
	$hms = preg_split("/[\s]+/", $cur_date)[1];
	$y = preg_split("/-/", $ymd)[0];
	$mo = preg_split("/-/", $ymd)[1];
	$d = preg_split("/-/", $ymd)[2];
	$h = preg_split("/:/", $hms)[0];
	$m = preg_split("/:/", $hms)[1];
	if (strcmp($ymd, date("Y-m-d") )==0) {
		$cur_topic['create_date'] = $h . ":" . $m;
	} else if (strcmp($y, date("Y") )== 0) {
		$cur_topic['create_date'] = $mo . "-" . $d;
	} else {
		$cur_topic['create_date'] = $ymd;
    }
    
    $comments = $topic->getCommentsByTopic_id($topic_id);
    
    for($i = 0; $i < count($comments); $i++) {
        $comments[$i]['replies'] = array();
        $replies = $topic->getAllRepliesUnderTopicComment($topic_id, $comments[$i]['id']);
        for($j = 0; $j < count($replies); $j++) {
            $comments[$i]['replies'][] = array();
            foreach($replies[$j] as $key=>$value) {
                $comments[$i]['replies'][$j][$key] = $value;
            }
        }
    }
    $imgs = array();
    if (isset($cur_topic['imgs']) && $cur_topic['imgs'] != "") {
        $imgs = preg_split("/,/", $cur_topic['imgs']);
    }




//Assign Variables to template object
//var_dump($topic->getReplies($topic_id));
$template->topic = $cur_topic;
//$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)['title'];
$template->comments = $comments;
$template->imgs = $imgs;

//Display template
echo $template;

?>