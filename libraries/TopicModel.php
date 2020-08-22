<?php 
class TopicModel {
    //Initialize DB Variable
    private $db;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    // get count by conditions
    public function getTopicCountByConditions($conditions) {
        $sql = "select forum.*, users.username, users.avatar, forum_category.name, count(forum_reply.id) as reply_count
                from forum inner join users on forum.user_id = users.id 
                          inner join forum_category on forum.category_id = forum_category.id
                          left join forum_reply on forum_reply.topic_id = forum.id and forum_reply.deleted = 0
                where forum.deleted = 0";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and forum.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by forum.id";
        // processing ORDER BY conditions.
        if (strcmp($conditions["ob"], "cd") == 0) {
            $sql = $sql . " order by create_date"; 
        } else if (strcmp($conditions["ob"], "lc") == 0) {
            $sql = $sql . " order by like_count";
        } else if (strcmp($conditions["ob"], "vc") == 0) {
            $sql = $sql . " order by view_count";
        } else if (strcmp($conditions["ob"], "rc") == 0) {
            $sql = $sql . " order by reply_count";
        }
        // processing desc or asc
        if ($conditions["desc"] == 1) {
            $sql = $sql . " desc";
        }
        $this->db->query($sql);
        $results = $this->db->resultset();
        return count($results);
    }

    //Get All Topics
    public function getPageTopics($conditions, $pageNum, $perPage){
        $limit = ($pageNum - 1)*$perPage; 
        $sql = "select forum.*, users.username, users.avatar, forum_category.name, 
                          count(forum_reply.id) as reply_count
                          from forum inner join users on forum.user_id = users.id 
                                     inner join forum_category on forum.category_id = forum_category.id 
                                     left join forum_reply on forum_reply.topic_id = forum.id and forum_reply.deleted = 0
                                     where forum.deleted = 0 and forum.top = 0";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and forum.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by forum.id";
        // processing ORDER BY conditions.
        if (strcmp($conditions["ob"], "cd") == 0) {
            $sql = $sql . " order by create_date"; 
        } else if (strcmp($conditions["ob"], "lc") == 0) {
            $sql = $sql . " order by like_count";
        } else if (strcmp($conditions["ob"], "vc") == 0) {
            $sql = $sql . " order by view_count";
        } else if (strcmp($conditions["ob"], "rc") == 0) {
            $sql = $sql . " order by reply_count";
        }
        // processing desc or asc
        if ($conditions["desc"] == 1) {
            $sql = $sql . " desc";
        }
        if ($pageNum > 0) {
            $sql = $sql . " limit " . $limit . "," . $perPage;
        }
        $this->db->query($sql);
        $results = $this->db->resultset();
        return $results;
    }
	
