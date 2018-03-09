<?php if(!defined('In_System')) exit("Access Denied");

class Admin{
    private $username;
	private $password;
	private $permission;

    public function __construct() {
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->password = isset($_POST['password']) ? $_POST['password'] : null;
	}

    public function admin_login(){ 
        global $mysqli;

		$check_user = $this->validateAdmin();
		if($check_user){
            $deadLine = strtotime("this Friday");
            $sat_time = strtotime("this Saturday");
            $deadLine_format = date('Y-m-d H:i:s', $deadLine);
            $sat_format = date('Y-m-d H:i:s', $sat_time);
    
            $d = new DateTime();
            $current = $d->format('Y-m-d H:i:s');
            if ( $deadLine_format < $current && $sat_format > $current){
                $update_address_query = "UPDATE purchase_service SET origin_address = ''";
                $update_query = $mysqli->query($update_address_query);
            }
            
            echo "<script type=\"text/javascript\">alert('欢 迎 回 来!');window.location.replace(\"../admin/admin_access.php\");</script>";

            $isAdminLogin = hash('sha256', $this->password);
			setcookie("isAdminLogin", $isAdminLogin, time()+604800);
			/*Set the time to 1 day and check valid in admin.php.*/
		}else{
			echo "<script type=\"text/javascript\">alert('您输入的信息有误. ');window.history.back();</script>";
		}
    }

    public function validateAdmin(){
        global $mysqli;

        $password = hash('sha256', $this->password);

		$admin_matching_query = "SELECT permission FROM admin WHERE username = '$this->username' AND password = '$password'";
		$admin_matching = $mysqli->query($admin_matching_query);
		if($admin_matching->num_rows > 0){
			return true;
		}else{
			return false;
		}
    }
    
    public function check_admin(){
        global $mysqli;

        $isAdminLogin =  $_COOKIE['isAdminLogin'];
        $check_query="SELECT * FROM admin WHERE password = '$isAdminLogin'";
        $result = $mysqli->query($check_query);
        
        if ($result->num_rows > 0){
            $check_retrieve = $result->fetch_assoc();
            if($check_retrieve['isActive'] == 0){
                echo "<script type=\"text/javascript\">alert('您的账户没有激活，请联系管理员！ ');window.history.back();</script>"; 
                exit();
            }

		}else{
			echo "<script type=\"text/javascript\">alert('您的账户有问题，请联系管理员！ ');window.history.back();</script>";
		}
    }


}