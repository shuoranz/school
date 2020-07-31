<?php
class CourseModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    // get all courses
    public function getAllCourses($category_id, $user_id){
		$categoryCondition = $category_id == "" ? "1" : "course.category_id = :category_id";
		$userCondition = $user_id == "" ? "1" : "course.created_by = :user_id";
        $this->db->query("select course.*, users.username, users.avatar, course_category.name 
                          from course inner join users on course.created_by = users.id 
                                    inner join course_category on course.category_id = course_category.id 
									where $categoryCondition and $categoryCondition and course.deleted = 0
                                    order by course.id asc");
        $this->db->bind(':category_id',$category_id);
		if ($userCondition != "1"){
			$this->db->bind(':user_id',$user_id);
		}
		
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
	public function getCourseVideosByCourseId($course_id, $user_id = "") {
		$userCondition = $user_id == "" ? "1" : "created_by = :user_id";
        $this->db->query("select * from course_video
                                    where deleted = 0 and course_id = :course_id and " . $userCondition);
        if ($userCondition != "1") {
			$this->db->bind(':user_id',$user_id);
		}
		$this->db->bind(':course_id',$course_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
    }
    public function getCourseById($course_id) {
        $this->db->query("select course.*, users.username, users.avatar, course_category.name, users.about 
                          from course inner join users on course.created_by = users.id 
                                    inner join course_category on course.category_id = course_category.id 
                                    where course.id = :course_id");
        $this->db->bind(':course_id',$course_id);
        //Assign Result Set
        $results = $this->db->resultset();
        return $results[0];
    }
	public function getCategoryById($category_id) {
		$this->db->query("select * from course_category where id = :id");
        $this->db->bind(':id',$category_id);
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
	public function searchVideosByAttribute($search_title, $search_teacher)
	{
		if ($search_title == "" && $search_teacher == ""){
			return array();
		}
		$titleCondition = $search_title == "" ? "1" : "cv.title like :search_title";
		$teacherCondition = $search_teacher == "" ? "1" : "u.username like :search_teacher";
        $this->db->query("select cv.*, u.*, c.title as course_title from course_video cv inner join users u on cv.created_by = u.id inner join course c on c.id = cv.course_id
                                    where cv.deleted = 0 and " . $titleCondition . " and " . $teacherCondition);
        if ($titleCondition != "1") {
			$this->db->bind(':search_title','%'.$search_title.'%');
		}
		if ($teacherCondition != "1") {
			$this->db->bind(':search_teacher','%'.$search_teacher.'%');
		}
        //Assign Result Set
        $results = $this->db->resultset();
        return $results;
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
	
	public function createCourse($data) {
        $this->db->query("insert into course (`title`, `description`, `category_id`, `created_by`, `create_date`, `status`)
        values (:title, :description, :category_id, :created_by, :create_date, :status)");
        
		$data['course_title'] = $_REQUEST['course_title'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['course_description'] = $_REQUEST['course_description'];
		$data['category_id'] = $_REQUEST['category_id'];
		
        $this->db->bind(':title',$data['course_title']);
        $this->db->bind(':created_by', $data['user_id']);
        $this->db->bind(':description', $data['course_description']);
        $this->db->bind(':category_id', $data['category_id']);
		$this->db->bind(':status', 'pending');
        $this->db->bind(':create_date',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	
	public function createVideo($data) {
        $this->db->query("insert into course_video (`title`, `description`, `url`, `course_id`, `created_by`, `create_date`, `status`)
        values (:title, :description, :url, :course_id, :created_by, :create_date, :status)");
        
		$data['video_title'] = $_REQUEST['video_title'];
		$data['vimeo_id'] = $_REQUEST['vimeo_id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['video_description'] = $_REQUEST['video_description'];
		$data['course_id'] = $_REQUEST['course_id'];
		
        $this->db->bind(':title',$data['video_title']);
        $this->db->bind(':url',$data['vimeo_id']);
        $this->db->bind(':created_by', $data['user_id']);
        $this->db->bind(':description', $data['video_description']);
        $this->db->bind(':course_id', $data['course_id']);
		$this->db->bind(':status', 'pending');
        $this->db->bind(':create_date',date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	
	public function createCategory($data)
	{
		$this->db->query("insert into course_category (`category`, `name`) values (:category, :name)");
		
        $this->db->bind(':category',$data['create_category']);
        $this->db->bind(':name',$data['create_category']);
        
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