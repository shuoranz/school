<?php 
class LogModel {
    //Initialize DB Variable
    private $db;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    public function writeToSystemLog($user_id, $action, $item, $item_id, $content) {
        $this->db->query("insert into log (date, user_id, action, item, item_id) 
                        values (:date, :user_id, :action, :item, :item_id)");
        $this->db->bind(':date', date("Y-m-d"));
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':action', $action);
        $this->db->bind(':item', $item);
        $this->db->bind(':item_id', $item_id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getLogsByDate() {
        $this->db->query("select distinct date from log order by date desc");
        $results = $this->db->resultset();
        return $results;
    }
    public function getLogsOnDate($date) {
		/*
        $this->db->query("
        select log.*, users.username from log 
                        inner join users on log.user_id = users.id 
                        where date = :date order by log.time desc");
        $this->db->bind(':date', $date);
        $results = $this->db->resultset();
        return $results;
		*/
		$log_tables = array(
			"blog" => "title",
			"course" => "title",
			"forum" => "title",
			"invitation_code" => "code",
			"news" => "title",
			"course_video" => "title",
			"users_demo" => "email",
			"blog_category" => "name",
			"course_category" => "name",
			"news_category" => "name",
			"forum_category" => "name"
		);
		$all_result = array();
		foreach ($log_tables as $table => $table_attribute) {
			$temp_result = $this->getLogsOnDateJoinTable($table, $table_attribute, $date);
			$all_result = array_merge($all_result, $temp_result);
		}
		$temp_result = $this->getLogsOnDateJoinUsers($date);
		$all_result = array_merge($all_result, $temp_result);
		usort($all_result, function($a, $b) {return strcmp($a["time"], $b["time"]);});
		
		return $all_result;
    }

	private function getLogsOnDateJoinTable($table, $attribute, $date){
		$this->db->query("
        select log.*, users.email, users.role, $table.$attribute as item_content from log 
                        inner join users on log.user_id = users.id
						inner join $table on $table.id = log.item_id and log.item = '$table'
                        where date = :date order by log.time desc");
        $this->db->bind(':date', $date);
        $results = $this->db->resultset();
        return $results;
	}
	private function getLogsOnDateJoinUsers($date){
		$this->db->query("
		select log.*, users.email, users.role, (select email from users where id = log.item_id) as item_content, (select role from users where id = log.item_id) as item_content_role
		from log 
		inner join users on log.user_id = users.id 
		where item = 'users' and date = :date 
		order by log.time desc");
		
        $this->db->bind(':date', $date);
        $results = $this->db->resultset();
        return $results;
	}
}