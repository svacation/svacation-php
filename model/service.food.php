<?php if(!defined('In_System')) exit("Access Denied");

class Food_Service{
    private $serviceType;
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;
    private $isBooked;
    private $token;
    private $ppl;

	public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
		$this->startDate = isset($_POST['startDate']) ? $_POST['startDate'] : null;
		$this->endDate = isset($_POST['endDate']) ? $_POST['endDate'] : null;
		$this->startTime = isset($_POST['startTime']) ? $_POST['startTime'] : null;
        $this->endTime = isset($_POST['endTime']) ? $_POST['endTime'] : null;
		$this->isBooked = isset($_POST['isBooked']) ? $_POST['isBooked'] : null;
        $this->token = isset($_POST['token']) ? $_POST['token'] : null;
        $this->ppl = isset($_POST['ppl']) ? $_POST['ppl'] : 1;
	}

	public function food_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $time_now = time();
        $format_time = date("Y-m-d H:i:s",$time_now);
        $serviceToken = rand(10, 100000);

        if(empty($this->serviceType) || empty($this->startDate) || empty($this->endDate) || empty($this->startTime) || empty($this->endTime) ){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
            exit();
        }else{
            if($this->check_dateToDelivery()){
                $food_service_query = "INSERT INTO food_service (user, serviceToken, serviceType, startDate, startTime, endDate, endTime, createdAt) VALUES ('$user_id', '$serviceToken ', '$this->serviceType', '$this->startDate', '$this->startTime', '$this->endDate', '$this->endTime', '$format_time')";
                if($mysqli->query($food_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.location.replace(\"./panel.php\");</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query = "INSERT INTO history (token, serviceType, user_id, time) VALUES ('$serviceToken', '$this->serviceType', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前5个小时预定套餐! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery(){
        $sDate = $this->startDate;
        $eDate = $this->endDate;
        $d = new DateTime();
        $current = date("Y-m-d");
        if($sDate == $current){
            // Check which type of order customer can get
            if(date('H')+5 >= 8 && $this->startTime == '早'){
                return false;
            }else if(date('H')+5 >= 12 && $this->startTime == '中'){
                return false;
            }else if(date('H')+5 >= 18 && $this->startTime == '晚'){
                return false;
            }
        }
        if($eDate <= $sDate){
            echo "<script type=\"text/javascript\">alert('开始时间，结束时间不对。');window.history.back();</script>";
            exit();
        }
        return true;
    }

    public function food_delete(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        
        $display_query = "UPDATE food_service SET display = 0 WHERE serviceToken = '$this->token'";
        if($mysqli->query($display_query)){
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        $history_delete_query = "DELETE FROM history WHERE token = '$this->token'";
        if($mysqli->query($history_delete_query)){
            echo "<script type=\"text/javascript\">alert('您已经成功修改, 谢谢.');window.location.replace(\"./panel.php\");</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }

    public function foodcpy_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $time_now = time();
        $format_time = date("Y-m-d H:i:s",$time_now);
        $serviceToken = rand(10, 100000);

        if(empty($this->ppl) || empty($this->startDate) || empty($this->endDate) || empty($this->startTime) || empty($this->endTime)){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
            exit();
        }else{
            if($this->check_dateToDelivery()){
                $food_service_query = "INSERT INTO food_service (user, serviceToken, serviceType, startDate, startTime, endDate, endTime, num_ppl, createdAt, display) VALUES ('$user_id', '$serviceToken ', '待产餐', '$this->startDate', '$this->startTime', '$this->endDate', '$this->endTime', '$this->ppl', '$format_time', 1)";
                if($mysqli->query($food_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.location.replace(\"./panel.php\");</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) VALUES ('$serviceToken', '$this->serviceType', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前5个小时预定套餐! ');window.history.back();</script>";
            }
        }
    }
}
?>
