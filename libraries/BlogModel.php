<?php
class BlogModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get all blogs
    public function getAllBlogs(){
        $this->db->query("select blog.*, users.username, users.avatar, blog_category.name, count(blog_reply.id) as reply_num 
                          from blog inner join users on blog.user_id = users.id 
                                    inner join blog_category on blog.category_id = blog_category.id 
                                    inner join blog_reply on blog.id = blog_reply.blog_id 
                                    group by blog.id order by create_date desc");
        
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
    public function getBlogById($blog_id) {
        $this->db->query("select blog.*, users.username, users.avatar, blog_category.name, count(blog_reply.id) as reply_num 
                          from blog inner join users on blog.user_id = users.id 
                                    inner join blog_category on blog.category_id = blog_category.id 
                                    inner join blog_reply on blog.id = blog_reply.blog_id 
                                    where blog.id = :blog_id
                                    group by blog.id");
        $this->db->bind(':blog_id',$blog_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
    public function getRepliesByBlog_id($blog_id) {
        $this->db->query("select * from blog_reply where blog_id = :blog_id");
        $this->db->bind(':blog_id', $blog_id);
        $results = $this->db->resultset();
        return $results;
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
}