<?php if(!defined('In_System')) exit("Access Denied");

class Medical_Service{
    private $medicalServiceType;
    private $time;
    private $additional;
    private $timepicker;

	public function __construct() {
        $this->medicalServiceType = isset($_POST['medicalServiceType']) ? $_POST['medicalServiceType'] : null;
		$this->time = isset($_POST['time']) ? $_POST['time'] : null;
        $this->additional = isset($_POST['additional']) ? $_POST['additional'] : null;
        $this->timepicker = isset($_POST['timepicker']) ? $_POST['timepicker'] : null;
	}

	public function medical_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);

        $datetime = $this->time ." ". $this->timepicker;

        if(empty($this->time) || empty($this->timepicker)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务时间! ');window.history.back();</script>"; 
        } else{
            if ($this->medicalServiceType == "专科医生"){
                $user_id =  $_COOKIE['uid'];
                $special_medical_query = "SELECT special_medical FROM users WHERE salt = '$user_id'";
                $result = $mysqli->query($special_medical_query);
                $result_retrieve = $result->fetch_assoc();
                if(!$result_retrieve['special_medical'] > 0){
                    echo "<script type=\"text/javascript\">alert('您已经没有专科医生服务!请联系公司：604-285-9225。');window.history.back();</script>"; 
                    exit();
                }else{
                    $update_special_med_query = "UPDATE users SET special_medical = special_medical-1 WHERE salt = '$user_id'";
                    if(!$mysqli->query($update_special_med_query)){
                        printf("Registration failure: %s\n", $mysqli->error);
                        exit();
                    }
                }
            }
            if($this->check_dateToDelivery()){
                $medical_service_query = "INSERT INTO medical_service (user, serviceToken, medicalServiceType, time, additional) 
                VALUES ('$user_id', '$serviceToken ', '$this->medicalServiceType', '$datetime', '$this->additional')";
                if($mysqli->query($medical_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了医疗接送, 谢谢.');window.location.href = 'panel.php' ;</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) 
                VALUES ('$serviceToken', '医疗接送', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $update_medical_query = "UPDATE users SET medicals = medicals -1 WHERE salt = '$user_id'";
                if($mysqli->query($update_medical_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前一天预定医疗接送服务! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery() {
        $date = $this->time;
        $d = new DateTime('tomorrow');
        $current = $d->format('Y-m-d');
        if ($date >= $current){
            return true;
        }
        return false;
    }
}
?>