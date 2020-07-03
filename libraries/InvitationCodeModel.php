<?php 
class InvitationCodeModel {
    //Initialize DB Variable
    private $db;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
    }
    
	//Get Invitation Code
	public function getCodeRole($code){
        $this->db->query('select * from invitation_code where code=:code and status = "new" and activated_by = 0');
		$this->db->bind(':code', $code);
		if(!$this->db->execute()){
			return false;
		}
        if ($this->db->rowCount() != 1){
			return false;
		}
		$result = $this->db->single();
		if ($result["status"] != 'new' || $result["activated_by"] != 0){
			return false;
		}
		// TODO: Update invitation code and actived 

		return $result;
    }
	
	public function updateInvitationCodeByUserId($userID, $status, $code){
		$this->db->query("update invitation_code set activated_by=:activated_by,status=:status,activated_time_start=:activated_time_start where code=:code and status = 'new' and activated_by = 0");
        
        $this->db->bind(':activated_by', $userID);
        $this->db->bind(':status', $status);
        $this->db->bind(':activated_time_start',date("Y-m-d H:i:s"));
		$this->db->bind(':code', $code);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
	}
	
	public function getAllInvitationCodes()
	{
		$this->db->query('select * from invitation_code');
		$results = $this->db->resultset();
        return $results;
	}
	
	
	//Create a new invitation code
    public function create($data) {
        $this->db->query("insert into invitation_code (code,created_by,created_date,code_type,status,active_duration)
        values (:code,:created_by,:created_date,:code_type,:status,:active_duration)");
        
        $this->db->bind(':code',$this->generateRandomString(16));
        $this->db->bind(':created_by','1');
        $this->db->bind(':created_date',date("Y-m-d H:i:s"));
        $this->db->bind(':code_type',$data['code_type']);
        $this->db->bind(':status','new');
		$this->db->bind(':active_duration',$data['active_duration']);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
	
	function generateRandomString($length = 16) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
}