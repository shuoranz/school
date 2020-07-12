<?php
class CourseModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get all courses
    public function getAllCourses($category_id){
		$categoryCondition = $category_id == "" ? "1" : "course.category_id = :category_id";
        $this->db->query("select course.*, users.username, users.avatar, course_category.name 
                          from course inner join users on course.created_by = users.id 
                                    inner join course_category on course.category_id = course_category.id 
									where $categoryCondition 
                                    order by course.id asc");
        $this->db->bind(':category_id',$category_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
	public function getCourseVideosByCourseId($course_id) {
        $this->db->query("select * from course_video
                                    where course_id = :course_id");
        $this->db->bind(':course_id',$course_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
    public function getCourseById($course_id) {
        $this->db->query("select course.*, users.username, users.avatar, course_category.name 
                          from course inner join users on course.created_by = users.id 
                                    inner join course_category on course.category_id = course_category.id 
                                    where course.id = :course_id");
        $this->db->bind(':course_id',$course_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
	public function getVideoById($video_id) {
        $this->db->query("select * from course_video where id = :video_id");
        $this->db->bind(':video_id',$video_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
    public function getCourseReplyCount($course_id) {
        $this->db->query("select id from course_reply where course_id = :course_id");
        $this->db->bind(':course_id',$course_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
	public function getVideoReplyCount($video_id) {
        $this->db->query("select id from course_video_reply where video_id = :video_id");
        $this->db->bind(':video_id',$video_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    public function getTagNameById($tag_id) {
        $this->db->query("select tag, tag_color from course_tag where id = :id");
        $this->db->bind(':id', $tag_id);
        $result = $this->db->resultSet()[0];
        return $result;
    }
    public function isLoggedUserAdmin($created_by) {
        $this->db->query("select * from admin where id = :id");
        $this->db->bind(':id', $created_by);
        $rows = $this->db->resultset();
        return $this->db->rowCount() > 0;
    }
    public function getAllRepliesUnderCourseComment($course_id, $comment_id) {
        $this->db->query("select course_reply.*, users.username, users.avatar from 
                          course_reply inner join users on course_reply.created_by = users.id
                          where course_id = :course_id and comment_id = :comment_id");
        $this->db->bind(':course_id', $course_id);
        $this->db->bind(':comment_id', $comment_id);
        $result = $this->db->resultSet();
        return $result;
    }
	public function getAllRepliesUnderVideoComment($video_id, $comment_id) {
        $this->db->query("select course_video_reply.*, users.username, users.avatar from 
                          course_video_reply inner join users on course_video_reply.created_by = users.id
                          where video_id = :video_id and comment_id = :comment_id");
        $this->db->bind(':video_id', $video_id);
        $this->db->bind(':comment_id', $comment_id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function create($data) {
        $this->db->query("insert into course (category_id,created_by,tag, title,body,last_activity)
        values (:category_id,:created_by,:tag, :title,:body,:last_activity)");
        
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':created_by',$data['created_by']);
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
    public function postCourseComment($data) {
        $this->db->query("insert into course_reply(created_by, body, course_id, replyee_id, comment_id) 
        values (:created_by, :body, :course_id, :replyee_id, :comment_id)");
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':replyee_id', $data['replyee_id']);
        $this->db->bind(':comment_id', $data['comment_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	public function postVideoComment($data) {
        $this->db->query("insert into course_video_reply(created_by, body, video_id, replyee_id, comment_id) 
        values (:created_by, :body, :video_id, :replyee_id, :comment_id)");
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':video_id', $data['video_id']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':replyee_id', $data['replyee_id']);
        $this->db->bind(':comment_id', $data['comment_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getCommentsByCourse_id($course_id) {
        $this->db->query("select course_reply.*, users.username, users.avatar from 
                        course_reply inner join users on course_reply.created_by = users.id
                        where course_id = :course_id and replyee_id = -1 and comment_id = -1");
        $this->db->bind(':course_id', $course_id);
        $results = $this->db->resultset();
        return $results;
    }
    public function getCommentsByVideo_id($video_id) {
        $this->db->query("select course_video_reply.*, users.username, users.avatar from 
                        course_video_reply inner join users on course_video_reply.created_by = users.id
                        where video_id = :video_id and replyee_id = -1 and comment_id = -1");
        $this->db->bind(':video_id', $video_id);
        $results = $this->db->resultset();
        return $results;
    }
}