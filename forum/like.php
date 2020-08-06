<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = isLoggedIn() ? (isStudentOrAbove() ? getUser()['user_id'] : -1) : -1;
        $topic_id = $_POST["topicId"];
        $like = $_POST["isLike"];
        $curCount = $_POST['curCount'];
        $responseObj = array();
        if($user_id == -1) {
            $responseObj['success'] = FALSE;
            if(!isLoggedIn()) {
                $responseObj['message'] = "Please sign in to like topics";
            } else if(!isStudentOrAbove()) {
                $responseObj['message'] = "Please request an invitation code to upgrade your student account to unlock this feature.";
            }
        } else {
            $topic = new TopicModel;
            if ($like == "true") {
                $responseObj = $topic->likeTopic($user_id, $topic_id, $curCount);
                if($responseObj['success']) {
                    $addCount = $topic->setTopicLikeCount($topic_id, $curCount+1);
                    if(!$addCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update topic like count!";
                    } 
                }
            } else {
                $responseObj = $topic->unlikeTopic($user_id, $topic_id, $curCount);
                if($responseObj['success']) {
                    $decCount = $topic->setTopicLikeCount($topic_id, $curCount-1);
                    if(!$decCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update topic like count!";
                    } 
                }
            }
        }
        // $info = "hello, " . $user_id;
        // $arr = array('user_id' => $info);
        exit(json_encode($responseObj));
    }
?>