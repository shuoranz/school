<?php

/*
 * db_helper.php file contain functions that templates require 
 * like category count, reply count etc
 */

    //Count number of replies for each topic
    function replyCount($topic_id){
        $db = new Database;
        $db->query('select * from forum_reply where topic_id = :topic_id');
        $db->bind(':topic_id',$topic_id);
        //Assign rows
        $rows = $db->resultset();
        //Get Count
        return $db->rowCount();
    }

    //Get all categories in DB
    function getCategories($admin = 0){
        $db=new Database;
		if ($admin == 0)  {
			$db->query('select * from forum_category where deleted = 2');	// 0 is pending, 1 is deleted, 2 is published
		} else {
			$db->query('select * from forum_category');
		}
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results;
    }
	function getAllCourseCategoryById($id){
		$db=new Database;
		/*
		if ($admin == 0) {
			$db->query('select *, (select count(*) from course where category_id = course_category.id) course_cnt from course_category where course_category.deleted = 2');	// 0 is pending, 1 is deleted, 2 is published
		} else {
			$db->query('select * from course_category');
		}
		*/
		$db->query('select * from course_category where id = ' . (int)$id);
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results[0]["name"];
	}
	function getAllCourseCategories($admin = 0){
		$db=new Database;
		if ($admin == 0) {
			$db->query('select *, (select count(*) from course where category_id = course_category.id) course_cnt from course_category where course_category.deleted = 2');	// 0 is pending, 1 is deleted, 2 is published
		} else {
			$db->query('select * from course_category');
		}
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results;
	}
    // Get all blog_categories in DB
    function getBlogCategories($admin = 0) {
        $db=new Database;
		if ($admin == 0) {
			$db->query('select * from blog_category where deleted = 2');	// 0 is pending, 1 is deleted, 2 is published
		} else {
			$db->query('select * from blog_category');
		}
        //Run query and assign it to results variable
        $results = $db->resultset($admin = 0);
        //return result
        return $results;
    }
    function getNewsCategories($admin = 0) {
        $db=new Database;
		if ($admin == 0) {
			$db->query('select * from news_category where deleted = 2');	// 0 is pending, 1 is deleted, 2 is published
		} else {
			$db->query('select * from news_category');
		}
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results;
    }
    function getBlogTags() {
        $db=new Database;
        $db->query("select * from blog_tag where deleted = 0");
        $result = $db->resultset();
        return $result;
    }
    function getNewsTags() {
        $db=new Database;
        $db->query("select * from news_tag where deleted = 0");
        $result = $db->resultset();
        return $result;
    }
    //User Post Count
    function userPostCount($user_id){
        $db = new Database;
        $db->query('select * from forum where user_id = :user_id');
        $db->bind(':user_id',$user_id);
        $rows = $db->resultset();
        $topic_count = $db->rowCount();
        
        $db->query('select * from forum_reply where user_id = :user_id');
        $db->bind(':user_id',$user_id);
        $rows = $db->resultset();
        $reply_count = $db->rowCount();
        
        return $topic_count + $reply_count;
    }
    
    //Count post by category
    function postCountByCategory($category_id){
        $db = new Database;
        $db->query('select * from forum where category_id = :category_id');
        $db->bind(':category_id',$category_id);
        $result = $db->resultset();
        $category_count = $db->rowCount();
        return $category_count;
    }

    //Count total number of posts
    function totalPostCount(){
        $db = new Database;
        $db->query('select * from forum where 1');
        $result = $db->resultset();
        $count = $db->rowCount();
        return $count;
    }
    function getUsernameByBlogReplyId($reply_id) {
        $db = new Database;
        $db->query('select blog_reply.id, users.username from 
                    blog_reply inner join users on blog_reply.user_id = users.id
                    where blog_reply.id = :reply_id');
        $db->bind(':reply_id', $reply_id);
        $result = $db->resultset()[0];
        return $result['username'];
    }
	function getUsernameByCourseReplyId($reply_id) {
        $db = new Database;
        $db->query('select course_reply.id, users.username from 
                    course_reply inner join users on course_reply.created_by = users.id
                    where course_reply.id = :reply_id');
        $db->bind(':reply_id', $reply_id);
        $result = $db->resultset()[0];
        return $result['username'];
    }
	function getUsernameByVideoReplyId($reply_id) {
		$db = new Database;
        $db->query('select course_video_reply.id, users.username from 
                    course_video_reply inner join users on course_video_reply.created_by = users.id
                    where course_video_reply.id = :reply_id');
        $db->bind(':reply_id', $reply_id);
        $result = $db->resultset()[0];
        return $result['username'];
	}
	function getUsernameByForumReplyId($reply_id) {
		$db = new Database;
        $db->query('select forum_reply.id, users.username from 
                    forum_reply inner join users on forum_reply.created_by = users.id
                    where forum_reply.id = :reply_id');
        $db->bind(':reply_id', $reply_id);
        $result = $db->resultset()[0];
        return $result['username'];
	}
	
	function getUserNameByUserId($user_id) {
		if ($user_id == 0){
			return "";
		}
		$db = new Database;
        $db->query('select * from users where id = :user_id');
        $db->bind(':user_id', $user_id);
        $result = $db->resultset()[0];
        return $result['username'];
	}

?>