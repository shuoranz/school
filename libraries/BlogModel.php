<?php
class BlogModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get all blogs
    public function getAllBlogs(){
        $this->db->query("select blog.*, users.username, users.avatar, blog_category.name 
                          from blog inner join users on blog.user_id = users.id 
                                    inner join blog_category on blog.category_id = blog_category.id 
                                    order by create_date desc");
        
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
    public function getBlogById($blog_id) {
        $this->db->query("select blog.*, users.username, users.avatar, blog_category.name 
                          from blog inner join users on blog.user_id = users.id 
                                    inner join blog_category on blog.category_id = blog_category.id 
                                    where blog.id = :blog_id");
        $this->db->bind(':blog_id',$blog_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
    public function getBlogReplyCount($blog_id) {
        $this->db->query("select id from blog_reply where blog_id = :blog_id");
        $this->db->bind(':blog_id',$blog_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function getTagNameById($tag_id) {
        $this->db->query("select tag, tag_color from blog_tag where id = :id");
        $this->db->bind(':id', $tag_id);
        $result = $this->db->resultSet()[0];
        return $result;
    }
    public function isLoggedUserAdmin($user_id) {
        $this->db->query("select * from admin where id = :id");
        $this->db->bind(':id', $user_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount() > 0;
    }
    public function getAllRepliesUnderComment($blog_id, $comment_id) {
        $this->db->query("select blog_reply.*, users.username, users.avatar from 
                          blog_reply inner join users on blog_reply.user_id = users.id
                          where blog_id = :blog_id and comment_id = :comment_id");
        $this->db->bind(':blog_id', $blog_id);
        $this->db->bind(':comment_id', $comment_id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function create($data) {
        $this->db->query("insert into blog (category_id,user_id,tag, title,body,last_activity)
        values (:category_id,:user_id,:tag, :title,:body,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':tag', $data['tag']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function postBlogComment($data) {
        $this->db->query("insert into blog_reply(user_id, body, blog_id, replyee_id, comment_id) 
        values (:user_id, :body, :blog_id, :replyee_id, :comment_id)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':blog_id', $data['blog_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':replyee_id', $data['replyee_id']);
        $this->db->bind(':comment_id', $data['comment_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getCommentsByBlog_id($blog_id) {
        $this->db->query("select blog_reply.*, users.username, users.avatar from 
                        blog_reply inner join users on blog_reply.user_id = users.id
                        where blog_id = :blog_id and replyee_id = -1 and comment_id = -1");
        $this->db->bind(':blog_id', $blog_id);
        $results = $this->db->resultset();
        return $results;
    }
    
}