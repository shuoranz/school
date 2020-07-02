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
    function getCategories(){
        $db=new Database;
        $db->query('select * from forum_category');
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results;
    }
    // Get all blog_categories in DB
    function getBlogCategories() {
        $db=new Database;
        $db->query('select * from blog_category');
        //Run query and assign it to results variable
        $results = $db->resultset();
        //return result
        return $results;
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

?>