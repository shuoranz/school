<?php

class User {
    //Initialize DB Variable
    private $db;
	private $ic;
    
    //Constructor
    public function __construct(){
        $this->db = new Database;
		$this->ic = new InvitationCodeModel;
    }
    
    //Register User
    public function register($data){
		
		$ic = $this->ic->getCodeRole($data['invitation_code']);
		if (!$ic) {
			//return "invitation_code_error";
			redirect('register.php', 'Something went wrong with invitation code, please contact the administritor','error');
		} else {
			if(strpos($data['role'], $ic['code_type']) !== false){
				$data['role'] = $ic['code_type'];
				$data['expiration_date'] = $ic['active_duration'];
			} else {
				redirect('register.php', 'Something went wrong with invitation code type, please contact the administritor','error');
			}
			
		}
        //Query
        $this->db->query('insert into users (first_name, last_name, email, role, avatar, username, password, last_activity, expiration_date) values (:first_name, :last_name, :email, :role, :avatar, :username, :password, :last_activity, :expiration_date)');
        //Bind Values
        $this->db->bind(':first_name',$data['first_name']);
		$this->db->bind(':last_name',$data['last_name']);
        $this->db->bind(':email',$data['email']);
		$this->db->bind(':role',$data['role']);
        $this->db->bind(':avatar',$data['avatar']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':last_activity',$data['last_activity']);
		if (isset($data['expiration_date'])) {
			$this->db->bind(':expiration_date',date("Y-m-d H:i:s", strtotime("+".$data['expiration_date']." days")));
		} else {
			$this->db->bind(':expiration_date',date("Y-m-d H:i:s"));
		}
        //Execute
		
		try {
			if ($this->db->execute()){
				return $this->ic->updateInvitationCodeByUserId($this->db->lastInsertId(), 'applied', $data['invitation_code']) ? true : 'invitation_code_error';
			} else {
				return false;
			}
		} catch (Exception $e) {
			if (!isset($e->errorInfo[2])){
				return false;
			}
			$error_msg = $e->errorInfo[2];
			if (stripos($error_msg, 'duplicate') !== false){
				if (stripos($error_msg, 'username') !== false){
					return "duplicate_username";
				}
				if (stripos($error_msg, 'email') !== false){
					return "duplicate_email";
				}
			}
		}
    }
    
    //Upload User Avatar
    public function uploadAvatar(){
        $allowedExts = array("gif","jpg","jpeg","png");
        $temp = explode(".",$_FILES['avatar']['name']);
        $extension = end($temp);

        if((($_FILES['avatar']['type'] == 'image/gif')
            || ($_FILES['avatar']['type'] == 'image/jpeg')
            || ($_FILES['avatar']['type'] == 'image/jpg')
            || ($_FILES['avatar']['type'] == 'image/pjpg')
            || ($_FILES['avatar']['type'] == 'image/x-png')
            || ($_FILES['avatar']['type'] == 'image/png'))
           && ($_FILES['avatar']['size'] < 500000)
           && in_array($extension,$allowedExts)) {
                if ($_FILES['avatar']['error'] > 0){
                    redirect('register.php', $_FILES['avatar']['error'],'error');
                } else {
                    if (file_exists("images/avatars/" . $_FILES['avatar']['name'])){
                        redirect('register.php', 'File already exists','error');
                    } else {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], "images/avatars/".$_FILES['avatar']['name']);
                        return true;
                    }
                }
        } else {
            redirect('register.php', 'Invalid File Type!','error');
        }

    }
    
    //User login 
    public function login($username,$password){
        $this->db->query('select * from users where username = :username and password = :password');
        //Bind values
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $result = $this->db->single();
        //check result
        if($this->db->rowCount()>0){
            $this->setUserData($result);
            return true;
        } else {
            return false;
        }
    }
    
    //Set User data
    private function setUserData($result){
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['name'] = $result['first_name'];
		$_SESSION['expiration_date'] = $result['expiration_date'];
		$_SESSION['role'] = strtotime($result['expiration_date']) > time()? $result['role'] : 'guest';
    }
    
    //User Logout
    public function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
		unset($_SESSION['role']);
		unset($_SESSION['expiration_date']);
        return true;
    }
    
    //Get total number of users
    public function getTotalUsers(){
        $this->db->query('select * from users');
        $result = $this->db->resultset();
        return $this->db->rowCount();
    }
}
?>