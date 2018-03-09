<?php if(!defined('In_System')) exit("Access Denied");


class Check_Activate{

    public function check_activate(){
        global $mysqli;

        $user_id =  $_COOKIE['uid'];
        $check_query="SELECT * FROM users WHERE salt = '$user_id'";
        $result = $mysqli->query($check_query);
        
        if ($result->num_rows > 0){
            $check_retrieve = $result->fetch_assoc();
            if($check_retrieve['isActive'] == 0){
                echo "<script type=\"text/javascript\">alert('您的账户没有激活，请联系管理员！ ');window.history.back();</script>"; 
                exit();
            }

		}else{
			printf("Registration failure: %s\n", $mysqli->error);
            exit();
		}
    }
}

?>