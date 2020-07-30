<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = isLoggedIn() ? getUser()['user_id'] : -1;
        $news_id = $_POST["newsId"];
        $like = $_POST["isLike"];
        $curCount = $_POST['curCount'];
        $responseObj = array();
        if($user_id == -1) {
            $responseObj['success'] = FALSE;
            $responseObj['message'] = "Please sign in to like News";
        } else {
            $newsModel = new NewsModel;
            if ($like == "true") {
                $responseObj = $newsModel->likeNews($user_id, $news_id, $curCount);
                if($responseObj['success']) {
                    $addCount = $newsModel->setNewsLikeCount($news_id, $curCount+1);
                    if(!$addCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update news like count!";
                    } 
                }
            } else {
                $responseObj = $newsModel->unlikeNews($user_id, $news_id, $curCount);
                if($responseObj['success']) {
                    $decCount = $newsModel->setNewsLikeCount($news_id, $curCount-1);
                    if(!$decCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update news like count!";
                    } 
                }
            }
        }
        // $info = "hello, " . $user_id;
        // $arr = array('user_id' => $info);
        exit(json_encode($responseObj));
    }
?>