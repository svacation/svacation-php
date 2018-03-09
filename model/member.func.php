<?php if(!defined('In_System')) exit("Access Denied");

class Member{
    private $salt;
    private $username;
    private $phone;
    private $email;
    private $password;
    private $weChat;
    private $timeDeliver;
    private $currentpage;
    private $address;

	public function __construct() {
        $this->salt = isset($_POST['salt']) ? $_POST['salt'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
		$this->email = isset($_POST['email']) ? $_POST['email'] : null;
		$this->password = isset($_POST['password']) ? $_POST['password'] : null;
		$this->weChat = isset($_POST['weChat']) ? $_POST['weChat'] : null;
		$this->timeDeliver = isset($_POST['timeDeliver']) ? $_POST['timeDeliver'] : null;
        $this->currentpage = isset($_POST['currentpage']) ? $_POST['currentpage'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
	}

	public function email_validation(){
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return FALSE;
		}
		return TRUE;
    }
    
    public function phone_validation(){
        return is_numeric($this->phone);
    }

	public function genSalt($length = 6){
		$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLength = strlen($char);
		$salt = '';
		for($i = 0; $i < $length; $i++){
			$salt .= $char[rand(0, $charLength - 1)];
		}
		return $salt;
	}

	public function login(){
        GLOBAL $settings;

        //Check whethre the user is inside th system. 
		$valid = $this->validation();
		if($valid){
			/*cookies expire in 7 days*/
			echo "<script type=\"text/javascript\">window.location.replace(\"$this->currentpage\");</script>";
		}else{
			echo "<script type=\"text/javascript\">alert('您的账户不在系统内。\\n 请先注册我们的会员账户！');window.history.back();</script>";
		}
    }
    
    public function logout(){
        GLOBAL $settings;
        setcookie("islogin", "");
        setcookie("uid", "");
        echo "<script type=\"text/javascript\">window.location.replace(\"./\");</script>";
    }

	public function password_encrypt($salt){
		$password = hash('sha256', $this->password);
		$password .= $salt;
		return hash('sha256', $password);
	}

	public function register(){
        global $mysqli;
        
        /* Check if the user exist */
		if(empty($this->email) || empty($this->password) || empty($this->username) || empty($this->phone) || empty($this->weChat) || empty($this->timeDeliver)){
			echo "<script type=\"text/javascript\">alert('信息不全无法注册!');;window.history.back();</script>";
		}else{
            // Check for duplicate users
            if(!$this->check_duplicate()){
                // Validate email and phone format
                if($this->email_validation() == true && $this->phone_validation() == true){
                    $time_now = time();
                    $format_time = date("Y-m-d",$time_now);
                    $salt = $this->genSalt();
                    $password = $this->password_encrypt($salt);
                    $new_member_query = "INSERT INTO users (username, phone, email, password, weChat, timeDeliver, create_time, role, salt) VALUES ('$this->username', '$this->phone', '$this->email', '$password', '$this->weChat', '$this->timeDeliver', '$format_time', 1,'$salt')";
                    if($mysqli->query($new_member_query)){
                        setcookie("uid", $salt, time()+86400);
                        setcookie("islogin", $salt, time()+86400);
                        echo "<script type=\"text/javascript\">alert('欢迎，您已注册成功!');window.location.replace(\"./contact.php\");</script>";
                    }else{
                        printf("Registration failure: %s\n", $mysqli->error);
                        exit();
                    }
                }else{
                    echo "<script type=\"text/javascript\">alert('您的Email或是电话格式不正确!');window.history.back();</script>";
                }
            }else{
                echo "<script type=\"text/javascript\">alert('用户已存在！');window.history.back();</script>";
            }
		}
    }
    
    public function update_user(){
        global $mysqli;
        
        /* UPdate DB if the user change the user info data */
        $update_query = "UPDATE users SET phone='$this->phone', email='$this->email', weChat='$this->weChat', timeDeliver='$this->timeDeliver' WHERE salt = '$this->salt' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.history.back();</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
    }

    /* Check the salt in DB */
	public function retrieve_salt(){
		global $mysqli;
		$salt_query = "SELECT salt FROM users WHERE username = '$this->username'";
        $salt_retrieve = $mysqli->query($salt_query);
		if($salt_retrieve->num_rows > 0){				
			$salt_result = $salt_retrieve->fetch_assoc();
			$salt = $salt_result['salt'];
		}else{
			return 'User not found';
        }
		return $salt;
    }
    
    /* Check if the record already exist in the databse */
    public function check_duplicate(){
        global $mysqli;
        $check_query = "SELECT * FROM users WHERE username = '$this->username'";
        $check_retrieve = $mysqli->query($check_query);
		if($check_retrieve->num_rows > 0){				
			$check_result = $check_retrieve->fetch_assoc();
            $typed_phone = $check_result['phone'];
            $typed_email = $check_result['email'];
            $typed_weChat = $check_result['weChat'];
            if ($typed_phone === $this->phone){
                return true;
            }
            if($typed_email === $this->email){
                return true;
            }
            if($typed_weChat === $this->weChat){
                return true;
            }
		}else{
			return false;
        }
		return false;
    }

	public function validation(){
		global $mysqli;
		$salt = $this->retrieve_salt();
		if(strcmp($salt, "User not found") == 0)
            return 0;
        
        // Check username and password match
		$request = $this->password_encrypt($salt, $this->password);
		$member_matching_query = "SELECT uid, salt FROM users WHERE username = '$this->username' AND password = '$request'";
		$member_matching = $mysqli->query($member_matching_query);
		if($member_matching->num_rows > 0){
            $member_retrieve = $member_matching->fetch_assoc();

            //update cookie
            setcookie("uid", $member_retrieve['salt'], time()+604800);
            setcookie("islogin", $member_retrieve['salt'], time()+604800);

            /*cookies expire in 7 days*/
			return $member_retrieve['uid'];
		}else{
			return 0;
		}
    }
    
}
?>
