<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = isLoggedIn() ? getUser()['user_id'] : -1;
        $blog_id = $_POST["blogId"];
        $like = $_POST["isLike"];
        $curCount = $_POST['curCount'];
        $responseObj = array();
        if($user_id == -1) {
            $responseObj['success'] = FALSE;
            $responseObj['message'] = "Please sign in to like blogs";
        } else {
            $blog = new BlogModel;
            if ($like == "true") {
                $responseObj = $blog->likeBlog($user_id, $blog_id, $curCount);
                if($responseObj['success']) {
                    $addCount = $blog->setBlogLikeCount($blog_id, $curCount+1);
                    if(!$addCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update blog like count!";
                    } 
                }
            } else {
                $responseObj = $blog->unlikeBlog($user_id, $blog_id, $curCount);
                if($responseObj['success']) {
                    $decCount = $blog->setBlogLikeCount($blog_id, $curCount-1);
                    if(!$decCount) {
                        $responseObj['success'] = FALSE;
                        $responseObj['message'] = "Couldn't update blog like count!";
                    } 
                }
            }
        }
        // $info = "hello, " . $user_id;
        // $arr = array('user_id' => $info);
        exit(json_encode($responseObj));
    }
?>