<?php 
class TopicModel {
    //Initialize DB Variable
    private $db;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    
    //Get All Topics
    public function getAllTopics(){
        $this->db->query("select forum.*, users.username, users.avatar, forum_category.name from forum inner join users on forum.user_id = users.id inner join forum_category on forum.category_id = forum_category.id order by create_date desc");
        
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
    
    //Get Total Number of Topics
    public function getTotalTopics(){
        $this->db->query('select * from forum');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }

    //Get Total Number of forum_category
    public function getTotalCategories(){
        $this->db->query('select * from forum_category');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    
    //Get by Category
    public function getByCategory($category_id){
        $this->db->query('select forum.*, forum_category.*, users.username from forum
        inner join forum_category on forum.category_id=forum_category.id 
        inner join users on forum.user_id=users.id 
        where forum.category_id = :category_id');
        $this->db->bind(':category_id',$category_id);
        $results = $this->db->resultset();
        return $results;
    }
    
    //Get Category details
    public function getCategory($category_id){
        $this->db->query('select * from forum_category where id = :category_id');
        $this->db->bind(':category_id',$category_id);
        
        //Assign result
        $result = $this->db->single();
        return $result;
    }
    
    //Get Topic by user ID
    public function getByUser($user_id){
        $this->db->query("select forum.*, forum_category.*, users.username,users.avatar from forum
                    inner join forum_category on forum.category_id=forum_category.id
                    inner join users on forum.user_id=users.id
                    where forum.user_id = :user_id");
        $this->db->bind(':user_id',$user_id);
        $results=$this->db->resultset();
        return $results;
    }
    
    
    //Get Topic By ID
    public function getTopic($id){
        $this->db->query('select forum.*, users.username, users.name, users.avatar from forum
        inner join users on forum.user_id=users.id
        where forum.id = :id');
        $this->db->bind(':id',$id);
        
        $row = $this->db->single();
        return $row;
    }
 
    //Get replies for the topic
    public function getReplies($topic_id){
        $this->db->query('select forum_reply.*,users.* from forum_reply
        inner join users on forum_reply.user_id=users.id
        where forum_reply.topic_id = :topic_id
        order by create_date asc');
        $this->db->bind(':topic_id',$topic_id);
        $rows = $this->db->resultset();
        return $rows;
    }
    
    //get total replies
    public function getTotalReplies($topic_id){
        $this->db->query('select * from forum_reply where topic_id = '.$topic_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    
    //Create a new topic
    public function create($data) {
        $this->db->query("insert into forum (category_id,user_id,title,body,last_activity)
        values (:category_id,:user_id,:title,:body,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	
	//Edit a new topic
	public function edit($data) {
        $this->db->query("update forum set category_id=:category_id,title=:title,body=:body,last_activity=:last_activity where id=:id");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
		$this->db->bind(':id',$data['topic_id']);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    //Reply to a post
    public function reply($data){
        $this->db->query("insert into forum_reply (topic_id,user_id,body)
        values (:topic_id,:user_id,:body)");
        
        $this->db->bind(':topic_id',$data['topic_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':body',$data['body']);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}