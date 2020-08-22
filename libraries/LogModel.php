<?php 
class LogModel {
    //Initialize DB Variable
    private $db;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    public function writeToSystemLog($user_id, $action, $item, $item_id, $content) {
        $this->db->query("insert into log (user_id, action, item, item_id, content) 
                        values (:user_id, :action, :item, :item_id, :content)");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':action', $action);
        $this->db->bind(':item', $item);
        $this->db->bind(':item_id', $item_id);
        $this->db->bind(':content', $content);
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
        $this->db->query("select *, users.username from log 
                        inner join users on log.user_id = users.id 
                        where date = :date order by log.time desc");
        $this->db->bind(':date', $date);
        $results = $this->db->resultset();
        return $results;
    }
}