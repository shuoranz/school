<?php
class DataModel {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function publish($table, $id) {
        $sql = "update ".$table." set status = 'published'
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function setPublisher($user_id, $table, $id) {
        $sql = "update ".$table." set published_by= :publisher where id = :id";
        $this->db->query($sql);
        $this->db->bind(":publisher", $user_id);
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function revoke($table, $id) {
        $sql = "update ".$table." set status = 'pending'
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function restore($table, $id, $user_id) {
        $sql = "update ".$table." set status = 'pending',modified_by = :user_id
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->bind(":user_id", $user_id);
        if($this->db->execute()){
           $sql2 = "update ".$table." set deleted = 0
           where id = :id";
           $this->db->query($sql2);
            $this->db->bind(":id", $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function delete($table, $id, $user_id) {
        $sql = "update ".$table." set status = 'deleted', modified_by = :user_id
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->bind(":user_id", $user_id);
        if($this->db->execute()){
           $sql2 = "update ".$table." set deleted = 1
           where id = :id";
           $this->db->query($sql2);
            $this->db->bind(":id", $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function simpleDelete($table, $id, $user_id) {
        $sql = "update ".$table." set deleted = 1, modified_by = :user_id
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->bind(":user_id", $user_id);
        if($this->db->execute()){
           return true;
        } else {
            return false;
        }
    }
    public function simpleRestore($table, $id, $user_id) {
        $sql = "update ".$table." set deleted = 0, modified_by = :user_id
        where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        $this->db->bind(":user_id", $user_id);
        if($this->db->execute()){
           return true;
        } else {
            return false;
        }
    }
	public function updateCategory($table, $id, $event) {
		$sql = "update ".$table." set deleted = :deleted where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
		$this->db->bind(":deleted", $event);
        if($this->db->execute()){
           return true;
        } else {
            return false;
        }
	}
	public function createCategory($data) {
		$this->db->query("insert into ".$data['table_name']." (`category`, `name`) values (:category, :name)");
		
        $this->db->bind(':category',$data['create_category']);
        $this->db->bind(':name',$data['create_category']);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
	}
	public function updateUserRole($table, $id, $role) {
		$sql = "update users set role = :role where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
		$this->db->bind(":role", $role);
        if($this->db->execute()){
           return true;
        } else {
            return false;
        }
	}
	public function updateDemoUserRole($table, $id, $role) {
		$sql = "update users_demo set status = :role where id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
		$this->db->bind(":role", $role);
        if($this->db->execute()){
           return true;
        } else {
            return false;
        }
	}
}
?>