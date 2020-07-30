<?php
class NewsModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get count by conditions
    public function getNewsCountByConditions($conditions) {
        $sql = "select news.*, users.username, users.avatar, news_category.category, count(news_reply.id) as reply_count
                from news inner join users on news.user_id = users.id 
                          inner join news_category on news.category_id = news_category.id
                          left join news_reply on news_reply.news_id = news.id and news_reply.deleted = 0
                where news.deleted = 0";
        // processing WHERE conditions
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and news.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by news.id";
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
    public function getPageNews($conditions, $pageNum, $perPage) {
        $limit = ($pageNum - 1)*$perPage;
        $sql = "select news.*, users.username, users.avatar, news_category.category, count(news_reply.id) as reply_count
                from news inner join users on news.user_id = users.id 
                          inner join news_category on news.category_id = news_category.id
                          left join news_reply on news_reply.news_id = news.id and news_reply.deleted = 0
                where news.deleted = 0";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and news.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by news.id";
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
        return $results;
    }
    public function buildRedirectURI($conditions) {
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
    public function getNewsCategories() {
        $this->db->query("select * from news_category");
        $results = $this->db->resultset();
        return $results;
    }
    public function create($data) {
        $this->db->query("insert into news (category_id,user_id,tag,cover,title,body,last_activity)
        values (:category_id,:user_id,:tag,:cover,:title,:body,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':tag', $data['tag']);
        $this->db->bind(':cover', $data['cover']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function edit($data, $news_id) {
        $sql = "update news set category_id = :category_id,
                                          user_id = :user_id,
                                          tag = :tag,".
                                          (isset($data['cover'])?"cover = :cover,":"").
                                          "title = :title,
                                          body = :body,
                                          last_activity = :last_activity
                          where id = :news_id";
        $this->db->query($sql);
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':tag', $data['tag']);
        if(isset($data['cover'])) {
            $this->db->bind(':cover', $data['cover']);
        }
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        $this->db->bind(':news_id', $news_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getNewsById($news_id) {
        $this->db->query("select news.*, users.username, users.avatar, news_category.category,
                          count(news_reply.id) as reply_count 
                          from news inner join users on news.user_id = users.id 
                                    inner join news_category on news.category_id = news_category.id
                                    left join news_reply on news_reply.news_id = news.id and news_reply.deleted = 0
                                    where news.id = :news_id and news.deleted = 0 
                                    group by news.id");
        $this->db->bind(':news_id',$news_id);
        //Assign Result Set
        $results = $this->db->resultset();
        if(count($results) == 1) {
            return $results[0];
        } else {
            return NULL;
        }
    }
    public function getAllCategories() {
        $this->db->query("select * from news_category where deleted = 0");
        $result = $this->db->resultset();
        return $result;
    }
    public function getNewsReplyCount($news_id) {
        $this->db->query("select id from news_reply where news_id = :news_id and deleted = 0");
        $this->db->bind(':news_id', $news_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function delete($data) {
        $news_id = $data['id'];
        $this->db->query("update news set deleted = 1
                          where id = :news_id");
        $this->db->bind(':news_id', $news_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function likedNews($news_id) {
        if (!isLoggedIn()) {
            return false;
        } else {
            $user_id = getUser()['user_id'];
            $this->db->query("select * from news_likes where user_id = :user_id and news_id = :news_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":news_id", $news_id);
            $results = $this->db->resultset();
            if (count($results) == 0 || $results[0]['deleted'] != 0) {
                return false;
            } else {
                return true;
            }
        }
    }
    public function likeNews($user_id, $news_id, $curCount) {
        $this->db->query("select * from news_likes where user_id = :user_id and news_id = :news_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":news_id", $news_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $this->db->query("insert into news_likes(user_id, news_id) values (:user_id, :news_id)");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":news_id", $news_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this news";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        } else {
            $this->db->query("update news_likes set deleted = 0
                              where user_id = :user_id and news_id= :news_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":news_id", $news_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this news";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }
    public function unlikeNews($user_id, $news_id, $curCount) {
        $this->db->query("select * from news_likes where user_id = :user_id and news_id = :news_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":news_id", $news_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $response['success'] = FALSE;
            $response['message'] = "Something went wrong!";
        } else {
            $this->db->query("update news_likes set deleted = 1
                              where user_id = :user_id and news_id= :news_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":news_id", $news_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully unliked this news";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }
    public function setNewsLikeCount($news_id, $countToSet) {
        $this->db->query("update news set like_count = :countToSet
                                  where id = :news_id");
        $this->db->bind(":countToSet", $countToSet);
        $this->db->bind(":news_id", $news_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
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
                        where news_id = :news_id and comment_id = -1");
        $this->db->bind(':news_id', $news_id);
        $results = $this->db->resultset();
        return $results;
    }
    public function getCommentById($reply_id) {
        $this->db->query("select news_reply.*, users.username, users.avatar from 
                        news_reply inner join users on news_reply.user_id = users.id
                        where news_reply.id = :id");
        $this->db->bind(':id', $reply_id);
        $results = $this->db->resultset();
        if(count($results) == 1) {
            return $results[0];
        } else {
            return NULL;
        }
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
    public function getTagNameById($tag_id) {
        $this->db->query("select tag, tag_color from news_tag where id = :id");
        $this->db->bind(':id', $tag_id);
        $result = $this->db->resultset()[0];
        return $result;
    }
    public function addOneNewsViewCount($news_id, $view_count) {
        $this->db->query("update news set view_count = :view_count
                          where id= :news_id");
        $this->db->bind(':view_count', $view_count);
        $this->db->bind(':news_id', $news_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>