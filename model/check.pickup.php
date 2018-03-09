<?php if(!defined('In_System')) exit("Access Denied");


class Check_Pickup{

    public function check_pickup(){
        global $mysqli;

        $user_id =  $_COOKIE['uid'];
        $check_query="SELECT * FROM users WHERE salt = '$user_id'";
        $result = $mysqli->query($check_query);
        
        if ($result->num_rows > 0){
            $check_retrieve = $result->fetch_assoc();
            if($check_retrieve['pickup'] <= 0){
                echo "<script type=\"text/javascript\">alert('您的接送服务次数不够，请联系管理员！ ');window.history.back();</script>"; 
                exit();
            }
            if($check_retrieve['isActive'] == 0){
                echo "<script type=\"text/javascript\">alert('您的账户没有激活，请联系管理员！ ');window.history.back();</script>"; 
                exit();
            }

		}else{
			echo "<script type=\"text/javascript\">alert('亲，没有您的账户信息！ ');window.history.back();</script>"; 
            exit();
		}
    }

    public function remainNum(){
        global $mysqli;

        $user_id =  $_COOKIE['uid'];
        $check_query="SELECT * FROM users WHERE salt = '$user_id'";
        $result = $mysqli->query($check_query);
        
        if ($result->num_rows > 0){
            $check_retrieve = $result->fetch_assoc();
            echo "<span style=\"font-size:20px;color:red;\">剩余：". $check_retrieve['pickup'] . " 次</span>";

		}else{
            return null;
		}
    }
}

?>