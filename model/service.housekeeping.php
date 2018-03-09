<?php if(!defined('In_System')) exit("Access Denied");

class Housekeeping_Service{
    private $time;
    private $accompany;
    private $lactagogue;
    private $maid;
    private $placenta;
    private $additionalNote;

	public function __construct() {
        $this->time = isset($_POST['time']) ? $_POST['time'] : null;
        $this->accompany = isset($_POST['accompany']) ? $_POST['accompany'] : 0;
        $this->lactagogue = isset($_POST['lactagogue']) ? $_POST['lactagogue'] : 0;
        $this->maid = isset($_POST['maid']) ? $_POST['maid'] : 0;
        $this->placenta = isset($_POST['placenta']) ? $_POST['placenta'] : 0;
		$this->additionalNote = isset($_POST['additionalNote']) ? $_POST['additionalNote'] : null;
	}

	public function housekeeping_service(){
        global $mysqli;
        $user_id = $_COOKIE['uid'];
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        
        if(empty($this->time)){
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务时间! ');window.history.back();</script>"; 
        }elseif(empty($this->accompany) && empty($this->maid)) {
            echo "<script type=\"text/javascript\">alert('请选择您想要的服务! ');window.history.back();</script>"; 
        }else{
            if($this->check_dateToDelivery()){
                // echo "<script type=\"text/javascript\">alert('$this->time, $this->accompany, $this->lactagogue, $this->maid, $this->placenta, $this->additionalNote');window.history.back();</script>";
                $housekeeping_service_query = "INSERT INTO housekeeping_service (user, serviceToken, time, accompany, maid, additionalNote) 
                VALUES ('$user_id', '$serviceToken ', '$this->time', '$this->accompany', '$this->maid', '$this->additionalNote')";
                if($mysqli->query($housekeeping_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了孕产服务, 谢谢.');window.location.href = 'panel.php' ;</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }

                $history_query="INSERT INTO history (token, serviceType, user_id, time) 
                VALUES ('$serviceToken', '孕产服务', '$user_id', '$format_time')";
                if($mysqli->query($history_query)){
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
            }else{
                echo "<script type=\"text/javascript\">alert('请提前一个月预定孕产服务! ');window.history.back();</script>";
            }
        }
    }
    
    public function check_dateToDelivery() {
        $date = $this->time;
        $dateNow = date('Y-m-d', strtotime('+1 month'));
        if ($date > $dateNow){
            return true;
        }
        else return false;
    }
}
?>