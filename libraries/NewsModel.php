<?php
class NewsModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getNewsCategories() {
        $this->db->query("select * from news_category");
        $results = $this->db->resultset();
        return $results;
    }
    public function create($data) {
        $this->db->query("insert into news (category_id,user_id,tag, title,body,last_activity)
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
    public function getAllNews() {
        $this->db->query("select news.*, users.username, users.avatar, news_category.category 
                          from news inner join users on news.user_id = users.id 
                                    inner join news_category on news.category_id = news_category.id 
                                    order by create_date desc");
        $results = $this->db->resultset();
        return $results;
    }
    public function getNewsById($news_id) {
        $this->db->query("select news.*, users.username, users.avatar, news_category.category 
                          from news inner join users on news.user_id = users.id 
                                    inner join news_category on news.category_id = news_category.id 
                                    where news.id = :news_id");
        $this->db->bind(':news_id',$news_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
    public function postNewsComment($data) {
        $this->db->query("insert into news_reply(user_id, body, news_id, replyee_id, comment_id) 
        values (:user_id, :body, :news_id, :replyee_id, :comment_id)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':news_id', $data['news_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':replyee_id', $data['replyee_id']);
        $this->db->bind(':comment_id', $data['comment_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getCommentsByNews_id($news_id) {
        $this->db->query("select news_reply.*, users.username, users.avatar from 
                        news_reply inner join users on news_reply.user_id = users.id
                        where news_id = :news_id and replyee_id = -1 and comment_id = -1");
        $this->db->bind(':news_id', $news_id);
        $results = $this->db->resultset();
        return $results;
    }
    public function getAllRepliesUnderComment($news_id, $comment_id) {
        $this->db->query("select news_reply.*, users.username, users.avatar from 
                          news_reply inner join users on news_reply.user_id = users.id
                          where news_id = :news_id and comment_id = :comment_id");
        $this->db->bind(':news_id', $news_id);
        $this->db->bind(':comment_id', $comment_id);
        $result = $this->db->resultSet();
        return $result;
    }
}
?>