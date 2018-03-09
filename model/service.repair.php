<?php if(!defined('In_System')) exit("Access Denied");

class Repair_Service{
    private $repairNote;

	public function __construct() {
        $this->repairNote = isset($_POST['repairNote']) ? $_POST['repairNote'] : null;
	}

	public function repair_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d H:i:s",$time_now);
        
        if(empty($this->repairNote)){
            echo "<script type=\"text/javascript\">alert('请填写维修内容! ');window.history.back();</script>"; 
            exit();
        }
        
        $medical_service_query = "INSERT INTO repair_service (user, serviceToken, time, repairNote) 
        VALUES ('$user_id', '$serviceToken', '$format_time', '$this->repairNote')";
        if($mysqli->query($medical_service_query)){
            echo "<script type=\"text/javascript\">alert('您已成功提交了物业管理。谢谢.');window.location.href = 'panel.php';</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        $history_query="INSERT INTO history (token, serviceType, user_id, time) 
        VALUES ('$serviceToken', '住房维修', '$user_id', '$format_time')";
        if($mysqli->query($history_query)){
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
        
    }
    
}
?>