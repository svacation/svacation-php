<?php


class Check_Admin{

    public function check_admin(){
        global $mysqli;
        $isAdminLogin =  $_COOKIE['isAdminLogin'];

		$check_query = "SELECT * FROM admin WHERE password = '$isAdminLogin'";
        $result = $mysqli->query($check_query);
		if($result->num_rows > 0){


        }else{
			echo "<script type=\"text/javascript\">alert('您的账户有问题，请联系管理员！ ');window.location.href = '/admin/' ;</script>";
		}
    }
}

?>