	//Get Top Topics
    public function getTopTopics($conditions, $pageNum, $perPage){
		if ($pageNum != 1){
			return array();
		}
        $limit = ($pageNum - 1)*$perPage; 
        $sql = "select forum.*, users.username, users.avatar, forum_category.name, 
                          count(forum_reply.id) as reply_count
                          from forum inner join users on forum.user_id = users.id 
                                     inner join forum_category on forum.category_id = forum_category.id 
                                     left join forum_reply on forum_reply.topic_id = forum.id and forum_reply.deleted = 0
                                     where forum.deleted = 0 and forum.top = 1";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and forum.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by forum.id";
        // processing ORDER BY conditions.
        if (strcmp($conditions["ob"], "cd") == 0) {
            $sql = $sql . " order by create_date"; 
        } else if (strcmp($conditions["ob"], "lc") == 0) {
            $sql = $sql . " order by like_count";
        } else if (strcmp($conditions["ob"], "vc") == 0) {
            $sql = $sql . " order by view_count";
        } else if (strcmp($conditions["ob"], "rc") == 0) {
            $sql = $sql . " order by reply_count";
        }
        // processing desc or asc
        if ($conditions["desc"] == 1) {
            $sql = $sql . " desc";
        }
        if ($pageNum > 0) {
            $sql = $sql . " limit " . $limit . "," . $perPage;
        }
        $this->db->query($sql);
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
    public function getAllCategories() {
        $this->db->query("select * from forum_category where deleted = 2");
        $result = $this->db->resultset();
        return $result;
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
        $this->db->query("insert into forum (category_id,user_id,title,body,imgs,last_activity)
        values (:category_id,:user_id,:title,:body,:imgs,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':imgs',$data['imgs']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	public function likedTopic($topic_id) {
        if (!isLoggedIn()) {
            return false;
        } else {
            $user_id = getUser()['user_id'];
            $this->db->query("select * from forum_likes where user_id = :user_id and topic_id = :topic_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":topic_id", $topic_id);
            $results = $this->db->resultset();
            if (count($results) == 0 || $results[0]['deleted'] != 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function likeTopic($user_id, $topic_id, $curCount) {
        $this->db->query("select * from forum_likes where user_id = :user_id and topic_id = :topic_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":topic_id", $topic_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $this->db->query("insert into forum_likes(user_id, topic_id) values (:user_id, :topic_id)");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":topic_id", $topic_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this topic";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        } else {
            $this->db->query("update forum_likes set deleted = 0
                              where user_id = :user_id and topic_id= :topic_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":topic_id", $topic_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this topic";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }

    public function unlikeTopic($user_id, $topic_id, $curCount) {
        $this->db->query("select * from forum_likes where user_id = :user_id and topic_id = :topic_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":topic_id", $topic_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $response['success'] = FALSE;
            $response['message'] = "Something went wrong!";
        } else {
            $this->db->query("update forum_likes set deleted = 1
                              where user_id = :user_id and topic_id= :topic_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":topic_id", $topic_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully unliked this topic";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }
    public function setTopicLikeCount($topic_id, $countToSet) {
        $this->db->query("update forum set like_count = :countToSet
                                  where id = :topic_id");
        $this->db->bind(":countToSet", $countToSet);
        $this->db->bind(":topic_id", $topic_id);
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
	
	public function getCommentsByTopic_id($topic_id) {
        $this->db->query("select forum_reply.*, users.username, users.avatar from 
                        forum_reply inner join users on forum_reply.user_id = users.id
                        where topic_id = :topic_id and replyee_id = -1 and comment_id = -1");
        $this->db->bind(':topic_id', $topic_id);
        $results = $this->db->resultset();
        return $results;
    }
    
    public function buildRedirectURI ($conditions) {
        $result = "?";
        foreach($conditions as $name=>$value) {
            if (strcmp($name, "c") == 0 && strcmp($conditions["c"], "") != 0) {
                $result = $result . "c=" . $conditions["c"] . "&";
            } else if (strcmp($name, "ob") == 0 && strcmp($conditions["ob"], "cd") != 0) {
                $result = $result . "ob=" . $conditions["ob"] . "&";
            } else if (strcmp($name, "desc") == 0 && $conditions["desc"] != 1) {
                $result = $result . "desc=" . $conditions["desc"] . "&";
            }
        }
        return $result;
    }

	public function getAllRepliesUnderTopicComment($topic_id, $comment_id) {
        $this->db->query("select forum_reply.*, users.username, users.avatar from 
                          forum_reply inner join users on forum_reply.user_id = users.id
                          where topic_id = :topic_id and comment_id = :comment_id");
        $this->db->bind(':topic_id', $topic_id);
        $this->db->bind(':comment_id', $comment_id);
        $result = $this->db->resultSet();
        return $result;
    }
	
	public function getTopicReplyCount($topic_id) {
        $this->db->query("select id from forum_reply where topic_id = :topic_id");
        $this->db->bind(':topic_id',$topic_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
	
	public function postTopicComment($data) {
        $this->db->query("insert into forum_reply(user_id, body, topic_id, replyee_id, comment_id) 
        values (:user_id, :body, :topic_id, :replyee_id, :comment_id)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':topic_id', $data['topic_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':replyee_id', $data['replyee_id']);
        $this->db->bind(':comment_id', $data['comment_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function addOneTopicViewCount($topic_id, $view_count) {
        $this->db->query("update forum set view_count = :view_count
                          where id= :topic_id");
        $this->db->bind(':view_count', $view_count);
        $this->db->bind(':topic_id', $topic_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}