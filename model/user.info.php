<?php if(!defined('In_System')) exit("Access Denied");
    

class Profile{

    public function generateInfo(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
		$profile_exist = $mysqli->query($profile_query);
		if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("<form action=\"./form_function.php\" method=\"post\">
                        <input type=\"hidden\" name=\"salt\" value=%s>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">用户名: </label>
                        <label>%s</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">电话: </label>
                        <input type=\"text\" name=\"phone\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">email: </label>
                        <input type=\"text\" name=\"email\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">微信: </label>
                        <input type=\"text\" name=\"weChat\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">预产期: </label>
                        <input type=\"date\" name=\"timeDeliver\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">地址: </label>
                        <label style=\"\" for=\"address\">%s </label>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                </form>", $profile_retrieve['salt'], $profile_retrieve['username'], $profile_retrieve['phone'], $profile_retrieve['email'], $profile_retrieve['weChat'], $profile_retrieve['timeDeliver'], $profile_retrieve['address']);
            /*cookies expire in 7 days*/
			return 1;
		}else{
			return 0;
		}
        $profile_exist->free();
    }

    public function generateAddress(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
        $profile_exist = $mysqli->query($profile_query);
        if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("
                <input type=\"hidden\" name=\"origin_address\" value=\"%s\">
            ", $profile_retrieve['address']);
        }
    }

    public function checkLocker(){
        GLOBAL $mysqli;
        $salt =  $_COOKIE['uid'];

        $this_thursday = date('Y-m-d', strtotime('thursday this week'));
        $dateNow = date("Y-m-d H:i:s");
        $thursday = $this_thursday . " 18:00:00";
        
        if ($dateNow > $thursday ){
            $edit_query = "UPDATE purchase_service SET locker = 0";
            if($mysqli->query($edit_query)){
            }else{
                printf("Registration failure: %s\n", $mysqli->error);
                exit();
            }

            echo "<script type=\"text/javascript\">alert('您已经超出了本周预定期限!请在周一到周四 6:00pm预定。');window.history.back();</script>";
            exit();
        }

        $profile_query = "SELECT * FROM users WHERE salt = '$salt'";
        $profile_exist = $mysqli->query($profile_query);
        if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            $address = $profile_retrieve['address'];
            if (empty($address)){
                echo "<script type=\"text/javascript\">alert('您需要一个地址.任何问题请联系管理员！');window.history.back();</script>";
                exit();
            }
            $purchase_query = "SELECT * FROM purchase_service WHERE origin_address = '$address' AND locker = 1";
            $purchase_exist = $mysqli->query($purchase_query);
            if($purchase_exist->num_rows > 0){
                echo "<script type=\"text/javascript\">alert('您已经预定了本周采购.任何问题请联系管理员！');window.history.back();</script>";
                exit();
            }
        }else{
            echo "<script type=\"text/javascript\">alert('您需要一个地址以便下单.');window.history.back();</script>";
            exit();
        }
    }

}
?>