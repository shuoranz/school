<?php
class BlogModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get count by conditions
    public function getBlogCountByConditions($conditions) {
        $sql = "select blog.*, users.username, users.avatar, blog_category.name, count(blog_reply.id) as reply_count
                from blog inner join users on blog.user_id = users.id 
                          inner join blog_category on blog.category_id = blog_category.id
                          left join blog_reply on blog_reply.blog_id = blog.id and blog_reply.deleted = 0
                where blog.deleted = 0 and blog.status = 'published'";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and blog.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by blog.id";
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
  
    public function getPageBlogs($conditions, $pageNum, $perPage){
        $limit = ($pageNum - 1)*$perPage; 
        $sql = "select blog.*, users.username, users.avatar, blog_category.name, 
                count(blog_reply.id) as reply_count
                from blog inner join users on blog.user_id = users.id 
                          inner join blog_category on blog.category_id = blog_category.id
                          left join blog_reply on blog_reply.blog_id = blog.id and blog_reply.deleted = 0
                where blog.deleted = 0 and blog.status = 'published'";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and blog.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by blog.id";
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
    public function getAllBlogs($conditions, $pageNum, $perPage, $admin="") {
        $limit = ($pageNum - 1)*$perPage; 
		$adminCondition = empty($admin) ? "1" : "blog.user_id = $admin";
        $sql = "select blog.*, users.username, users.avatar, blog_category.name, 
                count(blog_reply.id) as reply_count
                from blog inner join users on blog.user_id = users.id and $adminCondition
                          inner join blog_category on blog.category_id = blog_category.id
                          left join blog_reply on blog_reply.blog_id = blog.id and blog_reply.deleted = 0";
        // processing WHERE conditions.
        if (strcmp($conditions["c"], "") != 0) {
            $sql = $sql . " and blog.category_id = " . $conditions["c"];
        } 
        // processing GROUP BY conditions.
        $sql = $sql . " group by blog.id";
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
        
    public function getBlogCount($admin="") {
		$adminCondition = empty($admin) ? "1" : "user_id = $admin";
        $this->db->query("select count(*) as count from blog where $adminCondition");
        $results = $this->db->resultset();
        return $results[0]["count"];
    }
    public function getBlogById($blog_id) {
        $this->db->query("select blog.*, users.username, users.avatar, blog_category.name,
                          count(blog_reply.id) as reply_count  
                          from blog inner join users on blog.user_id = users.id 
                                    inner join blog_category on blog.category_id = blog_category.id
                                    left join blog_reply on blog_reply.blog_id = blog.id and blog_reply.deleted = 0 
                                    where blog.id = :blog_id and blog.deleted = 0 
                                    group by blog.id");
        $this->db->bind(':blog_id',$blog_id);
        //Assign Result Set
        $results = $this->db->resultset();
        if(count($results) == 1) {
            return $results[0];
        }
        return NULL;
    }
    public function getAllCategories() {
        $this->db->query("select * from blog_category where deleted = 0");
        $result = $this->db->resultset();
        return $result;
    }
    public function getBlogReplyCount($blog_id) {
        $this->db->query("select id from blog_reply where blog_id = :blog_id and deleted = 0");
        $this->db->bind(':blog_id',$blog_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function getTagNameById($tag_id) {
        $this->db->query("select tag, tag_color from blog_tag where id = :id");
        $this->db->bind(':id', $tag_id);
        $result = $this->db->resultset()[0];
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
        $result = $this->db->resultset();
        return $result;
    }
    public function create($data) {
        $this->db->query("insert into blog (category_id,user_id,tag,cover,title,body,last_activity)
        values (:category_id,:user_id,:tag,:cover,:title,:body,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':tag', $data['tag']);
        $this->db->bind(':cover', $data['cover']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':last_activity',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return $this->db->lastInsertId();
        } else {
            return -1;
        }
    }
    public function edit($data, $blog_id) {
        $sql = "update blog set category_id = :category_id,
                                          user_id = :user_id,
                                          tag = :tag,".
                                          (isset($data['cover'])?"cover = :cover,":"").
                                          "title = :title,
                                          body = :body,
                                          last_activity = :last_activity
                          where id = :blog_id";
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
        $this->db->bind(':blog_id', $blog_id);
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
                        where blog_id = :blog_id and replyee_id = -1 and comment_id = -1
                        ");
        $this->db->bind(':blog_id', $blog_id);
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
    public function addOneBlogViewCount($blog_id, $view_count) {
        $this->db->query("update blog set view_count = :view_count
                          where id= :blog_id");
        $this->db->bind(':view_count', $view_count);
        $this->db->bind(':blog_id', $blog_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function delete($data) {
        $blog_id = $data['id'];
        $this->db->query("update blog set deleted = 1
                          where id = :blog_id");
        $this->db->bind(':blog_id', $blog_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function likedBlog($blog_id) {
        if (!isLoggedIn()) {
            return false;
        } else {
            $user_id = getUser()['user_id'];
            $this->db->query("select * from blog_likes where user_id = :user_id and blog_id = :blog_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":blog_id", $blog_id);
            $results = $this->db->resultset();
            if (count($results) == 0 || $results[0]['deleted'] != 0) {
                return false;
            } else {
                return true;
            }
        }
    }
    public function likeBlog($user_id, $blog_id, $curCount) {
        $this->db->query("select * from blog_likes where user_id = :user_id and blog_id = :blog_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":blog_id", $blog_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $this->db->query("insert into blog_likes(user_id, blog_id) values (:user_id, :blog_id)");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":blog_id", $blog_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this blog";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        } else {
            $this->db->query("update blog_likes set deleted = 0
                              where user_id = :user_id and blog_id= :blog_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":blog_id", $blog_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully liked this blog";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }
    public function unlikeBlog($user_id, $blog_id, $curCount) {
        $this->db->query("select * from blog_likes where user_id = :user_id and blog_id = :blog_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":blog_id", $blog_id);
        $response = array();
        $results = $this->db->resultset();
        if (count($results) == 0) {
            $response['success'] = FALSE;
            $response['message'] = "Something went wrong!";
        } else {
            $this->db->query("update blog_likes set deleted = 1
                              where user_id = :user_id and blog_id= :blog_id");
            $this->db->bind(":user_id", $user_id);
            $this->db->bind(":blog_id", $blog_id);
            if($this->db->execute()){
                $response['success'] = TRUE;
                $response['message'] = "Successfully unliked this blog";
            } else {
                $response['success'] = FALSE;
                $response['message'] = "Something went wrong!";
            }
        }
        return $response;
    }
    public function setBlogLikeCount($blog_id, $countToSet) {
        $this->db->query("update blog set like_count = :countToSet
                                  where id = :blog_id");
        $this->db->bind(":countToSet", $countToSet);
        $this->db->bind(":blog_id", $blog_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function editBlogReply($id, $body) {
        $this->db->query("update blog_reply set body = :body
                                  where id = :id");
        $this->db->bind(":body", $body);
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function deleteBlogReply($id) {
        $this->db->query("update blog_reply set deleted = 1
                                  where id = :id");
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
