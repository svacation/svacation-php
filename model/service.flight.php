<?php if(!defined('In_System')) exit("Access Denied");

class Flight_Service{
    private $serviceType;
    private $time;
    private $timepicker;
    private $numCars;
    private $num_ppl;
    private $packages;
    private $additionalNote;

    public function __construct() {
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
        $this->time = isset($_POST['time']) ? $_POST['time'] : null;
        $this->timepicker = isset($_POST['timepicker']) ? $_POST['timepicker'] : null;
        $this->numCars = isset($_POST['numCars']) ? $_POST['numCars'] : null;
        $this->num_ppl = isset($_POST['num_ppl']) ? $_POST['num_ppl'] : null;
        $this->packages = isset($_POST['packages']) ? $_POST['packages'] : null;
        $this->additionalNote = isset($_POST['additionalNote']) ? $_POST['additionalNote'] : null;
    }

    public function flight_service(){
        global $mysqli;
        $serviceToken = rand(10, 100000);
        $time_now = time();
        $format_time = date("Y-m-d",$time_now);
        $user_id = $_COOKIE['uid'];
        $full_date = $this->time . " " . $this->timepicker;

        if(empty($this->serviceType) || empty($this->time) || empty($this->timepicker) || empty($this->numCars) || empty($this->num_ppl) || empty($this->packages) || empty($this->additionalNote)){
            echo "<script type=\"text/javascript\">alert('您没有填写相应信息! ');window.history.back();</script>"; 
            exit();
        }else{
            if($this->check_dateToDelivery()){
                $flight_service_query = "INSERT INTO flight_service (user, serviceToken, time, numCars, num_ppl, packages, additionalNote) VALUES ('$user_id', '$serviceToken','$full_date', '$this->numCars', '$this->num_ppl', '$this->packages', '$this->additionalNote')";
                if($mysqli->query($flight_service_query)){
                    echo "<script type=\"text/javascript\">alert('您已成功预定了套餐, 谢谢.');window.location.replace(\"./panel.php\");</script>";
                }else{
                    printf("Registration failure: %s\n", $mysqli->error);
                    exit();
                }
                
                $update_flight_query = "UPDATE users SET flight = flight-1 WHERE salt = '$user_id'";
                if($mysqli->query($update_flight_query)){
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
                echo "<script type=\"text/javascript\">alert('请提前一天预定套餐! ');window.history.back();</script>";
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